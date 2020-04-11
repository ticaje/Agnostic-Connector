<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces\Provider\Authentication;

/**
 * Interface SimpleAuthenticatorInterface
 * @package Ticaje\AConnector\Interfaces\Provider\Authentication
 */
interface SimpleAuthenticatorInterface
{
    /**
     * @param array $credentials
     * @return mixed
     */
    public function authenticate(array $credentials);
}
