<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces\Protocol;

use Ticaje\AConnector\Interfaces\ClientInterface;

/**
 * Interface RestClientInterface
 * @package Ticaje\AConnector\Interfaces\Protocol
 */
interface RestClientInterface extends ClientInterface
{
    /**
     * @param $verb
     * @param $endpoint
     * @param array $headers
     * @param array $params
     * @return mixed
     */
    public function request($verb, $endpoint, array $headers = [], array $params);

    /**
     * @param $verb
     * @param $endpoint
     * @param array $headers
     * @param array $params
     * @return mixed
     */
    public function requestAsync($verb, $endpoint, array $headers = [], array $params);
}
