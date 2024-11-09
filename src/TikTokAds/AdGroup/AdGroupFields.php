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
namespace TikTokAds\AdGroup;

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
class AdGroupFields {
    const ACTIONS = 'actions';
    const ACTION_CATEGORY_IDS = 'action_category_ids';
    const ACTION_SCENE = 'action_scene';
    const ACTION_PERIOD = 'action_period';
    const ADGROUP_APP_PROFILE_PAGE_STATE = 'adgroup_app_profile_page_state';
    const ADGROUP_ID = 'adgroup_id';
    const ADGROUP_IDS = 'adgroup_ids';
    const ADGROUP_NAME = 'adgroup_name';
    const ADVERTISER_ID = 'advertiser_id';
    const AGE_GROUPS = 'age_groups';
    const APP_DOWNLOAD_URL = 'app_download_url';
    const APP_ID = 'app_id';
    const APP_TYPE = 'app_type';
    const ATTRIBUTION_EVENT_COUNT = 'attribution_event_count';
    const AUDIENCE_IDS = 'audience_ids';
    const AUDIENCE_RULE = 'audience_rule';
    const AUDIENCE_TYPE = 'audience_type';
    const AUTO_TARGETING_ENABLED = 'auto_targeting_enabled';
    const BLOCKED_PANGLE_APP_IDS = 'blocked_pangle_app_ids';
    const BRAND_SAFETY_PARTNER = 'brand_safety_partner';
    const BRAND_SAFETY_TYPE = 'brand_safety_type';
    const BID_DISPLAY_MODE = 'bid_display_mode';
    const BID_PRICE = 'bid_price';
    const BID_STRATEGY = 'bid_strategy';
    const BID_TYPE = 'bid_type';
    const BILLING_EVENT = 'billing_event';
    const BUDGET = 'budget';
    const BUDGET_MODE = 'budget_mode';
    const CAMPAIGN_ID = 'campaign_id';
    const CAMPAIGN_IDS = 'campaign_ids';
    const CAMPAIGN_NAME = 'campaign_name';
    const CARRIER_IDS = 'carrier_ids';
    const CATELOG_AUTHORIZED_BD_ID = 'catalog_authorized_bc_id';
    const CATELOG_ID = 'catalog_id';
    const CATEGORY_EXCLUSION_IDS = 'category_exclusion_ids';
    const CLICK_ATTRIBUTION_WINDOW = 'click_attribution_window';
    const CODE = 'code';
    const COMMENT_DISABLED = 'comment_disabled';
    const CONTEXTUAL_TAG_IDS = 'contextual_tag_ids';
    const CONVERSION_BID_PRICE = 'conversion_bid_price';
    const CONVERSION_WINDOW = 'conversion_window';
    const CPV_VIDEO_DURATION = 'cpv_video_duration';
    const CREATE_TIME = 'create_time';
    const CREATIVE_MATERIAL_MODE = 'creative_material_mode';
    const CREATION_FILTER_END_TIME = 'creation_filter_end_time';
    const CREATION_FILTER_START_TIME = 'creation_filter_start_time';
    const DATA = 'data';
    const DAYPARTING = 'dayparting';
    const DAYS = 'days';
    const DEEP_BID_TYPE = 'deep_bid_type';
    const DEEP_CPA_BID = 'deep_cpa_bid';
    const DELIVERY_MODE = 'delivery_mode';
    const DEVIDE_MODEL_IDS = 'device_model_ids';
    const DEVICE_PRICE_RANGES = 'device_price_ranges';
    const END_TIME = 'end_time';
    const EXCLUDE_FIELD_TYPES_IN_RESPONSE = 'exclude_field_types_in_response';
    const EXCLUDED_AUDIENCE_IDS = 'excluded_audience_ids';
    const EXCLUDED_CUSTOM_ACTIONS = 'excluded_custom_actions';
    const EXCLUDED_PANGLE_AUDIENCE_PACKAGE_IDS = 'excluded_pangle_audience_package_ids';
    const EXPANSION_ENABLED = 'expansion_enabled';
    const EXPANSION_TYPES = 'expansion_types';
    const EXPECTED_ORDERS = 'expected_orders';
    const FIELDS = 'fields';
    const FILTERING = 'filtering';
    const FEED_TYPE = 'feed_type';
    const FREQUENCY = 'frequency';
    const FREQUENCY_SCHEDULE = 'frequency_schedule';
    const GENTER = 'gender';
    const HOUSEHOLD_INCOME = 'household_income';
    const IDENTITY_ID = 'identity_id';
    const IDENTITY_TYPE = 'identity_type';
    const IDENTITY_AUTHORIZED_BC_ID = 'identity_authorized_bc_id';
    const INCLUDED_CUSTOM_ACTIONS = 'included_custom_actions';
    const INCLUDED_PANGLE_AUDIENCE_PACKAGE_IDS = 'included_pangle_audience_package_ids';
    const INTEREST_CATEGORY_IDS = 'interest_category_ids';
    const INTEREST_KEYWORD_IDS = 'interest_keyword_ids';
    const IOS14_QUOTA_TYPE = 'ios14_quota_type';
    const IOS14_TARGETING = 'ios14_targeting';
    const IS_DRAFT = 'is_draft';
    const IS_HFSS = 'is_hfss';
    const IS_NEW_STRUCTURE = 'is_new_structure';
    const ISP_IDS = 'isp_ids';
    const IS_SMART_PERFORMANCE_CAMPAIGN = 'is_smart_performance_campaign';
    const LANGUAGES = 'languages';
    const LIST = 'list';
    const LOCATION_IDS = 'location_ids';
    const LOWER_END = 'lower_end';
    const MESSAGE = 'message';
    const MIN_ANDROID_VERSION = 'min_android_version';
    const MIN_IOS_VERSION = 'min_ios_version';
    const MODIFY_TIME = 'modify_time';
    const NETWORK_TYPES = 'network_types';
    const NEXT_DAY_RETENTION = 'next_day_retention';
    const OBJECTIVE_TYPE = 'objective_type';
    const OPERATION_STATUS = 'operation_status';
    const OPERATING_SYSTEM = 'operating_systems';
    const OPTIMIZATION_EVENT = 'optimization_event';
    const OPTIMIZATION_GOAL = 'optimization_goal';
    const PACING = 'pacing';
    const PAGE = 'page';
    const PAGE_SIZE = 'page_size';
    const PIXEL_ID = 'pixel_id';
    const PLACEMENTS = 'placements';
    const PLACEMENT_TYPE = 'placement_type';
    const PRIMARY_STATUS = 'primary_status';
    const PRODUCT_SOURCE = 'product_source';
    const PROMOTION_TARGET_TYPE = 'promotion_target_type';
    const PROMOTION_TYPE = 'promotion_type';
    const PROMOTION_WEBSITE_TYPE = 'promotion_website_type';
    const PURCHASE_INTENTION_KEYWORD_IDS = 'purchase_intention_keyword_ids';
    const PURCHASED_IMPRESSION = 'purchased_impression';
    const PURCHASED_REACH = 'purchased_reach';
    const ROAS_BID = 'roas_bid';
    const REQUEST_ID = 'request_id';
    const RF_ESTIMATED_CPR = 'rf_estimated_cpr';
    const RF_ESTIMATED_FREQUENCY = 'rf_estimated_frequency';
    const RF_PURCHASED_TYPE = 'rf_purchased_type';
    const SAVED_AUDIENCE_ID = 'saved_audience_id';
    const SEARCH_RESULT_ENABLED = 'search_result_enabled';
    const SECONDARY_STATUS = 'secondary_status';
    const SCHEDULE_END_TIME = 'schedule_end_time';
    const SCHEDULE_ID = 'schedule_id';
    const SCHEDULE_INFOS = 'schedule_infos';
    const SCHEDULE_START_TIME = 'schedule_start_time';
    const SCHEDULE_TYPE = 'schedule_type';
    const SCHEDULED_BUDGET = 'scheduled_budget';
    const SCHEDULES = 'schedules';
    const SECONDARY_OPTIMIZATION_EVENT = 'secondary_optimization_event';
    const SHARE_DISABLED = 'share_disabled';
    const SHOPPING_ADS_RETARGETING_ACTIONS_DAYS = 'shopping_ads_retargeting_actions_days';
    const SHOPPING_ADS_RETARGETING_CUSTOM_AUDIENCE_RELATION = 'shopping_ads_retargeting_custom_audience_relation';
    const SHOPPING_ADS_RETARGETING_TYPE = 'shopping_ads_retargeting_type';
    const SHOPPING_ADS_TYPE = 'shopping_ads_type';
    const SKIP_LEARNING_PHASE = 'skip_learning_phase';
    const SPENDING_POWER = 'spending_power';
    const SPLIT_TEST_GROUP_ID = 'split_test_group_id';
    const SPLIT_TEST_STATUS = 'split_test_status';
    const START_TIME = 'start_time';
    const STATISTIC_TYPE  = 'statistic_type';
    const STATUS = 'status';
    const STORE_ID = 'store_id';
    const STORE_AUTHORIZED_BC_ID = 'store_authorized_bc_id';
    const TARGETING_EXPANSION = 'targeting_expansion';
    const TOTAL_ADGROUP_QUOTA = 'total_adgroup_quota';
    const UPPER_END = 'upper_end';
    const USED_ADGROUP_QUOTA = 'used_adgroup_quota';
    const USER_COUNT = 'user_count';
    const USER_COUNT_STAGE = 'user_count_stage';
    const VERTICAL_SENSITIVITY_ID = 'vertical_sensitivity_id';
    const VIDEO_DOWNLOAD_DISABLED = 'video_download_disabled';
    const VIDEO_USER_ACTIONS = 'video_user_actions';
    const VIEW_ATTRIBUTION_WINDOW = 'view_attribution_window';
    const ZIPCODE_IDS = 'zipcode_ids';
}

?>