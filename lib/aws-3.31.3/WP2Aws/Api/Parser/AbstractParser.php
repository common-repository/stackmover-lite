<?php
namespace WP2Aws\Api\Parser;

use WP2Aws\Api\Service;
use WP2Aws\CommandInterface;
use WP2Aws\ResultInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
abstract class AbstractParser
{
    /** @var \WP2Aws\Api\Service Representation of the service API*/
    protected $api;

    /**
     * @param Service $api Service description.
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    /**
     * @param CommandInterface  $command  Command that was executed.
     * @param ResponseInterface $response Response that was received.
     *
     * @return ResultInterface
     */
    abstract public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    );
}
