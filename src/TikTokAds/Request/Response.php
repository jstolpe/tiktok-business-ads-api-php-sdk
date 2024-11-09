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
 * Response
 *
 * Responsible for to the API response.
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class Response {
    /**
     * @var Client $client client used for the request.
     */
    protected $client;

    /**
     * @var Request $request request that generated the response.
     */
    protected $request;

    /**
     * @var string $code response code.
     */
    public $code;

    /**
     * @var string $message response message.
     */
    public $message;

    /**
     * @var string $requestId response request log id.
     */
    public $requestId;

    /**
     * @var object $data response data.
     */
    public $data;

    /**
     * Contructor for instantiating a response.
     *
     * @param Request $request request that generated the response.
     * @param Object $client client used for the request.
     * @return void
     */
    public function __construct( $request, $client ) {
        // set client
        $this->client = $client;

        // set request
        $this->request = $request;

        if ( $client->getErrorCode() ) { // client issues
            // set error code from client
            $this->code = $client->getErrorCode();

            // set error message from client
            $this->message = $client->getErrorMessage();
        } else { // go ahead and get values from response
            // get client body as object
            $clientBody = $client->getResponseBody();

            // set code from client
            $this->code = $clientBody->code;

            // set message from client
            $this->message = $clientBody->message;

            // set request id from client
            $this->requestId = $clientBody->request_id;

            // set data from client
            $this->data = property_exists( $clientBody, 'data' ) ? $clientBody->data : '';

            if ( !$this->code && property_exists( $clientBody, 'access_token' ) ) { // no error code for oauth/token endpoint which does not have the data object
                $this->data->access_token = $clientBody->access_token;
                $this->data->advertiser_ids = $clientBody->advertiser_ids;
                $this->data->scope = $clientBody->scope;
                $this->data->token_type = $clientBody->token_type;
            }
        }
    }

    /**
     * Return the request.
     *
     * @return Requets
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Return if has errors.
     *
     * @return boolean
     */
    public function hasErrors() {
        return $this->code;
    }

    /**
     * Return if we have pagination.
     *
     * @return boolean
     */
    public function hasPagination() {
        return $this->data && property_exists( $this->data, 'page_info' );
    }
}

?>