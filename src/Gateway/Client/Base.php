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

use Ticaje\AConnector\Interfaces\ClientInterface;

/**
 * Class Base
 * @package Ticaje\AConnector\Gateway\Client
 */
abstract class Base implements ClientInterface
{
    protected $client;

    protected $clientFactory;

    protected $responder;

    /**
     * Base constructor.
     * @param ResponderInterface $responder
     * @param FactoryInterface $clientFactory
     */
    public function __construct(
        ResponderInterface $responder,
        FactoryInterface $clientFactory
    ) {
        $this->responder = $responder;
        $this->clientFactory = $clientFactory;
    }
}
