<?php
declare(strict_types=1);

/**
 * Implementor Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces\Implementors\Client\Rest;

use Ticaje\AConnector\Interfaces\Implementors\ImplementorInterface;

/**
 * Interface RestClientImplementorInterface
 * @package Ticaje\AConnector\Interfaces\Implementors\Client\Rest
 * The idea behind this interface is to provide a nexus amongst consumer class in charge of
 * connect a business logic to an infrastructure lower level class that provides abstraction to specific implementation
 * for instance Guzzle implementation when it comes to such a rest consuming library.
 */
interface RestClientImplementorInterface extends ImplementorInterface
{
    /**
     * @param $client
     * @return mixed
     */
    public function setClient($client);
}
