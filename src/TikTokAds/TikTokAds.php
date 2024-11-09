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
namespace TikTokAds;

// other classes to use
use TikTokAds\Request\Curl;
use TikTokAds\Request\Request;

/**
 * TikTokAds
 *
 * Core functionality for talking to the TikTok Business Ads API.
 *
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class TikTokAds {
    /**
     * @const string Default Graph API version for requests.
     */
    const DEFAULT_API_VERSION = 'v1.3';

    /**
     * @var string $accessToken access token to use with requests.
     */
    protected $accessToken;

    /**
     * @var string $apiVersion the version we want to use.
     */
    protected $apiVersion;

    /**
     * @var string $appId app id.
     */
    protected $appId;

    /**
     * @var string $appSecret app secret.
     */
    protected $appSecret;

    /**
     * @var object $client the client service.
     */
    protected $client;

    /**
     * @var string $environment the environment in which to run TikTok Ads.
     */
    protected $environment;

    /**
     * @var Request $lastResponse the request to the api.
     */
    protected $lastResponse;

    /**
     * @var Next page request $nextPageRequest the request for the next page.
     */
    public $nextPageRequest;

    /**
     * @var Previous page request $prevPageRequest the request for the previous page.
     */
    public $prevPageRequest;

    /**
     * @var Request $request the request to the api.
     */
    protected $request;

    /**
     * Contructor for instantiating a new TikTokAds object.
     *
     * @param array $config for the class.
     *      'app_id'       => string the app id
     *      'app_secret'   => string the app secret
     *      'environment'  => string the environment to run TikTok Ads defaults to production use sandbox for sandbox mode
     *      'api_version'  => string version of the api to use defaults to self::DEFAULT_API_VERSION
     *      'access_token' => string the access token
     * @return void
     */
    public function __construct( $config ) {
        // set environment make sure it is set to either sandbox or production
        $this->environment = isset( $config['environment'] ) && 'sandbox' == $config['environment'] ? $config['environment'] : 'production';

        // set api version
        $this->apiVersion = isset( $config['api_version'] ) ? $config['api_version'] : self::DEFAULT_API_VERSION;

        // instantiate the client
        $this->client = new Curl();

        // set our access token
        $this->setAccessToken( isset( $config['access_token'] ) ? $config['access_token'] : '' );

        // set our app id
        $this->setAppId( isset( $config['app_id'] ) ? $config['app_id'] : '' );

        // set our app secret
        $this->setAppSecret( isset( $config['app_secret'] ) ? $config['app_secret'] : '' );
    }

    /**
     * Sends a GET request and returns the result.
     *
     * @param array $params params for the GET request.
     * @return response.
     */
    public function get( $params ) {
        // check for params
        $endpointParams = isset( $params['params'] ) ? $params['params'] : array();

        // perform GET request
        return $this->sendRequest( Request::METHOD_GET, $params['endpoint'], $endpointParams );
    }

    /**
     * Get the client.
     *
     * @return Client
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Get the last response.
     *
     * @return Client
     */
    public function getLastResponse() {
        return $this->lastResponse;
    }

    /**
     * Sends a POST request and returns the result.
     *
     * @param array $params params for the POST request.
     * @return response.
     */
    public function post( $params ) {
        // check for params
        $endpointParams = isset( $params['params'] ) ? $params['params'] : array();

        // perform POST request
        return $this->sendRequest( Request::METHOD_POST, $params['endpoint'], $endpointParams );
    }

    /**
     * Next page for pagination.
     *
     * @return response.
     */
    public function getPageNext() {
        if ( $this->nextPageRequest ) { // set request
            // set request
            $this->request = $this->nextPageRequest;

            // perform request
            return $this->sendRequest( $this->request->getMethod(), $this->request->getEndpoint(), $this->request->getParams() );
        }
    }

    /**
     * Previous page for pagination.
     *
     * @return response.
     */
    public function getPagePrev() {
        if ( $this->prevPageRequest ) { // set request
            $this->request = $this->prevPageRequest;

            // perform request
            return $this->sendRequest( $this->request->getMethod(), $this->request->getEndpoint(), $this->request->getParams() );
        }
    }

    /**
     * Send a request to the TikTok API and returns the result.
     *
     * @param string $method HTTP method.
     * @param string $endpoint endpoint for the request.
     * @param string $params parameters for the endpoint.
     * @return response.
     */
    public function sendRequest( $method, $endpoint, $params ) {
        // create our request
        $this->request = new Request( $method, $endpoint, $params, $this->apiVersion, $this->getAccessToken(), $this->environment );

        // send the request to the client for processing
        $this->lastResponse = $this->client->send( $this->request );

        if ( $this->lastResponse->hasPagination() && $this->lastResponse->data->page_info->page > 1 ) { // we have a prev page
             $params['page'] = $this->lastResponse->data->page_info->page - 1;
             $this->prevPageRequest = new Request( $method, $endpoint, $params, $this->apiVersion, $this->getAccessToken(), $this->environment );
        }

        if ( $this->lastResponse->hasPagination() && $this->lastResponse->data->page_info->page < $this->lastResponse->data->page_info->total_page ) { // we have a next page
            $params['page'] = $this->lastResponse->data->page_info->page + 1;
            $this->nextPageRequest = new Request( $method, $endpoint, $params, $this->apiVersion, $this->getAccessToken(), $this->environment );
        }

        // return the response
        return $this->lastResponse;
    }

    /**
     * Return the app id.
     *
     * @return string
     */
    public function getAppId() {
        return $this->appId;
    }

    /**
     * Return the app secret.
     *
     * @return string
     */
    public function getAppSecret() {
        return $this->appSecret;
    }

    /**
     * Return the access token.
     *
     * @return string
     */
    public function getAccessToken() {
        return $this->accessToken;
    }

    /**
     * Set the access token.
     *
     * @param string $accessToken set the access token.
     * @return void.
     */
    public function setAccessToken( $accessToken ) {
        $this->accessToken = $accessToken;
    }

    /**
     * Set the app id.
     *
     * @param string $appId set the app id.
     * @return void.
     */
    public function setAppId( $appId ) {
        $this->appId = $appId;
    }

    /**
     * Set the app secret.
     *
     * @param string $appId set the app secret.
     * @return void.
     */
    public function setAppSecret( $appSecret ) {
        $this->appSecret = $appSecret;
    }
}

?>