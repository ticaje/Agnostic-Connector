<?php
declare(strict_types=1);

/**
 * Gateway Client Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Implementations\Client\Rest;

use Ticaje\AConnector\Interfaces\Implementors\Client\Rest\RestClientImplementorInterface;
use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;

/**
 * Class Curl
 * @package Ticaje\AConnector\Gateway\Implementations\Client\Rest
 * This could be another REST implementation to a client that acts as translator amongst lower and higher level module
 */
class Curl implements RestClientImplementorInterface, RestClientInterface
{
    public function request($verb, $endpoint, array $headers = [], array $params)
    {
        // TODO: Implement request() method.
    }

    public function requestAsync($verb, $endpoint, array $headers = [], array $params)
    {
        // TODO: Implement requestAsync() method.
    }
}
