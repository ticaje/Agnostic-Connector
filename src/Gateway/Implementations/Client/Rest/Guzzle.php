<?php
declare(strict_types=1);

/**
 * Gateway Client Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Implementations\Client\Rest;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Ticaje\AConnector\Interfaces\Implementors\Client\Rest\RestClientImplementorInterface;
use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\ResponderInterface;

/**
 * Class Guzzle
 * @package Ticaje\AConnector\Gateway\Implementations\Client\Rest
 */
class Guzzle implements RestClientImplementorInterface, RestClientInterface
{
    private $client;

    /**
     * @inheritDoc
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function requestAsync($verb, $endpoint, array $headers = [], array $params)
    {
        $result = [];
        try {
            $promise = $this->client->requestAsync(
                $verb,
                $endpoint,
                [
                    'headers' => $this->generateHeaders($headers),
                    $this->getFormRequestKey($verb, $headers) => $params
                ]
            );
            $promise->then(
                function (ResponseInterface $response) use (&$result) {
                    $result[ResponderInterface::CONTENT_KEY] = $response->getBody()->getContents();
                    $result[ResponderInterface::SUCCESS_KEY] = true;
                    $result[ResponderInterface::MESSAGE_KEY] = 'Response correctly received'; // Perhaps normalize this message
                    return $result;
                },
                function (RuntimeException $exception) {
                    // Missing implementation
                }
            );
            $promise->wait();
        } catch (\Exception $exception) {
            $result[ResponderInterface::CONTENT_KEY] = null;
            $result[ResponderInterface::SUCCESS_KEY] = false;
            $result[ResponderInterface::MESSAGE_KEY] = $exception->getMessage();
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function request($verb, $endpoint, array $headers = [], array $params = [])
    {
        $result = [];
        try {
            $result[ResponderInterface::CONTENT_KEY] = $this->client->request(
                $verb,
                $endpoint,
                [
                    'headers' => $headers,
                    $this->getFormRequestKey($verb, $headers) => $params
                ]
            )->getBody()->getContents();
            $result[ResponderInterface::SUCCESS_KEY] = true;
            $result[ResponderInterface::MESSAGE_KEY] = 'Response correctly received'; // Perhaps normalize this message
        } catch (\Exception $exception) {
            $result[ResponderInterface::CONTENT_KEY] = null;
            $result[ResponderInterface::SUCCESS_KEY] = false;
            $result[ResponderInterface::MESSAGE_KEY] = $exception->getMessage();
        }
        return $result;
    }

    /**
     * @param $verb
     * @param $headers
     * @return string
     */
    private function getFormRequestKey($verb, $headers)
    {
        // The values should also be constantized
        $key = $verb ? 'query' : 'form_params';
        $key = $headers[RestClientInterface::CONTENT_TYPE_KEY] == RestClientInterface::CONTENT_TYPE_JSON ? 'json' : $key;
        return $key;
    }
}
