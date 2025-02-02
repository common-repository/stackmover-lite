<?php
namespace WP2Aws;

use WP2Aws\Exception\WP2AwsException;
use WP2GuzzleHttp\Promise;
use WP2GuzzleHttp\Promise\PromisorInterface;
use WP2GuzzleHttp\Promise\RejectedPromise;

/**
 * "Waiters" are associated with an AWS resource (e.g., EC2 instance), and poll
 * that resource and until it is in a particular state.

 * The Waiter object produces a promise that is either a.) resolved once the
 * waiting conditions are met, or b.) rejected if the waiting conditions cannot
 * be met or has exceeded the number of allowed attempts at meeting the
 * conditions. You can use waiters in a blocking or non-blocking way, depending
 * on whether you call wait() on the promise.

 * The configuration for the waiter must include information about the operation
 * and the conditions for wait completion.
 */
class Waiter implements PromisorInterface
{
    /** @var WP2AwsClientInterface Client used to execute each attempt. */
    private $client;

    /** @var string Name of the waiter. */
    private $name;

    /** @var array Params to use with each attempt operation. */
    private $args;

    /** @var array Waiter configuration. */
    private $config;

    /** @var array Default configuration options. */
    private static $defaults = ['initDelay' => 0, 'before' => null];

    /** @var array Required configuration options. */
    private static $required = [
        'acceptors',
        'delay',
        'maxAttempts',
        'operation',
    ];

    /**
     * The array of configuration options include:
     *
     * - acceptors: (array) Array of acceptor options
     * - delay: (int) Number of seconds to delay between attempts
     * - maxAttempts: (int) Maximum number of attempts before failing
     * - operation: (string) Name of the API operation to use for polling
     * - before: (callable) Invoked before attempts. Accepts command and tries.
     *
     * @param WP2AwsClientInterface $client Client used to execute commands.
     * @param string             $name   Waiter name.
     * @param array              $args   Command arguments.
     * @param array              $config Waiter config that overrides defaults.
     *
     * @throws \InvalidArgumentException if the configuration is incomplete.
     */
    public function __construct(
        WP2AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        $this->client = $client;
        $this->name = $name;
        $this->args = $args;

        // Prepare and validate config.
        $this->config = $config + self::$defaults;
        foreach (self::$required as $key) {
            if (!isset($this->config[$key])) {
                throw new \InvalidArgumentException(
                    'The provided waiter configuration was incomplete.'
                );
            }
        }
        if ($this->config['before'] && !is_callable($this->config['before'])) {
            throw new \InvalidArgumentException(
                'The provided "before" callback is not callable.'
            );
        }
    }

    public function promise()
    {
        return Promise\coroutine(function () {
            $name = $this->config['operation'];
            for ($state = 'retry', $attempt = 1; $state === 'retry'; $attempt++) {
                // Execute the operation.
                $args = $this->getArgsForAttempt($attempt);
                $command = $this->client->getCommand($name, $args);
                try {
                    if ($this->config['before']) {
                        $this->config['before']($command, $attempt);
                    }
                    $result = (yield $this->client->executeAsync($command));
                } catch (WP2AwsException $e) {
                    $result = $e;
                }

                // Determine the waiter's state and what to do next.
                $state = $this->determineState($result);
                if ($state === 'success') {
                    yield $command;
                } elseif ($state === 'failed') {
                    $msg = "The {$this->name} waiter entered a failure state.";
                    if ($result instanceof \Exception) {
                        $msg .= ' Reason: ' . $result->getMessage();
                    }
                    yield new RejectedPromise(new \RuntimeException($msg));
                } elseif ($state === 'retry'
                    && $attempt >= $this->config['maxAttempts']
                ) {
                    $state = 'failed';
                    yield new RejectedPromise(new \RuntimeException(
                        "The {$this->name} waiter failed after attempt #{$attempt}."
                    ));
                }
            }
        });
    }

    /**
     * Gets the operation arguments for the attempt, including the delay.
     *
     * @param $attempt Number of the current attempt.
     *
     * @return mixed integer
     */
    private function getArgsForAttempt($attempt)
    {
        $args = $this->args;

        // Determine the delay.
        $delay = ($attempt === 1)
            ? $this->config['initDelay']
            : $this->config['delay'];
        if (is_callable($delay)) {
            $delay = $delay($attempt);
        }

        // Set the delay. (Note: handlers except delay in milliseconds.)
        if (!isset($args['@http'])) {
            $args['@http'] = [];
        }
        $args['@http']['delay'] = $delay * 1000;

        return $args;
    }

    /**
     * Determines the state of the waiter attempt, based on the result of
     * polling the resource. A waiter can have the state of "success", "failed",
     * or "retry".
     *
     * @param mixed $result
     *
     * @return string Will be "success", "failed", or "retry"
     */
    private function determineState($result)
    {
        foreach ($this->config['acceptors'] as $acceptor) {
            $matcher = 'matches' . ucfirst($acceptor['matcher']);
            if ($this->{$matcher}($result, $acceptor)) {
                return $acceptor['state'];
            }
        }

        return $result instanceof \Exception ? 'failed' : 'retry';
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPath($result, array $acceptor)
    {
        return !($result instanceof ResultInterface)
            ? false
            : $acceptor['expected'] == $result->search($acceptor['argument']);
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAll($result, array $acceptor)
    {
        if (!($result instanceof ResultInterface)) {
            return false;
        }

        $actuals = $result->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual != $acceptor['expected']) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAny($result, array $acceptor)
    {
        if (!($result instanceof ResultInterface)) {
            return false;
        }

        $actuals = $result->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual == $acceptor['expected']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesStatus($result, array $acceptor)
    {
        if ($result instanceof ResultInterface) {
            return $acceptor['expected'] == $result['@metadata']['statusCode'];
        } elseif ($result instanceof WP2AwsException && $response = $result->getResponse()) {
            return $acceptor['expected'] == $response->getStatusCode();
        } else {
            return false;
        }
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesError($result, array $acceptor)
    {
        if ($result instanceof WP2AwsException) {
            return $result->isConnectionError()
                || $result->getWP2AwsErrorCode() == $acceptor['expected'];
        }

        return false;
    }
}
