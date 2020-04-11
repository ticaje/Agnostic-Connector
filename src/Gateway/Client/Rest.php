<?php
declare(strict_types=1);

/**
 * Gateway Client Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Client;

use Ticaje\Contract\Factory\FactoryInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\ResponderInterface;

use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;
use Ticaje\AConnector\Traits\Gateway\Client\Rest as RestTrait;

/**
 * Class Rest
 * @package Ticaje\Connector\Gateway\Client
 */
class Rest extends Base implements RestClientInterface
{
    use RestTrait;

    protected $accessToken;

    protected $baseUriKey;

    /**
     * Rest constructor.
     * @param ResponderInterface $responder
     * @param FactoryInterface $clientFactory
     * @param string $baseUriKey
     */
    public function __construct(
        ResponderInterface $responder,
        FactoryInterface $clientFactory,
        string $baseUriKey
    ) {
        $this->baseUriKey = $baseUriKey;
        parent::__construct($responder, $clientFactory);
    }

    /**
     * @inheritDoc
     */
    public function generateClient($credentials)
    {
        $this->client = $this->clientFactory->create(
            [
                $this->baseUriKey => $credentials[self::BASE_URI_KEY]
            ]
        );
        return $this->client;
    }

    /**
     * @param $headers
     * @return array
     * This method should be abstracted away into a builder class
     */
    protected function generateHeaders($headers)
    {
        $authTokenHeader = ["Authorization" => "{$this->accessToken}"];
        return array_merge($headers, $authTokenHeader);
    }
}
