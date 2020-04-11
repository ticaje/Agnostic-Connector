<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AConnector\Interfaces;

/**
 * Interface ClientInterface
 * @package Ticaje\AConnector\Interfaces
 */
interface ClientInterface
{
    const CONTENT_TYPE_JSON = 'application/json';

    const AUTHORIZATION = 'Authorization';

    const AUTHORIZATION_TYPE_BEARER = 'Bearer';

    const CONTENT_TYPE_FORM_URLENCODED = 'application/x-www-form-urlencoded';

    const CONTENT_TYPE_KEY = 'Content-Type';

    const BASE_URI_KEY = 'base_uri';
}
