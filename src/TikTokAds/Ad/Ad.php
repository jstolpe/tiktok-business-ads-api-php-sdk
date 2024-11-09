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
namespace TikTokAds\Ad;

// other classes we need to use
use TikTokAds\TikTokAds;

/**
 * Ad
 *
 * Perform actions on ad.
 *     - Endpoints: 
 *          - /ad/create/ POST
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739953377508354
 *          - /ad/get/ GET
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1735735588640770
 *          - /ad/update/
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739953405142018
 *          - /ad/status/update/
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1739953422970882
 *          - /ad/audience_size/estimate/
 *              - Docs: https://business-api.tiktok.com/portal/docs?id=1740302379236353
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class Ad extends TikTokAds {
    /**
     * @const TikTok endpoint for the request.
     */
    const ENDPOINT = 'ad';

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
     * Get audience size estimate.
     *
     * @param array $params params for the request.
     * @return response.
     */
    public function audienceSizeEstimate( $params ) {
        return $this->post( array( // make request
            'endpoint' => '/' . self::ENDPOINT . '/audience_size/estimate/',
            'params' => $params
        ) );
    }

    /**
     * Create
     *
     * @param array $params params for the request.
     * @return response.
     */
    public function create( $params ) {
        return $this->post( array( // make request
            'endpoint' => '/' . self::ENDPOINT . '/create/',
            'params' => $params
        ) );
    }
}

?>