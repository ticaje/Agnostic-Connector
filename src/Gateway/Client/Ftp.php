<?php
declare(strict_types=1);

/**
 * Gateway Client Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Client;

use Ticaje\AConnector\Interfaces\CredentialInterface;
use Ticaje\AConnector\Interfaces\Protocol\FtpClientInterface;

/**
 * Class Ftp
 * @package Ticaje\AConnector\Gateway\Client
 */
class Ftp extends Base implements FtpClientInterface
{
    private $connected;

    /**
     * @inheritDoc
     */
    public function isConnected(): bool
    {
        return $this->connected;
    }

    /**
     * @inheritDoc
     */
    public function connect(CredentialInterface $credentials)
    {
        try {
            $this->client = $this->clientFactory->create($credentials->getAll());
            $this->connected = $this->client->login($credentials->username, $credentials->password) ? true : false;
        } catch (\Exception $exception) {
            $this->connected = false;
        }
        return $this->connected;
    }

    /**
     * @inheritDoc
     */
    public function get($path = '')
    {
        return $this->client->get($path);
    }

    /**
     * @inheritDoc
     */
    public function ls($dir = '.'): array
    {
        return $this->client->nlist($dir);
    }

    /**
     * @inheritDoc
     */
    public function download($path = '', $destination = false)
    {
        return $this->client->get($path, $destination);
    }
}
