<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces;

/**
 * Interface CredentialInterface
 * @package Ticaje\AConnector\Interfaces
 */
interface CredentialInterface
{
    /**
     * @param array $credentials
     * @return CredentialInterface
     */
    public function set(array $credentials): CredentialInterface;

    /**
     * @return mixed
     * Returns credentials as associative array
     */
    public function getAll(): array;
}
