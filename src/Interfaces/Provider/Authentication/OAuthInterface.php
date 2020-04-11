<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces\Provider\Authentication;

/**
 * Interface OAuthInterface
 * @package Ticaje\AConnector\Interfaces\Provider\Authentication
 */
interface OAuthInterface
{
    /**
     * @return string
     */
    public function getAccessToken(): string;
}
