<?php
declare(strict_types=1);

/**
 * Gateway Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Gateway\Provider\Authentication;

use Ticaje\Contract\Factory\FactoryInterface;

use Ticaje\AConnector\Interfaces\Provider\Authentication\AuthenticatorInterface;
use Ticaje\AConnector\Interfaces\Provider\Authentication\OAuthInterface;

/**
 * Class Oauth
 * @package Ticaje\AConnector\Gateway\Provider\Authentication
 * This class is held responsible for housing the service contract when it comes to Oauth logic
 * The specific implementations of each Oauth related domain belong to each domain
 * The only condition for every domain is to be compliant with this class dependencies
 */
abstract class Oauth implements AuthenticatorInterface, OAuthInterface
{
    protected $oauthClientFactory;

    protected $oauthClient;

    protected $clientCredentialsFactory;

    protected $credentialsClient;

    protected $credentials;

    protected $options;

    /**
     * Oauth constructor.
     * @param $oauthClientFactory
     * @param $clientCredentialsFactory
     */
    public function __construct(
        FactoryInterface $oauthClientFactory,
        FactoryInterface $clientCredentialsFactory
    ) {
        $this->oauthClientFactory = $oauthClientFactory;
        $this->clientCredentialsFactory = $clientCredentialsFactory;
    }
}
