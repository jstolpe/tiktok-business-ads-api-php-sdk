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

/**
 * AdGroupFields
 *
 * Responsible for endpoint field defines.
 * 
 * @package     tiktok-business-ads-api-php-sdk
 * @author      Justin Stolpe
 * @link        https://github.com/jstolpe/tiktok-business-ads-api-php-sdk
 * @license     https://opensource.org/licenses/MIT
 * @version     1.0
 */
class AdFields {
    const ACO_AD_IDS = 'aco_ad_ids';
    const AD_ID = 'ad_id';
    const AD_IDS = 'ad_ids';
    const AD_FORMAT = 'ad_format';
    const AD_NAME = 'ad_name';
    const AD_TEXT = 'ad_text';
    const ADGROUP_ID = 'adgroup_id';
    const ADGROUP_IDS = 'adgroup_ids';
    const ADGROUP_NAME = 'adgroup_name';
    const ADVERTISER_ID = 'advertiser_id';
    const APP_NAME = 'app_name';
    const AVATAR_ICON_WEB_URI = 'avatar_icon_web_uri';
    const BRAND_SAFETY_POSTBID_PARTNER = 'brand_safety_postbid_partner';
    const BRAND_SAFETY_VAST_URL = 'brand_safety_vast_url';
    const CALL_TO_ACTION = 'call_to_action';
    const CALL_TO_ACTION_ID = 'call_to_action_id';
    const CAMPAIGN_ID = 'campaign_id';
    const CAMPAIGN_IDS = 'campaign_ids';
    const CAMPAIGN_NAME = 'campaign_name';
    const CARD_ID = 'card_id';
    const CAROUSEL_IMAGE_INDEX = 'carousel_image_index';
    const CATELOG_ID = 'catalog_id';
    const CLICK_TRACKING_URL = 'click_tracking_url';
    const CODE = 'code';
    const CREATE_TIME = 'create_time';
    const CREATIVE_AUTHORIZED = 'creative_authorized';
    const CREATIVE_MATERIAL_MODE = 'creative_material_mode';
    const CREATIVE_TYPE = 'creative_type';
    const CREATIVES = 'creatives';
    const CREATION_FILTER_END_TIME = 'creation_filter_end_time';
    const CREATION_FILTER_START_TIME = 'creation_filter_start_time';
    const DATA = 'data';
    const DARK_POST_STATUS = 'dark_post_status';
    const DEEPLINK = 'deeplink';
    const DEEPLINK_FORMAT_TYPE = 'deeplink_format_type';
    const DEEPLINK_TYPE = 'deeplink_type';
    const DESTINATION = 'destination';
    const DISCLAIMER_CLICKABLE_TEXTS = 'disclaimer_clickable_texts';
    const DISCLAIMER_TEXT = 'disclaimer_text';
    const DISCLAIMER_TYPE = 'disclaimer_type';
    const DISPLAY_NAME = 'display_name';
    const DYNAMIC_DESTINATION = 'dynamic_destination';
    const DYNAMIC_FORMAT = 'dynamic_format';
    const EXCLUDE_FIELD_TYPES_IN_RESPONSE = 'exclude_field_types_in_response';
    const FALLBACK_TYPE = 'fallback_type';
    const FIELDS = 'fields';
    const FILTERING = 'filtering';
    const IDENTITY_ID = 'identity_id';
    const IDENTITY_TYPE = 'identity_type';
    const IDENTITY_AUTHORIZED_BC_ID = 'identity_authorized_bc_id';
    const IMAGE_IDS = 'image_ids';
    const IMPRESSION_TRACKING_URL = 'impression_tracking_url';
    const INSTANT_PRODUCT_PAGE_USED = 'instant_product_page_used';
    const IS_ACO = 'is_aco';
    const IS_NEW_STRUCTURE = 'is_new_structure';
    const ITEM_DUET_STATUS = 'item_duet_status';
    const ITEM_GROUP_ID = 'item_group_id';
    const ITEM_GROUP_IDS = 'item_group_ids';
    const ITEM_STITCH_STATUS = 'item_stitch_status';
    const KEY = 'key';
    const LANDING_PAGE_URL = 'landing_page_url';
    const LIST = 'list';
    const MESSAGE = 'message';
    const MODIFY_TIME = 'modify_time';
    const MUSIC_ID = 'music_id';
    const OBJECTIVE_TYPE = 'objective_type';
    const OPERATION_STATUS = 'operation_status';
    const OPTIMIZATION_GOAL = 'optimization_goal';
    const PAGE = 'page';
    const PAGE_ID = 'pageid';
    const PAGE_IMAGE_INDEX = 'page_image_index';
    const PAGE_INFO = 'page_info';
    const PAGE_SIZE = 'page_size';
    const PATCH_UPDATE = 'patch_update';
    const PHONE_NUMBER = 'phone_number';
    const PHONE_REGION_CALLING_CODE = 'phone_region_calling_code';
    const PHONE_REGION_CODE = 'phone_region_code';
    const PLAYABLE_URL = 'playable_url';
    const PRIMARY_STATUS = 'primary_status';
    const PRODUCT_SET_ID = 'product_set_id';
    const PRODUCT_SPECIFIC_TYPE = 'product_specific_type';
    const PROMOTIONAL_MUSIC_DISABLED = 'promotional_music_disabled';
    const REQUEST_ID = 'request_id';
    const SECONDARY_STATUS = 'secondary_status';
    const SCHEDULE_ID = 'schedule_id';
    const SHOPPING_ADS_DEEPLINK_TYPE = 'shopping_ads_deeplink_type';
    const SHOPPING_ADS_FALLBACK_TYPE = 'shopping_ads_fallback_type;'
    const SHOPPING_ADS_VIDEO_PACKAGE_ID = 'shopping_ads_video_package_id';
    const SHOWCASE_PRODUCTS = 'showcase_products';
    const SKU_IDS = 'sku_ids';
    const STATUS = 'status';
    const STORE_ID = 'store_id';
    const TEXT = 'text';
    const TIKTOK_ITEM_ID = 'tiktok_item_id';
    const TIKTOK_PAGE_CATEGORY = 'tiktok_page_category';
    const TOTAL_NUMBER = 'total_number';
    const TOTAL_PAGE = 'total_page';
    const TRACKING_APP_ID = 'tracking_app_id';
    const TRACKING_OFFLINE_EVENT_SET_IDS = 'tracking_offline_event_set_ids';
    const TRACKING_PIXEL_ID = 'tracking_pixel_id';
    const URL = 'url';
    const UTM_PARAMS = 'utm_params';
    const VALUE = 'value';
    const VAST_MOAT_ENABLED = 'vast_moat_enabled';
    const VERTICAL_VIDEO_STRATEGY = 'vertical_video_strategy';
    const VIDEO_ID = 'video_id';
    const VIDEO_VIEW_TRACKING_URL = 'video_view_tracking_url';
    const VIEWABILITY_VAST_URL = 'viewability_vast_url';
    const VIEWABILITY_POSTBID_PARTNER = 'viewability_postbid_partnerv';
}

?>