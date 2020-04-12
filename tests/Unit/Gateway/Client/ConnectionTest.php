<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @package     Ticaje_Connector
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Test\Unit\Gateway\Client;

use Ticaje\AConnector\Test\Unit\BaseTest;
use Ticaje\AConnector\Interfaces\Protocol\RestClientInterface;
use Ticaje\AConnector\Gateway\Client\Rest;

/**
 * Class ConnectionTest
 * @package Ticaje\AConnector\Test\Unit\Gateway\Client
 */
class ConnectionTest extends BaseTest
{
    private $client;

    public function setUp()
    {
        $this->client = $this->getMockBuilder(Rest::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testInstantiateRestClient()
    {
        $this->assertInstanceOf(RestClientInterface::class, $this->client);
    }
}
