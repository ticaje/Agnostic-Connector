<?php
declare(strict_types=1);

/**
 * Gateway Client Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Client;

use Ticaje\AConnector\Interfaces\Implementors\Client\Rest\RestClientImplementorInterface;
use Ticaje\Contract\Factory\FactoryInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\ResponderInterface;

use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;

/**
 * Class Rest
 * @package Ticaje\Connector\Gateway\Client
 */
class Rest extends Base implements RestClientInterface
{
    private $baseUriKey;

    /**
     * Rest constructor.
     * @param ResponderInterface $responder
     * @param FactoryInterface $clientFactory
     * @param RestClientImplementorInterface $implementor
     * @param string $baseUriKey
     */
    public function __construct(
        ResponderInterface $responder,
        FactoryInterface $clientFactory,
        RestClientImplementorInterface $implementor,
        string $baseUriKey
    ) {
        $this->baseUriKey = $baseUriKey;
        parent::__construct($responder, $clientFactory, $implementor);
    }

    /**
     * @inheritDoc
     */
    public function generateClient($credentials)
    {
        $client = $this->clientFactory->create([$this->baseUriKey => $credentials[self::BASE_URI_KEY]]);
        return $this->implementor->setClient($client);
    }

    /**
     * @inheritDoc
     */
    public function request($verb, $endpoint, array $headers = [], array $params)
    {
        $result = $this->implementor->request($verb, $endpoint, $headers, $params);
        return $this->responder->process($result);
    }

    /**
     * @inheritDoc
     */
    public function requestAsync($verb, $endpoint, array $headers = [], array $params)
    {
        $result = $this->implementor->requestAsync($verb, $endpoint, $headers, $params);
        return $this->responder->process($result);
    }
}
