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

/**
 * AuthenticationFields
 *
 * Responsible for endpoint field defines.
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class AuthenticationFields {
    const APP_ID = 'app_id';
    const ACCESS_TOKEN = 'access_token';
    const ADVERTISER_IDS = 'advertiser_ids';
    const AUTH_CODE = 'auth_code';
    const CLIENT_ID = 'client_id';
    const CLIENT_SECRET = 'client_secret';
    const CODE ='code';
    const CREATION_FILTER_START_TIME = 'creation_filter_start_time';
    const EXCLUDE_FIELD_TYPES_IN_RESPONSE = 'exclude_field_types_in_response';
    const FIELDS = 'fields';
    const FILTERING = 'filtering';
    const GRANT_TYPE = 'grant_type';
    const IS_SMART_PERFORMANCE_CAMPAIGN = 'is_smart_performance_campaign'; 
    const OBJECTIVE_TYPE = 'objective_type';
    const OPTIMIZATION_GOAL = 'optimization_goal';
    const PAGE = 'page';
    const PAGE_SIZE = 'page_size';
    const PRIMARY_STATUS = 'primary_status';
    const REDIRECT_URI = 'redirect_uri';
    const SCOPE = 'SCOPE';
    const SECONDARY_STATUS = 'secondary_status';
    const SECRET = 'secret';
    const STATE = 'state';
}

?>