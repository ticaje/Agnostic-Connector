<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces\Provider\Token;

/**
 * Interface TokenProviderInterface
 * @package Ticaje\AConnector\Interfaces\Provider\Token
 */
interface TokenProviderInterface
{
    /**
     * @param array $params
     * @return TokenProviderInterface
     */
    public function setParams(array $params): TokenProviderInterface;

    /**
     * @return mixed
     */
    public function getAccessToken();
}
