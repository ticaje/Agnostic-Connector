<?php
declare(strict_types=1);

/**
 * Gateway Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Provider\Authentication;

use Ticaje\AConnector\Interfaces\Provider\Authentication\AuthenticatorInterface;

/**
 * Class Digest
 * @package Ticaje\AConnector\Gateway\Provider\Authentication
 */
class Digest implements AuthenticatorInterface
{
    /**
     * @inheritDoc
     */
    public function authenticate(array $credentials)
    {
    }
}
