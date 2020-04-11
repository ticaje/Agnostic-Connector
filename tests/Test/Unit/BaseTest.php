<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @package     Ticaje_Connector
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Test\Unit;

use PHPUnit\Framework\TestCase as ParentClass;

/**
 * Class BaseTest
 * @package Ticaje\Connector\Test\Unit
 */
class BaseTest extends ParentClass
{
    public function testProofOfLife()
    {
        $this->assertTrue(true);
    }
}
