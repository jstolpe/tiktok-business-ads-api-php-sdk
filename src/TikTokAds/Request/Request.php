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
namespace TikTokAds\Request;

/**
 * Request
 *
 * Responsible for setting up the request to the API.
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class Request {
    /**
     * @const string METHOD_GET HTTP GET method.
     */
    const METHOD_GET = 'GET';

    /**
     * @const string METHOD_POST HTTP POST method.
     */
    const METHOD_POST = 'POST';

    /**
     * @const string METHOD_DELETE HTTP DELETE method.
     */
    const METHOD_DELETE = 'DELETE';

    /**
     * @const string DOMAIN_PRODUCTION domain for production
     */
    const DOMAIN_PRODUCTION = 'https://business-api.tiktok.com/open_api';

    /**
     * @const string DOMAIN_SANDBOX domain for sandbox
     */
    const DOMAIN_SANDBOX = 'https://sandbox-ads.tiktok.com/open_api';

    /**
     * @var string $accessToken the access token to use for this request.
     */
    protected $accessToken;

    /**
     * @var string $apiVersion the version we want to use.
     */
    protected $apiVersion;

    /**
     * @var string $baseUrl the base url of our endpoint.
     */
    protected $baseUrl;

    /**
     * @var string $method the HTTP method for this request.
     */
    protected $method;

    /**
     * @var string $endpoint the Graph endpoint for this request.
     */
    protected $endpoint;

    /**
     * @var array $params the parameters to send with this request.
     */
    protected $params = array();

    /**
     * @var string $url endpoint url.
     */
    protected $url;

    /**
     * Contructor for instantiating a request.
     *
     * @param string $method the method type for the request.
     * @param string $endpoint the endpoint for the request.
     * @param array  $params the parameters to be sent along with the request.
     * @param string $apiVersion the api version for the request.
     * @param string $accessToken the access token to go along with the request.
     * @return void
     */
    public function __construct( $method, $endpoint = '', $params = array(), $apiVersion = '', $accessToken = '', $environment = '' ) {
        // set HTTP method
        $this->method = strtoupper( $method );

        // set base url based on environment
        $this->baseUrl = 'sandbox' == $environment ? self::DOMAIN_SANDBOX : self::DOMAIN_PRODUCTION;

        // set endptoint
        $this->apiVersion = $apiVersion;

        // set endptoint
        $this->endpoint = $endpoint;

        // set any params
        $this->params = $params;

        // set access token
        $this->accessToken = $accessToken;

        // generate the full url
        $this->setUrl();
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
     * Return the endpoint for this request.
     *
     * @return string
     */
    public function getEndpoint() {
        return $this->endpoint;
    }
    
    /**
     * Return the HTTP method for this request.
     *
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Return the params for this request.
     *
     * @return array
     */
    public function getParams() {
        // return params array
        return $this->params;
    }

    /**
     * Return the endpoint URL this request.
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set the full url for the request.
     *
     * @return void
     */
    public function setUrl() {
        // generate the full url
        $this->url = $this->baseUrl . '/' . $this->apiVersion . $this->endpoint;

        if ( $this->getMethod() !== Request::METHOD_POST ) { // not post so we have to add url vars
            // get the params
            $params = $this->getParams();

            foreach ( $params as $key => $value ) { // loop over params
                // if not a string json encode the value
                $params[$key] = is_string( $value ) ? $value : json_encode( $value );
            }

            // build the query string and append to url
            $this->url .= '?' . http_build_query( $params );
        }
    }
}

?>