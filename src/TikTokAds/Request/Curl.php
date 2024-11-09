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

// other classes we need to use
//use TikTokAds\Request\Request;

/**
 * Curl
 *
 * Handle curl functionality for requests.
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class Curl {
	/**
     * @var object $curl
     */
    protected $curl;

    /**
     * @var int $curlErrorCode The curl client error code
     */
    protected $curlErrorCode = 0;

    /**
     * @var string $curlErrorMessage The client error message
     */
    protected $curlErrorMessage = '';

	/**
     * @var string $rawResponse The raw response from the server.
     */
    protected $rawResponse;

    /**
     * Return curl error code.
     *
     * @return string
     */
    public function getErrorCode() {
        // return code
        return $this->curlErrorCode;
    }

    /**
     * Return curl error message.
     *
     * @return string
     */
    public function getErrorMessage() {
        // return message
        return $this->curlErrorMessage;
    }

    /**
     * Return curl raw response.
     *
     * @return string
     */
    public function getRawResponse() {
        // return raw response
        return $this->rawResponse;
    }

    /**
     * Return curl response body.
     *
     * @return string
     */
    public function getResponseBody() {
        // return raw response
        return json_decode( $this->getRawResponse() );
    }

    /**
     * Perform a curl call.
     * 
     * @param Request $request
     * @return array The curl response.
     */
    public function send( $request ) {
        $options = array( // curl options for the connection
            CURLOPT_URL => $request->getUrl(),
            CURLOPT_RETURNTRANSFER => true, // Return response as string
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_CUSTOMREQUEST => $request->getMethod(),
            CURLOPT_CAINFO => __DIR__ . '/certs/cacert.pem',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        );

        if ( $request->getAccessToken() ) { // add access token to request
            $options[CURLOPT_HTTPHEADER][] = 'Access-Token: ' . $request->getAccessToken();
        }

        if ( $request->getMethod() == Request::METHOD_POST ) { // need to add on post fields as json
            $options[CURLOPT_POSTFIELDS] = json_encode( $request->getParams() );
        }

        // initialize curl
        $this->curl = curl_init();

        // set the options
        curl_setopt_array( $this->curl, $options );

        // raw response
        $this->rawResponse = curl_exec( $this->curl );

        if ( curl_errno( $this->curl ) ) { // curl errors
            // get error code
            $this->curlErrorCode = curl_errno( $this->curl );

            // get error message
            $this->curlErrorMessage = curl_error( $this->curl );
        }

        // close curl connection
        curl_close( $this->curl );

        // return a new response object
        return new Response( $request, $this );
    }
}

?>