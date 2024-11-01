<?php
namespace WP2Aws\S3;

use WP2Aws\Api\Parser\AbstractParser;
use WP2Aws\Api\Parser\Exception\ParserException;
use WP2Aws\CommandInterface;
use WP2Aws\Exception\WP2AwsException;
use Psr\Http\Message\ResponseInterface;

/**
 * Converts malformed responses to a retryable error type.
 *
 * @internal
 */
class RetryableMalformedResponseParser extends AbstractParser
{
    /** @var callable */
    private $parser;
    /** @var string */
    private $exceptionClass;

    public function __construct(
        callable $parser,
        $exceptionClass = WP2AwsException::class
    ) {
        $this->parser = $parser;
        $this->exceptionClass = $exceptionClass;
    }

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        $fn = $this->parser;

        try {
            return $fn($command, $response);
        } catch (ParserException $e) {
            throw new $this->exceptionClass(
                "Error parsing response for {$command->getName()}:"
                    . " AWS parsing error: {$e->getMessage()}",
                $command,
                ['connection_error' => true, 'exception' => $e],
                $e
            );
        }
    }
}
