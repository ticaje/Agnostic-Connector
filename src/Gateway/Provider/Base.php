<?php
declare(strict_types=1);

/**
 * Gateway Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Provider;

use Ticaje\AConnector\Interfaces\ClientInterface;

/**
 * Class Base
 * @package Ticaje\AConnector\Gateway\Provider
 */
abstract class Base
{
    protected $connector;

    protected $params;

    /**
     * Base constructor.
     * @param ClientInterface $connector
     */
    public function __construct(
        ClientInterface $connector
    ) {
        $this->connector = $connector;
    }

    public function initialize($credentials)
    {
        $this->connector->generateClient($credentials);
        return $this;
    }
}
