<?php
declare(strict_types=1);

/**
 * Gateway Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Provider;

use Ticaje\contract\Traits\Getter;
use Ticaje\AConnector\Interfaces\CredentialInterface;

/**
 * Class Credentials
 * @package Ticaje\AConnector\Gateway\Provider
 */
class Credentials implements CredentialInterface
{
    use Getter;

    private $username;

    private $password;

    private $host;

    private $port;

    /**
     * @inheritDoc
     */
    public function set(array $credentials): CredentialInterface
    {
        $attributes = array_keys(get_object_vars($this));
        foreach ($attributes as $attribute) {
            $this->$attribute = isset($credentials[$attribute]) ? $credentials[$attribute] : null;
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return get_object_vars($this);
    }
}
