<?php

/**
 * Copyright 2024 Justin Stolpe.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace TikTokAds\Authentication;

// other classes we need to use
use TikTokAds\TikTokAds;
use TikTokAds\Authentication\AuthenticationFields;

/**
 * Authentication
 *
 * Perform authentication.
 *     - Endpoints: 
 *          - /oauth2/access_token/ POST
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739965703387137
 *          - /oauth/token/ POST
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739965703387137
 *          - /oauth2/revoke_token/ POST
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739965949088770
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class Authentication extends TikTokAds {
    /**
     * @const string production authorization url.
     */
    const ADVERTISER_AUTHORIZATION_URL = 'https://business-api.tiktok.com/portal/auth';

    /**
     * @const TikTok endpoint for oauth.
     */
    const ENDPOINT_OAUTH = 'oauth';

    /**
     * @const TikTok endpoint for oauth2.
     */
    const ENDPOINT_OAUTH2 = 'oauth2';

    /**
     * Contructor for instantiating a new object.
     *
     * @param array $config for the class.
     * @return void
     */
    public function __construct( $config ) {
        // call parent for setup
        parent::__construct( $config );
    }

    /**
     * Generate access token.
     *
     * @param string $authCode string of the code to exchenge for access token.
     * @return response.
     */
    public function generateAccessToken( $authCode ) {
        return $this->post( array( // make request
            'endpoint' => '/' . self::ENDPOINT_OAUTH . '/token/',
            'params' => array(
                AuthenticationFields::CLIENT_ID => $this->getAppId(),
                AuthenticationFields::CLIENT_SECRET => $this->getAppSecret(),
                AuthenticationFields::CODE => $authCode,
                AuthenticationFields::GRANT_TYPE => 'authorization_code'
            )
        ) );
    }

    /**
     * Generate long term access token that does not expire.
     *
     * @param string $authCode string of the code to exchenge for access token.
     * @return response.
     */
    public function generateLongTermAccessToken( $authCode ) {
        return $this->post( array( // make request
            'endpoint' => '/' . self::ENDPOINT_OAUTH2 . '/access_token/',
            'params' => array(
                AuthenticationFields::APP_ID => $this->getAppId(),
                AuthenticationFields::SECRET => $this->getAppSecret(),
                AuthenticationFields::AUTH_CODE => $authCode
            )
        ) );
    }

    /**
     * Get the url for a user to prompt them with the authorization dialog.
     *
     * @param string $redirectUri uri the user gets sent to after authenticating with TikTok.
     * @param string $state this gets passed back from TikTok when the use authenticates, optional.
     * @return string.
     */
    public function getAdvertiserAuthenticationUrl( $redirectUri, $state = '' ) {
        $params = array( // params required to generate the authorization url
            AuthenticationFields::APP_ID => $this->appId,
            AuthenticationFields::REDIRECT_URI => $redirectUri,
            AuthenticationFields::STATE => $state
        );

        // return the login dialog url
        return self::ADVERTISER_AUTHORIZATION_URL . '?' . http_build_query( $params );
    }

    /**
     * Revoke an access token.
     *
     * @param string $accessToken string of the access token to revoke.
     * @return response.
     */
    public function revokeAccessToken( $accessToken ) {
        return $this->post( array( // make request
            'endpoint' => '/' . self::ENDPOINT_OAUTH2 . '/revoke_token/',
            'params' => array(
                AuthenticationFields::APP_ID => $this->getAppId(),
                AuthenticationFields::SECRET => $this->getAppSecret(),
                AuthenticationFields::ACCESS_TOKEN => $accessToken
            )
        ) );
    }
}

?>