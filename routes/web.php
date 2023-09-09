<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//home route
Route::get('/', ['middleware' => ['auth', 'guest'], function () {
    return view('welcome');
}]);

Route::get('home', ['middleware' => ['auth', 'guest'], function () {
    return view('welcome');
}]);

Route::get('build_number', function () {

    $dataResponse = [
        'build' => config('app.build_number'),
        'date' => \Carbon\Carbon::now(),
    ];

    return response()->json($dataResponse, 200);
});

/**
 * Advertiser controller routes
 */
Route::get('advertiser/home', 'AdvertiserController@advertiser');
Route::get('advertiser', 'AdvertiserController@advertiser');
Route::get('advertiser/dashboard', 'AdvertiserController@dashboard');
Route::get('advertiser/contacts', 'AdvertiserController@contacts');
Route::get('advertiser/campaigns', 'AdvertiserController@campaigns');
Route::get('advertiser/searchLeads', 'AdvertiserController@searchLeads');
Route::post('advertiser/searchLeads', 'AdvertiserController@searchLeads');
Route::get('advertiser/revenueStatistics', 'AdvertiserController@revenueStatistics');
Route::post('advertiser/revenueStatistics', 'AdvertiserController@revenueStatistics');
Route::post('advertiser/topTenCampaignsByRevenueYesterday', 'AdvertiserController@topTenCampaignsByRevenueYesterday');
Route::post('advertiser/topTenCampaignsByRevenueForCurrentWeek', 'AdvertiserController@topTenCampaignsByRevenueForCurrentWeek');
Route::post('advertiser/topTenCampaignsByRevenueForCurrentMonth', 'AdvertiserController@topTenCampaignsByRevenueForCurrentMonth');
Route::post('advertiser/leadCounts', 'AdvertiserController@leadCounts');
Route::post('advertiser/activeCampaigns', 'AdvertiserController@activeCampaigns');
Route::post('admin/advertiser/store', 'AdvertiserController@store');
Route::post('admin/advertiser/update/{id}', 'AdvertiserController@update');
Route::post('admin/advertiser/destroy', 'AdvertiserController@destroy');
//Route::post('get_cities_for_state', 'AdvertiserController@getCitiesByState');
Route::post('get_available_users_as_advertiser', 'AdvertiserController@getAvailableUsers');
Route::post('advertisers', 'AdvertiserController@index');
Route::post('advertisers/{id}/status', 'AdvertiserController@status');
//Route::get('activeAdvertiserPairs','AdvertiserController@activeAdvertiserPairs');

/**
 * Affiliate controller routes
 */
Route::get('affiliate/home', 'AffiliateController@affiliate');
Route::get('affiliate', 'AffiliateController@affiliate');
Route::get('affiliate/dashboard', 'AffiliateController@dashboard');
Route::get('affiliate/statistics', 'AffiliateController@statistics');
Route::get('affiliate/account', 'AffiliateController@account');
Route::get('affiliate/edit_account', 'AffiliateController@edit_account');
Route::post('affiliate/edit_account_contact_info', 'AffiliateController@edit_account_contact_info');
Route::get('affiliate/change_password', 'AffiliateController@change_password');
Route::post('affiliate/change_password_contact_info', 'AffiliateController@change_password_contact_info');
Route::get('affiliate/contacts', 'AffiliateController@contacts');
Route::get('affiliate/campaigns', 'AffiliateController@campaigns');
Route::get('affiliate/searchLeads', 'AffiliateController@searchLeads');
Route::post('affiliate/searchLeads', 'AffiliateController@searchLeads');
Route::get('affiliate/revenueStatistics', 'AffiliateController@revenueStatistics');
Route::post('affiliate/revenueStatistics', 'AffiliateController@revenueStatistics');
Route::post('affiliate/topTenCampaignsByRevenueYesterday', 'AffiliateController@topTenCampaignsByRevenueYesterday');
Route::post('affiliate/topTenCampaignsByRevenueForCurrentWeek', 'AffiliateController@topTenCampaignsByRevenueForCurrentWeek');
Route::post('affiliate/topTenCampaignsByRevenueForCurrentMonth', 'AffiliateController@topTenCampaignsByRevenueForCurrentMonth');
Route::post('affiliate/leadCounts', 'AffiliateController@leadCounts');
Route::post('affiliate/activeCampaigns', 'AffiliateController@activeCampaigns');
Route::post('affiliate/leads/{lead_id}/getLeadDetails', 'AffiliateController@getLeadDetails');
Route::get('affiliate/downloadSearchedLeads', 'AffiliateController@downloadSearchedLeads');
Route::get('affiliate/downloadRevenueReport', 'AffiliateController@downloadRevenueReport');
Route::post('get_cities_for_state', 'AffiliateController@getCitiesByState');
Route::post('add_affiliate', 'AffiliateController@store');
Route::post('edit_affiliate', 'AffiliateController@update');
Route::post('delete_affiliate', 'AffiliateController@destroy');
// Route::post('affiliate', 'AffiliateController@affiliate');
Route::post('affiliates', 'AffiliateController@index');
Route::post('get_available_users', 'AffiliateController@getAvailableUsers');
Route::get('affiliate/getRegRevenueBreakdown', 'AffiliateController@getRegRevenueBreakdown');
Route::get('affiliate/affiliateHostedStatistics', 'AffiliateController@affiliateHostedStatistics');
Route::get('affiliate/affiliateWebsiteViewsStatistics', 'AffiliateController@affiliateWebsiteViewsStatistics');
Route::get('affiliate/affiliateWebsiteStatistics', 'AffiliateController@affiliateWebsiteStatistics');
Route::post('affiliate/campaignList', 'AffiliateController@campaignList');
Route::get('affiliate/externalPathStatistics', 'AffiliateController@externalPathStatistics');
Route::post('affiliates/{id}/status', 'AffiliateController@status');
Route::get('affiliate/user_meta/update', 'AffiliateController@userMetaUpdate');

/* Affiliate Websites */
//Admin
Route::post('get_affiliate_website', 'AffiliateController@getWebsites');
Route::post('add_affiliate_website', 'AffiliateController@addWebsite');
Route::post('edit_affiliate_website', 'AffiliateController@editWebsite');
Route::post('delete_affiliate_website/{id}', 'AffiliateController@deleteWebsite');
Route::post('affiliate_website_payout', 'AffiliateController@updateAffiliateWebsitesPayouts');
Route::post('delete_multiple_affiliate_website', 'AffiliateController@deleteMulptipleWebsite');
Route::post('update_affiliate_website_status', 'AffiliateController@updateAffiliateWebsiteStatus');

//Affiliate Portal
Route::get('affiliate/websites', 'AffiliateController@websites');
Route::post('affiliate/get_websites', 'AffiliateController@getAffiliateWebsites');
Route::post('affiliate/update_website', 'AffiliateController@updateAffiliateWebsite');

/**
 * admin controller routes
 */
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'AdminController@index');
Route::get('admin/affiliates', 'AdminController@affiliates');
Route::get('admin/dashboard', 'AdminController@dashboard');
Route::get('admin/contacts', 'AdminController@contacts');
Route::get('admin/advertisers', 'AdminController@advertisers');
Route::get('admin/campaigns', 'AdminController@campaigns');
Route::get('admin/filtertypes', 'AdminController@filterTypes');
Route::get('admin/filtergroups', 'AdminController@filterGroups');
Route::get('admin/searchLeads', 'AdminController@searchLeads');
Route::post('admin/searchLeads', 'AdminController@searchLeads');
Route::get('admin/revenueStatistics', 'AdminController@revenueStatistics');
Route::post('admin/revenueStatistics', 'AdminController@revenueStatistics');
Route::post('admin/leads/{lead_id}/getLeadDetails', 'AdminController@getLeadDetails');
Route::post('admin/leadsArchive/{lead_id}/getLeadDetails', 'LeadArchiveController@getLeadDetails');
Route::post('admin/updateLeadDetails', 'AdminController@updateLeadDetails');
Route::get('admin/downloadSearchedLeads', 'AdminController@downloadSearchedLeads');
Route::get('admin/downloadRevenueReport', 'AdminController@downloadRevenueReport');
Route::get('admin/settings', 'AdminController@settings');
Route::post('admin/updateSettings', 'AdminController@updateSettings');
Route::post('admin/leadCounts', 'AdminController@leadCounts');
Route::post('admin/topTenCampaignsByRevenueYesterday', 'AdminController@topTenCampaignsByRevenueYesterday');
Route::post('admin/topTenCampaignsByRevenueForCurrentWeek', 'AdminController@topTenCampaignsByRevenueForCurrentWeek');
Route::post('admin/topTenCampaignsByRevenueForCurrentMonth', 'AdminController@topTenCampaignsByRevenueForCurrentMonth');
Route::post('admin/topTenAffiliatesByRevenueYesterday', 'AdminController@topTenAffiliatesByRevenueYesterday');
Route::post('admin/topTenAffiliatesByRevenueForCurrentWeek', 'AdminController@topTenAffiliatesByRevenueForCurrentWeek');
Route::post('admin/topTenAffiliatesByRevenueForCurrentMonth', 'AdminController@topTenAffiliatesByRevenueForCurrentMonth');
Route::get('admin/activeCampaigns', 'AdminController@activeCampaigns');
Route::post('admin/activeCampaignsServerSide', 'AdminController@activeCampaignsServerSide');
Route::get('admin/zip_master', 'AdminController@zip_master');
Route::get('admin/zip_codes', 'AdminController@zip_codes');
Route::get('admin/survey_takers', 'AdminController@survey_takers');
Route::post('admin/getTopCampaignsByLeads', 'AdminController@getTopCampaignsByLeads');
Route::post('getRevenueStatistics', 'AdminController@getRevenueStatistics');
Route::post('getSearchLeads', 'AdminController@getSearchLeads');
Route::get('admin/cake_conversions', 'AdminController@cake_conversions');
Route::post('dashboard/offerGoesDownStats', 'DashboardController@offerGoesDownStats');
Route::post('dashboard/campaignRevenueBreakdown/{id}', 'DashboardController@campaignRevenueBreakdown');
Route::post('dashboard/pathSpeed/{path}', 'DashboardController@pathSpeed');
Route::get('getLeadRejectionRateSettings', 'AdminController@getLeadRejectionRateSettings');
Route::post('updateLeadRejectionRateSettings', 'AdminController@updateLeadRejectionRateSettings');

//Documentations
Route::get('admin/shortcodes', 'AdminController@shortcodes');
Route::get('admin/eiq_http_request', 'AdminController@eiqHttpRequestDoc');

/**
 * Cake Conversions Controller
 */
Route::post('admin/cake_conversions_list', 'CakeConversionController@index');

/**
 * Dashboard controller routes
 */
Route::post('get_dashboard_graphs_by_date', 'AdminController@getDashboardGraphsStatisticsProcessor');
Route::post('download_affiliate_report', 'AdminController@downloadAffiliateReport');
Route::post('admin/getTotalSurveyTakersPerAffiliate', 'AdminController@getTotalSurveyTakersPerAffiliate');
Route::post('get_affiliate_survey_takers_by_date', 'AdminController@affiliateSurveyTakersStatisticsProcessor');
//graphs
Route::post('dashboard_rev_stats', 'AdminController@getReceivedRevenueStatisticsDashboard');
Route::post('dashboard_affiliate_rev_stats', 'AdminController@getAffiliateRevenueStatisticsDashboard');
Route::post('dashboard_survey_takers', 'AdminController@getAffiliateSurveyTakersDashboard');

/**
 * Lead users controller routes
 */
Route::post('surveyTakers', 'LeadUsersController@index');
Route::get('admin/downloadSurveyTakers', 'LeadUsersController@downloadSurveyTakers');

Route::get('cron/all_inbox/', 'LeadUsersController@allInboxEmailFeed');
Route::get('cron/all_inbox/{status}', 'LeadUsersController@allInboxEmailFeed');
/**
 * CronController routes
 */
Route::get('cron/transferFinishedCronJobs', 'CronController@transferFinishedCronJobs');
Route::get('admin/cron_job', 'AdminController@cronJob');
Route::post('getCurrentCronJob', 'CronController@getCronJob');
Route::get('admin/cron_history', 'AdminController@cronHistory');
Route::post('getHistoryCronJob', 'CronController@getCronHistory');

/**
 * ZipMaster controller routes
 */
Route::get('zipMaster', 'ZipMasterController@index');
Route::get('zipCode', 'ZipCodeController@index');

/***
 * contact controller routes
 */
Route::post('admin/contact/store', 'ContactController@store');
Route::post('admin/contact/update/{id}', 'ContactController@update');
Route::post('admin/contact/delete/{id}', 'ContactController@destroy');
Route::post('contacts', 'ContactController@index');

/**
 * filter type controller routes
 */
Route::post('admin/filter/store', 'FilterTypeController@store');
Route::post('admin/filtertype/update/{id}', 'FilterTypeController@update');
Route::post('admin/filtertype/delete/{id}', 'FilterTypeController@destroy');
Route::post('filtertypes', 'FilterTypeController@index');

/**
 * campaign filter group and filters controller routes
 */
Route::post('get_campaign_filter_group_filters', 'CampaignController@getCampaignFilterGroupFilters');
Route::post('add_campaign_filter_group', 'CampaignController@addCampaignFilterGroup');
Route::post('edit_campaign_filter_group', 'CampaignController@editCampaignFilterGroup');
Route::post('delete_campaign_filter_group', 'CampaignController@deleteCampaignFilterGroup');
// Route::post('get_campaign_filters', 'CampaignController@getCampaignFilters');
Route::post('add_campaign_filter', 'CampaignController@addCampaignFilter');
Route::post('edit_campaign_filter', 'CampaignController@editCampaignFilter');
Route::post('delete_campaign_filter', 'CampaignController@deleteCampaignFilter');

/**
 * Campaign Controller Routes
 **/
Route::get('admin/campaigns', 'AdminController@campaigns');
Route::post('add_campaign', 'CampaignController@store');
Route::post('edit_campaign', 'CampaignController@update');
Route::post('delete_campaign', 'CampaignController@destroy');
Route::post('get_available_affiliates_for_campaigns', 'CampaignController@getAvailableAffiliates');
Route::post('get_affiliates_for_campaigns_data', 'CampaignController@getAffiliatesData');
//Route::post('add_affiliate_for_campaign', 'CampaignController@addAffiliateForCampaign');
//Route::post('update_affiliate_for_campaign', 'CampaignController@updateAffiliateForCampaign');
//Route::post('delete_affiliate_for_campaign', 'CampaignController@deleteAffiliateForCampaign');
Route::post('add_campaign_affiliate', 'CampaignController@addCampaignAffiliate');
Route::post('edit_campaign_affiliate', 'CampaignController@editCampaignAffiliate');
Route::post('delete_campaign_affiliate', 'CampaignController@deleteCampaignAffiliate');
//Route::get('get_campaign_info', 'CampaignController@getCampaignInfo'); //KARLA Ver
Route::post('get_campaign_info', 'CampaignController@getCampaignInfo'); //LIVE Ver
Route::post('add_campaign_payout', 'CampaignController@addCampaignPayout');
Route::post('edit_campaign_payout', 'CampaignController@editCampaignPayout');
Route::post('delete_campaign_payout', 'CampaignController@deleteCampaignPayout');
Route::post('edit_campaign_config', 'CampaignController@editCampaignConfig');
Route::post('campaign_config_interface', 'CampaignController@campaignConfigInterface');
Route::post('checkCampaignDailyStatus', 'CampaignController@checkCampaignDailyStatus');
Route::get('checkCampaignDailyStatus', 'CampaignController@checkCampaignDailyStatus');
Route::post('edit_campaign_long_content', 'CampaignController@editCampaignLongContent');
Route::post('edit_campaign_stack_content', 'CampaignController@editCampaignStackContent');
Route::post('edit_campaign_high_paying_content', 'CampaignController@editCampaignHighPayingContent');
Route::post('edit_campaign_posting_instruction', 'CampaignController@editCampaignPostingInstruction');
//Route::get('campaigns', 'CampaignController@index'); //LIVE ver
Route::post('campaigns', 'CampaignController@index'); //KARLA ver
Route::post('get_campaigns_for_sort', 'CampaignController@getNameIDPriority');
Route::post('update_campaigns_priority', 'CampaignController@updateCampaignPriority');
Route::post('get_campaigns_by_revenue_for_sort', 'CampaignController@sortCampaignByRevenue');
Route::post('get_campaign_content', 'CampaignController@getCampaignContentFormBuilder');
Route::post('get_campaign_json_content', 'CampaignController@getCampaignJsonContent');
Route::post('campaign_form_builder', 'CampaignController@formCampaignContent');
Route::post('campaign_json_form_builder', 'CampaignController@formCampaignJsonContent');
Route::post('update_campaign_stack_lock', 'CampaignController@updateCampaignStackLockStatus');
Route::post('campaign_upload_field_options', 'CampaignController@uploadFieldOptions');
Route::post('campaign_affiliates_datatable', 'CampaignController@campAffiliateDataTable');
Route::post('get_campaign_affiliates', 'CampaignController@getCampaignAffiliateDatatable');
Route::post('get_available_affiliates_for_campaign', 'CampaignController@getAvailableCampaignAffiliates');
Route::post('get_available_affiliates_for_campaign_payout', 'CampaignController@getAvailableAffiliatePayouts');
Route::post('get_campaign_payout_history', 'CampaignController@payoutHistoryTable');

/**
 * revenue trackers controller routes
 */
Route::get('admin/revenuetrackers', 'AdminController@revenueTrackers');
Route::post('add_revenue_tracker', 'RevenueTrackerController@store');
Route::post('edit_revenue_tracker', 'RevenueTrackerController@update');
Route::post('delete_revenue_tracker', 'RevenueTrackerController@destroy');
Route::post('revenue_trackers', 'RevenueTrackerController@index');
Route::post('revenue_tracker_campaign_order/{id}', 'RevenueTrackerController@campaignOrderDetails');
Route::post('update_revenue_tracker_campaign_order', 'RevenueTrackerController@updateCampaignOrder');
Route::post('update_revenue_tracker_mixed_coreg_campaign_order', 'RevenueTrackerController@updateMixedCoregCampaignOrder');
Route::post('revenue_tracker_mixed_coreg_campaign_order/{id}', 'RevenueTrackerController@mixedCoregCampaignOrderDetails');
Route::get('downloadRevenueTrackers', 'RevenueTrackerController@download');
Route::post('exitPageRevTrackers', 'RevenueTrackerController@getRevenueTrackersWithExitPageDataTable');
Route::post('update_rev_tracker_to_exit_page_list', 'RevenueTrackerController@changeRevTrackerExitPage');

/**
 *Gallery Controller Routes
 */
Route::get('admin/gallery', 'AdminController@gallery');
Route::post('add_gallery_image', 'GalleryController@store');
Route::post('delete_gallery_image', 'GalleryController@destroy');

/**
 * Lead Controller Routes
 */
Route::get('sendLead', 'LeadController@store');
//Route::post('sendLead', 'LeadController@store');
Route::post('updateLeadsToPendingStatus/{strLeadIDs}', 'LeadController@updateLeadsToPendingStatus');
Route::get('sendPendingLeads', 'LeadController@sendPendingLeads');

Route::group(['middleware' => 'api.basic_auth', 'prefix' => 'api'], function () {
    /*
    Route::get('testing', function () {
        return "awts";
    });
    */

    Route::get('logPageView', 'ApiController@logPageView');
    Route::post('logPageView', 'ApiController@logPageView');

    //Route::get('generateLeadURLs','ApiController@generateLeadURLs');
    //Route::get('removeDuplicateLeads','ApiController@removeDuplicateLeads');

    /* FOR PATH Routes */
    // Route::get('get_campaign_list', 'FilterController@campaignListProcessor');
    Route::get('get_filter_type_question', 'FilterTypeController@getFilterTypeQuestion');
    Route::get('get_path_additional_details', 'FilterController@getPathAddDetails');

    /* LONG PATH */
    Route::get('get_campaign_content', 'FilterController@campaignProcessor'); /*Ajax Version*/
    Route::get('get_campaign_content_php', 'FilterController@campaignProcessorPhp'); /*Curl Version*/
    Route::get('get_campaign_long_content', 'FilterController@campaignProcessorPhp');

    /* STACK PATH */
    Route::get('get_stack_campaign_content_php', 'FilterController@campaignStackProcessorPhp'); /*Curl Version*/
    Route::get('get_campaign_stack_content', 'FilterController@campaignStackProcessorPhp');
    Route::get('get_stack_campaign_content_json', 'FilterController@campaignStackProcessorJSON'); /*Curl Version*/
    Route::get('get_stack_campaign_content_array', 'FilterController@campaignStackProcessorArray');

    /* HPCS PATH */
    Route::get('get_high_paying_list_campaigns', 'FilterController@highPayingCampaignListProcessor');
    Route::get('get_high_paying_content', 'FilterController@getHighPayingContentCurl');
    Route::get('get_high_paying_content_ajax', 'FilterController@getHighPayingContentAjax');

    /* ZIP */
    Route::get('zip_details', 'FilterController@getZipDetails');

    /* Conversion APIs */
    Route::get('getConversionsEmailOfferID', 'CakeConversionController@getConversionsEmailOfferID');
    Route::get('getConversionsByAffiliateOfferS4', 'CakeConversionController@getConversionsByAffiliateOfferS4');

    /* NEW PATH */
    Route::get('get_campaign_content_by_id', 'FilterController@getCampaignContentByID'); //returns array
    // Route::get('get_campaign_list', 'FilterController@registerUserAndGetCampaigns');
    Route::get('get_campaign_list', 'CampaignListController@registerUserAndGetCampaigns');
    Route::post('get_campaign_list', 'CampaignListController@registerUserAndGetCampaigns');
    Route::get('get_campaign_creative_id', 'FilterController@getCampaignCreativeID');
    Route::get('get_random_campaign_creative_id', 'FilterController@getRandomCampaignCreativeID');
    Route::get('get_campaign_type', 'FilterController@getCampaignType');

    Route::get('track_campaign_nos', 'FilterController@trackCampaignNos');
    Route::get('get_all_campaign_by_campaign_type', 'FilterController@getAllCampaignsFromCampaignType');
    Route::get('get_all_campaign_for_testing', 'FilterController@getAllCampaignsForQA');

    Route::get('get_user_info_using_email', 'FilterController@getUserInfoByEmail');

    Route::get('get_campaign_list_json', 'CampaignList2Controller@index');
    Route::get('get_campaign_list_json_2', 'CampaignList2Controller@capaignListJson');
    Route::get('save_lead_user', 'CampaignList2Controller@saveLeadUser');

    Route::get('users/{id}/update', 'FilterController@updateLeadUserDetails');
});

Route::get('downloadSearchedLeadsAdvertiserData', 'ReportServerController@downloadSearchedLeadsAdvertiserData');

/* ZIP */
Route::get('zip_checker', 'FilterController@zipValidationChecker');

/**
 * User management routes
 */
Route::get('admin/user_management', 'UserController@index');
Route::get('admin/users', 'UserController@users');
Route::post('admin/user/save', 'UserController@store');
Route::post('admin/user/{id}/delete', 'UserController@destroy');
Route::post('admin/user/{id}/update', 'UserController@update');
Route::get('admin/role_management', 'RoleController@index');
Route::get('admin/roles', 'RoleController@roles');
Route::get('admin/roles/save', 'RoleController@store');
Route::get('admin/roles/{id}/delete', 'RoleController@destroy');
Route::get('admin/roles/{id}/actions', 'RoleController@getActions');
Route::get('admin/roles/{id}/update', 'RoleController@update');

/**
 * Apply to Run Request
 */
Route::get('admin/affiliate_requests', 'AdminController@apply_to_run');
Route::post('apply_to_run', 'AffiliateRequestController@index');
Route::post('approve_affiliate_campaign_request', 'AffiliateRequestController@approve');
Route::post('reject_affiliate_campaign_request', 'AffiliateRequestController@reject');
Route::post('revert_affiliate_campaign_request', 'AffiliateRequestController@revert');
Route::get('affiliateRequestStatusList', 'AffiliateRequestController@affiliateRequestStatusList');
Route::post('receive_request_to_run_campaign', 'AffiliateRequestController@store');
Route::post('get_campaign_posting_instruction', 'AffiliateRequestController@getCampaignPostingInstruction');

/**
 * Categories
 */
Route::get('admin/categories', 'AdminController@categories');
Route::post('add_category', 'CategoryController@store');
Route::post('edit_category', 'CategoryController@update');
Route::post('delete_category', 'CategoryController@destroy');
Route::get('categoryNames', 'CategoryController@categoryNames');
Route::post('categories/{id}/status', 'CategoryController@status');
Route::post('getCategories', 'CategoryController@getCategories');

/**
 * Click Log Tracking
 */
Route::post('add_click_log_source', 'ClickLogRevTrackerController@store');
Route::post('delete_click_log_source', 'ClickLogRevTrackerController@destroy');
Route::post('getClickLogSources', 'ClickLogRevTrackerController@index');

/**
 * Duplicate Leads
 */
Route::get('admin/duplicateLeads', 'AdminController@duplicateLeads');
Route::post('admin/duplicateLeads', 'AdminController@duplicateLeads');
Route::get('admin/downloadSearchedDuplicateLeads', 'AdminController@downloadSearchedDuplicateLeads');

/**
 * Affiliate Reports
 */
Route::get('admin/affiliateReports', 'AdminController@affiliateReports');
Route::post('getAffiliateReports', 'AffiliateReportController@getAffiliateStats');
Route::post('getIframeAffiliateReports', 'AffiliateReportController@getIframeAffiliateStats');
Route::post('getHandPAffiliateReports', 'AffiliateReportController@getHandPStats');
Route::post('getHandPAffiliateSubIDReports', 'AffiliateReportController@getHandPSubIDStats');
Route::post('getHandPSubIDReports', 'AffiliateReportController@getSubIDStats');
Route::post('getWebsiteReports', 'AffiliateReportController@getWebsiteStats');
Route::post('getIframeWebsiteReports', 'AffiliateReportController@getIframeWebsiteStats');
Route::post('getRevenueTrackerReports', 'AffiliateReportController@revenueTrackerStats');
Route::post('getIframeRevenueTrackerReports', 'AffiliateReportController@iframeRevenueTrackerStats');
Route::post('getRevTrackerSubIDReports', 'AffiliateReportController@subIDStats');
Route::get('downloadRevTrackerSubIDReports', 'AffiliateReportController@downloadSubIDStats');
Route::post('uploadReports', 'AffiliateReportController@uploadReports');
// Route::get('downloadAffiliateReportXLS/{affiliate_type}/{snapshot_period}','AffiliateReportController@downloadAffiliateReportXLS');
Route::get('downloadAffiliateReportXLS', 'AffiliateReportController@downloadAffiliateReportXLS');
Route::get('generateAffiliateReportXLS/{affiliate_type}/{snapshot_period}', 'AffiliateReportController@generateAffiliateReportXLS');
Route::get('generateHandPAffiliateReportsXLS/{snapshot_period}', 'AffiliateReportController@generateHandPAffiliateReportsXLS');
//Route::get('downloadHandPAffiliateReportXLS/{snapshot_period}','AffiliateReportController@downloadHandPAffiliateReportXLS');
//Route::get('downloadIframeAffiliateReportXLS/{snapshot_period}','AffiliateReportController@downloadIframeAffiliateReportXLS');
Route::get('generateIframeAffiliateReportXLS/{snapshot_period}', 'AffiliateReportController@generateIframeAffiliateReportXLS');
//Route::get('testing/{affiliate_type}/{snapshot_period}','AffiliateReportController@test');
Route::get('regenerateAffiliateReportExcel', 'AffiliateReportController@regenerateAffiliateReportExcel');

/**
 * Coreg Reports
 */
Route::get('admin/coregReports', 'AdminController@coregReports');
Route::post('getCoregReports', 'CoregReportController@index');
Route::get('admin/downloadCoregReport', 'CoregReportController@download');

/**
 * Campaign Creatives
 */
Route::post('get_campaign_creative', 'CampaignController@getCampaignCreative');
Route::post('get_campaign_json_creative', 'CampaignController@getCampaignJsonCreative');
Route::post('edit_campaign_creative', 'CampaignController@updateCampaignCreative');
Route::post('add_campaign_creative', 'CampaignController@addCampaignCreative');
Route::post('delete_campaign_creative', 'CampaignController@deleteCampaignCreative');
Route::get('getCreativeReports', 'AdminController@coregReports');
Route::get('admin/creativeReports', 'AdminController@creativeReports');
Route::post('admin/creativeReports', 'AdminController@creativeReports');
Route::get('admin/downloadCreativeRevenueReport', 'AdminController@downloadCreativeRevenueReports');

/**
 * Survey Paths
 */
Route::get('admin/survey_paths', 'AdminController@surveyPaths');
Route::post('getSurveyPaths', 'PathController@index');
Route::post('add_path', 'PathController@store');
Route::post('edit_path', 'PathController@update');
Route::post('delete_path', 'PathController@destroy');

/**
 * Banned Leads
 */
Route::get('admin/banned/leads', 'AdminController@banned_leads');
Route::get('admin/banned/attempts', 'AdminController@banned_attempts');
Route::post('banned/leads', 'LeadUserBannedController@index');
Route::post('add_banned_lead', 'LeadUserBannedController@store');
Route::post('edit_banned_lead', 'LeadUserBannedController@update');
Route::post('delete_banned_lead', 'LeadUserBannedController@destroy');
Route::post('banned/attempts', 'BannedAttemptController@index');
Route::get('admin/banned/attempts/download', 'BannedAttemptController@download');

/*Click Log Tracer */
Route::get('admin/clickLogTracer', 'ClickLogTraceInfoController@index');
Route::post('click_log_info', 'ClickLogTraceInfoController@get');
Route::get('admin/clickLogTracer/download', 'ClickLogTraceInfoController@download');

/**
 * authentication routes
 */
Route::controllers([
    'auth' => 'AuthenticationController',
    'password' => 'Auth\PasswordController',
]);

Route::get('check-session', function () {
    return response()->json(['guest' => Auth::guest()]);
});

Route::get('session', 'FilterController@xsession');
Route::get('list', 'FilterController@getCampaignList');
Route::post('preview_campaign_content', 'AdminController@preview_content');
Route::get('users/{id}', 'UserController@user');
Route::post('user/profile_image_upload', 'UserController@profile_image_upload');
Route::post('user/updateProfile', 'UserController@updateProfile');
Route::post('user/changePassword', 'UserController@changePassword');

/* PREPING CHECKER */
Route::get('check_shop_your_way_ping', 'PingController@shopYourWayPing');
Route::get('check_global_test_market_ping', 'PingController@globalTestMarketPing');
Route::get('check_survey_and_quizzes_ping', 'PingController@surveyAndQuizzesPing');
Route::post('report_bug', 'BugReportController@receive');

Route::group(['middleware' => 'auth', 'prefix' => 'search'], function () {
    Route::post('select/activeRevenueTrackers', 'SearchController@activeRevenueTrackers');
    Route::post('select/activeAffiliates', 'SearchController@activeAffiliates');
    Route::post('select/activeAffiliatesIDName', 'SearchController@activeAffiliatesIDName');
    Route::post('select/activeAffiliate/{id}', 'SearchController@activeAffiliate');
    Route::post('select/campaignAffiliate', 'SearchController@campaignAffiliate');
    Route::post('select/revenueTrackers', 'SearchController@getRevenueTrackers');
    Route::post('select/availableRevTrackersForExitPage', 'SearchController@getAvailableRevenueTrackersForExitPage');
});

//prepop statistics download route
Route::get('downloadPrepopStatisticsReport', 'PrepopStatisticsController@downloadPrepopStatisticsReport');
Route::post('uploadCampaignPayout', 'CampaignController@uploadCampaignPayout');

/**
 * Graph and creative page in admin
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/chart', 'ChartController@view');
    Route::get('/chart/{version}', 'ChartController@view');
    Route::get('/creativeStatistics', 'CreativeController@index');
    Route::post('/creativeStatistics', 'CreativeController@statistics');
    Route::any('/download-creative-report', 'CreativeController@report');
    Route::get('prepopStatistics', 'AdminController@prepopStatistics');
    Route::post('prepopReportStatistics', 'PrepopStatisticsController@index');
    Route::post('getprepopReportStats', 'PrepopStatisticsController@getprepopReportStats');
    Route::get('clicksVsRegsStats', 'AdminController@clicksVsRegsStats');
    Route::post('getClicksVsRegsStats', 'AdminController@getClicksVsRegsStats');
    Route::get('downLoadClicksVsRegistrationReport', 'AdminController@downLoadClicksVsRegistrationReport');
    Route::get('pageViewStats', 'AdminController@pageViewStats');
    Route::post('getPageViewStats', 'AdminController@getPageViewStats');
    Route::get('downLoadPageViewStatisticsReport', 'AdminController@downLoadPageViewStatisticsReport');
    Route::get('pageOptinRateStats', 'AdminController@pageOptinRateStats');
    Route::post('pageOptIn', 'AdminController@pageOptIn');
    Route::get('downloadPageOptInRateReport', 'AdminController@downloadPageOptinRateStats');
    Route::get('consolidatedGraph', 'ConsolidatedGraphController@view')->name('consolidated_graph');
    Route::post('consolidatedGraph', 'ConsolidatedGraphController@view');
    Route::get('consolidatedGraph/export-excel-date-range', 'ConsolidatedGraphController@export2Excel');
    Route::get('consolidatedGraph/export-excel-all-affiliate', 'ConsolidatedGraphController@export2Excel');
    Route::get('consolidatedGraph/export-excel-all-inbox', 'ConsolidatedGraphController@export2Excel');
    Route::get('consolidatedGraph/export-excel-date-range-multiple', 'ConsolidatedGraphController@export2Excel');
    Route::get('userActionHistory', 'AdminController@userActionHistory');
    Route::post('userActionHistoryReport', 'AdminController@userActionHistoryReport');
    Route::post('campaignRevenueViewChangeServerSide', 'AdminController@campaignRevenueViewChangeServerSide');
    Route::post('getMostChangeCampaigns', 'AdminController@getMostChangeCampaigns');

    Route::get('campaign/rejection', 'CampaignRejectionController@view');
    Route::get('campaign/100percent_rejection', 'CampaignRejectionController@full_rejection_view');
});

/**
 * Campaign Affiliate Management
 */
Route::get('get_affiliate_autocomplete', 'AffiliateController@getAutocompleteAffiliate');
Route::post('campaigns/table/affiliate_managament', 'CampaignController@getCampaignInfoForAffiliateMgmt');
Route::post('campaign_affiliate_management', 'CampaignController@campaignAffiliateManagement');
Route::post('campaigns/datatable/affiliate_managament', 'CampaignController@getCampaignInfoForAffiliateMgmtDatatable');

Route::get('original/get_campaign_list', 'FilterController@campaignListProcessor');
Route::get('test/get_campaign_list', 'CampaignListController@registerUserAndGetCampaigns');
Route::get('winston/get_campaign_list', 'CampaignListJsonController@getCampaigns');
Route::get('test/survey_stack_curl', 'CampaignContentController@surveyStack');
Route::get('frame/get_campaign_list_by_api', 'CampaignListController@getCampaignsByApi');
Route::get('frame/survey_stack_curl', 'CampaignContentController@surveyStack');
Route::get('frame/survey_stack_curl_with_userdetails', 'CampaignContentController@surveyStackWithUserDetails');

Route::get('user-activities', 'UserActionLogController@all');
Route::post('user-activities', 'UserActionLogController@create');
Route::get('user-activities/{section_id}', 'UserActionLogController@get');
Route::get('user-activities/{section_id}/details', 'UserActionLogController@get');
Route::get('user-activities/{section_id}/details/{reference_id}', 'UserActionLogController@getByReference');
Route::get('user-activities/{section_id}/details/{reference_id}/{action}', 'UserActionLogController@details');

/**
 * Notes
 */
Route::post('notes_category', 'NotesController@get_categories');
Route::post('add_notes_category', 'NotesController@store_category');
Route::post('edit_notes_category', 'NotesController@update_category');
Route::post('delete_notes_category', 'NotesController@delete_category');
Route::post('get_notes_by_category/{category}', 'NotesController@get_notes_by_category');
Route::post('add_note', 'NotesController@store_note');
Route::post('edit_note', 'NotesController@update_note');
Route::post('delete_note', 'NotesController@delete_note');
Route::post('notes_tracking', 'NotesController@get_unread_stats');
Route::post('notes/{id}/viewed', 'NotesController@note_viewed');

/* Reports SERVER */
Route::group(['prefix' => 'reports'], function () {
    Route::get('test', 'AffiliateReportController@test');
    Route::post('affiliate_reports/datatable', 'AffiliateReportController@getAffiliateStats');
    Route::get('affiliate_reports/generate/{affiliate_type}/{snapshot_period}', 'AffiliateReportController@generateAffiliateReportXLS');
    Route::get('affiliate_reports/download/', 'AffiliateReportController@downloadAffiliateReportXLS');
});

/* EMBED */
Route::get('embed/campaign', 'FilterController@campaignStackProcessorPhp');

Route::group(['namespace' => 'Test'], function () {
    Route::any('test/{method}', 'TestController@index');
});

Route::get('check-session', function () {
    return response()->json(['guest' => Auth::guest()]);
});

Route::get('kk', 'AffiliateReportController@generateAffiliateReportXLS1');

Route::get('karla', function () {
    return \App\AffiliateRevenueTracker::pluck('campaign_id', 'revenue_tracker_id')->toArray();
    $date = '2022-03-28';
    \DB::enableQueryLog();
    $rev_trackers = \App\AffiliateReport::leftJoin('revenue_tracker_cake_statistics', function ($q) {
        $q->on('revenue_tracker_cake_statistics.created_at', '=', 'affiliate_reports.created_at')
            ->where('revenue_tracker_cake_statistics.affiliate_id', '=', 'affiliate_reports.affiliate_id')
            ->where('revenue_tracker_cake_statistics.revenue_tracker_id', '=', 'affiliate_reports.revenue_tracker_id')
            ->where('revenue_tracker_cake_statistics.s1', '=', 'affiliate_reports.s1')
            ->where('revenue_tracker_cake_statistics.s2', '=', 'affiliate_reports.s2')
            ->where('revenue_tracker_cake_statistics.s3', '=', 'affiliate_reports.s3')
            ->where('revenue_tracker_cake_statistics.s4', '=', 'affiliate_reports.s4')
            ->where('revenue_tracker_cake_statistics.s5', '=', 'affiliate_reports.s5');
    })->leftJoin('affiliate_revenue_trackers', function ($q) {
        $q->on('affiliate_revenue_trackers.revenue_tracker_id', '=', 'affiliate_reports.revenue_tracker_id')
            ->where('affiliate_revenue_trackers.affiliate_id', '=', 'affiliate_reports.affiliate_id');
    })
        ->where('affiliate_reports.created_at', '=', "$date")
        ->whereNull('revenue_tracker_cake_statistics.id')
        ->where('affiliate_reports.revenue_tracker_id', '!=', 1)
        ->select(DB::RAW('affiliate_reports.affiliate_id, affiliate_reports.revenue_tracker_id, affiliate_reports.s1, affiliate_reports.s2, affiliate_reports.s3, affiliate_reports.s4, affiliate_reports.s5, affiliate_revenue_trackers.campaign_id'))
        ->groupBy(DB::RAW('affiliate_reports.affiliate_id, affiliate_reports.revenue_tracker_id, affiliate_reports.s1, affiliate_reports.s2, affiliate_reports.s3, affiliate_reports.s4, affiliate_reports.s5'))
        ->get();
    \Log::info(\DB::getQueryLog());

    return $rev_trackers;
    exit;
    $process = new \App\Helpers\CleanAffiliateReportHelper($date);
    $process->clean();

    exit;
    $con = config('app.type') == 'reports' ? 'mysql' : 'secondary';
    $reports = DB::connection($con)->select("select revenue_tracker_cake_statistics.id as cake_stat_id, affiliate_reports.id as affiliate_report_id, revenue_tracker_cake_statistics.clicks, revenue_tracker_cake_statistics.payout, affiliate_reports.lead_count, affiliate_reports.revenue from `revenue_tracker_cake_statistics` left join `affiliate_reports` on `revenue_tracker_cake_statistics`.`created_at` = `affiliate_reports`.`created_at` and `revenue_tracker_cake_statistics`.`affiliate_id` = affiliate_reports.affiliate_id and `revenue_tracker_cake_statistics`.`revenue_tracker_id` = affiliate_reports.revenue_tracker_id and `revenue_tracker_cake_statistics`.`s1` = affiliate_reports.s1 and `revenue_tracker_cake_statistics`.`s2` = affiliate_reports.s2 and `revenue_tracker_cake_statistics`.`s3` = affiliate_reports.s3 and `revenue_tracker_cake_statistics`.`s4` = affiliate_reports.s4 and `revenue_tracker_cake_statistics`.`s5` = affiliate_reports.s5 where `revenue_tracker_cake_statistics`.`created_at` = '$date'");
    $affiliate_reports = [];
    $cake_stats = [];
    foreach ($reports as $report) {
        if (($report->clicks == 0 || $report->clicks == '') &&
            ($report->payout == 0 || $report->payout == '') &&
            ($report->lead_count == 0 || $report->lead_count == '') &&
            ($report->revenue == 0 || $report->revenue == '')
        ) {
            $affiliate_reports[] = $report->affiliate_report_id;
            $cake_stats[] = $report->cake_stat_id;
        }
    }
    exit;

    return [
        'a' => $affiliate_reports,
        'c' => $cake_stats,
    ];
    exit;
    $alphabet = range('A', 'Z');

    return $alphabet[10];
    exit;
    $legends = config('consolidatedgraph.legends');
    $aliases = [];
    $count = 'A';
    foreach ($legends as $code => $data) {
        $aliases[$data['alias']] = $data;
        echo $count++.'<br>';
    }
    // return $aliases;
    exit;
    $requestURL = 'https://engageiq.nlrtrk.com/?a=18462&c=730&s1=mover45&s2=291602aaa693B114A872111ECA0FAD405B15C6ACF655BB46D&firstname=Jack&lastname=David&dobmonth=04&dobday=02&dobyear=1994&zip=98226&email=digsog123%2540gmail%252ecom&gender=M&address=1762%2520River%2520St&city=Bellingham&state=WA&phone1=208&phone2=540&phone3</request_url>
<redirect_url>https://path17.epicdemand.com/dynamic_live_cdall/?affiliate_id=#affid#&campaign_id=#campid#&offer_id=#oid#&s1=#s1#&s2=#s2#&s3=#s3#&s4=#s4#&s5';
    $parts = parse_url($requestURL, PHP_URL_QUERY);
    $queryParams = [];
    parse_str($parts, $queryParams);

    return urldecode($queryParams['email']);

    return $queryParams;

    return \App\ClickLogRevTrackers::with('revenue_tracker')->where('revenue_tracker_id', 8704)->get();

    return array_map('trim', explode(',', '1, 2,3 ,4'));

    return \App\Lead::whereBetween('created_at', ['2021-02-06 00:00:00', '2021-02-07 23:59:59'])
        ->groupBy('campaign_id')->having('total', '>', 30)->select(['campaign_id', \DB::RAW('COUNT(*) as total')])
        ->pluck('campaign_id')->toArray();

    $date = \Carbon\Carbon::parse('2022-01-13');

    $from = \Carbon\Carbon::parse('2022-01-13')->subDay(0);

    return $from;

    return;

    return auth()->user()->role_id;
    // $string = 'Genetic Cardio U65 RR w Pre-ping(2342)';
    // preg_match_all('!\d+!', $string, $matches);
    // print_r($matches);
    // return;

    $text = 'MVA';
    preg_match_all('#\((.*?)\)#', $text, $match);

    return $match;

    return $match[1][count($match[1]) - 1];

    return;
    \DB::connection('secondary')->enableQueryLog();
    $from = \Carbon\Carbon::yesterday()->startOfDay();
    $to = \Carbon\Carbon::yesterday()->endOfDay();

    return $leads = App\Lead::where('lead_status', 4)->whereBetween('created_at', [$from, $to])->update(['lead_status' => 3]);

    return \DB::connection('secondary')->getQueryLog();

    return $campaigns = \App\Campaign::where('campaign_type', 5)->where('linkout_offer_id', '!=', 0)->where('linkout_cake_status', 1)->pluck('linkout_offer_id', 'id')->toArray();

    return \App\UserMeta::where('key', 'coworker_email')->pluck('value', 'user_id')->toArray();

    return;

    return \App\UserMeta::where('key', 'reg_path_revenue_email_report')->with('user')->get();
    $params = [
        'period' => 'month_to_date',
        'order_col' => 'date',
        'order_dir' => 'asc',
    ];

    return \App\AffiliateWebsiteReport::externalPathRevenue($params)->groupBy('date')->groupBy('website_id')->get();

    return \App\AffiliateWebsite::where('affiliate_id', '!=', 0)
        ->select(['affiliate_id', 'id'])
        ->pluck('affiliate_id', 'id');

    \DB::enableQueryLog();
    $c = \App\Campaign::where(function ($query) {
        //    $query->where(function($q) {
        //     $q->whereNotIn('campaign_type', [4,5,6]);
        // })->orWhere();

        $query->whereNotIn('campaign_type', [4, 5, 6])
            ->orWhere(function ($q) {
                $q->where('default_received', '>', 0)->where('default_payout', '>', 0);
            });
    })->get();

    return \DB::getQueryLog();

    return \App\Campaign::where('linkout_offer_id', '>', 0)->pluck('id', 'linkout_offer_id')->toArray();
    // 	$a1=array("0"=>"red","1"=>"green");
    // $a2=array("0"=>"purple","1"=>"orange");
    // array_splice($a1,1,0,$a2);
    // print_r($a1);
    // exit;
    $a = ['a', 'b', 'e', 'f'];

    return array_splice($a, 1, 0, ['c', 'd']);
    $arr = [1, 2, 3, 4, 5];
    $ayy = [6, 7, 8];
    //return floor(count($arr) / 2);
    $div = floor(count($arr) / 2);
    print_r(array_splice($arr, 1, 0, $ayy));

    //return array_merge($ayy,$arr);
    // return \App\LeadUser::where('revenue_tracker_id', '=', 1)
    //        ->whereRaw("DATE(created_at) = DATE('$dateFromStr')")
    //        ->toSql();
});

Route::get('test', function (Illuminate\Http\Request $request, App\Helpers\Repositories\Settings $settings) {
    $origCollection = collect([
        'test1' => 'amazing',
        'test2' => 'ggness',
    ]);

    $awts = $origCollection->map(function ($item, $key) {
        return 'processed '.$item;
    });

    return $awts;
});

Route::get('info', function () {
    phpinfo();
});

Route::get('revenue_funnel_results', function () {
    return session('revenue_funnel_results');
});

Route::get('sql', function () {
    $params['affiliate_type'] = 1;
    $params['start_date'] = '2019-12-18';
    $params['end_date'] = '2019-12-18';
    $key = "$params[start_date]$params[end_date]:$params[affiliate_type]";

    DB::enableQueryLog();
    $revenueTrackerStatistics = \App\RevenueTrackerCakeStatistic::revTrackerBreakdown($params)->get();

    return DB::getQueryLog();
});

Route::get('check', function () {
    $_SESSION = [
        'auth_cred' => '',
        'leadreactor_token' => '',
        'leadreactor_url' => config('app.main_url'),
        'default_exit_page_campaign' => '',
        'campaigns' => [[1]],
        'campaign_types' => [1],
        'creatives' => [],
        'filter_questions' => [],
        'filter_icons' => [],
        'path_id' => 1,
        'path_folder' => 'dynamic_live',
        'pixel' => ['postback' => '', 'fire_at' => '', 'header' => ''],
        'rev_tracker' => 1,
        'subid_breakdown' => 0,
        's1_breakdown' => 0,
        's2_breakdown' => 0,
        's3_breakdown' => 0,
        's4_breakdown' => 0,
        's5_breakdown' => 0,
        'path_details' => 1,
        'campaign_type_code' => ['', 'MO1', 'MO2', 'LFC1', 'External Path', 'CPAWALL', 'EXITPAGE', 'LFC2', 'MO3', 'TO1', 'TO2', 'MO4'],
        'external_campaigns_code' => [],
        'browser' => ['os' => '', 'os_version' => '', 'browser' => '', 'browser_version' => '', 'user_agent' => ''],
        'source_url' => config('constants.LEAD_REACTOR_PATH').'dynamic_live',
        'client_ip' => '127.0.0.1',
        'device' => ['isMobile' => 0, 'isTablet' => 0, 'isDesktop' => 1, 'type' => 'Desktop', 'view' => 1],
        'user' => [
            'screen_view' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@test.com',
            'email2' => '',
            'zip' => 10001,
            'birthdate' => '1963-09-16',
            'dobmonth' => '09',
            'dobday' => 16,
            'dobyear' => 1963,
            'gender' => 'F',
            'address' => '',
            'user_agent' => '',
            'phone' => '(806) 234-3593',
            'phone1' => 806,
            'phone2' => 234,
            'phone3' => 3593,
            'ethnicity' => '',
            'source_url' => 'http://path17.paidforresearch.com/dynamic_live_cdall/',
            'image' => '',
            'affiliate_id' => '',
            'offer_id' => '',
            'campaign_id' => '',
            's1' => '',
            's2' => '',
            's3' => '',
            's4' => '',
            's5' => '',
            'cs1' => '',
            'cs2' => '',
            'cs3' => '',
            'cs4' => '',
            'cs5' => '',
            'ip' => '127.0.0.1',
            'state' => 'NY',
            'city' => 'New York',
            'revenue_tracker_id' => 1,
            'path_id' => 2,
            'path_type' => 2,
            'session_id' => '123abc',
        ],
        'd1' => '',
        'd2' => '',
        'd3' => '',
        'd4' => '',
        'd5' => '',
        'cookie_cheked' => '',
        '_marketing_partners' => '',
        'xxTrustedFormToken' => '',
        'xxTrustedFormCertUrl' => '',
        'campaigns_anwered_counter' => 0,
        'campaigns_answered' => [],
        '_df_edemographic' => 1,
        'default_exit_page_campaign' => 1,
    ];
    $_COOKIE = [
        'my247MoneyDevo' => '',
        'uber_status' => '',
        'my247Money' => '',
    ];
    $self_closing = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];
    $exclude = array_merge($self_closing, ['html', 'body', 'head']);
    $campaigns = DB::connection('nlr')->select('SELECT id, stack FROM campaign_contents WHERE id BETWEEN 1 AND 1000');
    $response = [];
    foreach ($campaigns as $campaign) {
        \Log::info('Campaign: '.$campaign->id);
        if ($campaign->stack == '') {
            continue;
        }
        // create new DOMDocument
        $document = new \DOMDocument('1.0', 'UTF-8');

        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        $content_stack = $campaign->stack;

        //CONVERT SHORTCODES
        $values = [
            '[VALUE_AFFILIATE_ID]' => 1,
            'CD[VALUE_REV_TRACKER]' => 'CD1',
            '[VALUE_REV_TRACKER]' => 1,
            '[VALUE_EMAIL]' => 'test@test.com',
            '[VALUE_S1]' => '1',
            '[VALUE_S2]' => '2',
            '[VALUE_S3]' => '3',
            '[VALUE_S4]' => '4',
            '[VALUE_S5]' => '5',
            '[VALUE_FIRST_NAME]' => 'John',
            '[VALUE_LAST_NAME]' => 'Doe',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_IP]' => '127.0.0.1',
            '[VALUE_ADDRESS1]' => '123 Test St.',
            '[VALUE_PATH_ID]' => '1',
            '[VALUE_AGE]' => '24',
            '[VALUE_BIRTHDATE]' => '1994-03-16',
            '[VALUE_BIRTHDATE_MDY]' => '03-16-1994',
            '[VALUE_DOBDAY]' => '16',
            '[VALUE_DOBMONTH]' => '03',
            '[VALUE_DOBYEAR]' => '1994',
            '[VALUE_ETHNICITY]' => 'Caucasian',
            '[VALUE_GENDER]' => 'M',
            '[VALUE_TITLE]' => 'Title/Honorific (Mr, Ms, etc.)',
            '[VALUE_GENDER_FULL]' => 'Male',
            '[VALUE_STATE]' => 'NY',
            '[VALUE_CITY]' => 'New York',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_PHONE]' => '7898797897',
            '[VALUE_PHONE1]' => '789',
            '[VALUE_PHONE2]' => '879',
            '[VALUE_PHONE3]' => '7897',
            '[VALUE_DATE_TIME]' => '03/16/2020 17:56:01',
            '[VALUE_TODAY]' => '03/16/2020)',
            '[VALUE_TODAY_MONTH]' => '03',
            '[VALUE_TODAY_DAY]' => '16',
            '[VALUE_TODAY_YEAR]' => '2020',
            '[VALUE_TODAY_HOUR]' => '17',
            '[VALUE_TODAY_MIN]' => '56',
            '[VALUE_TODAY_SEC]' => '01',
            '[VALUE_PUB_TIME]' => '2020-03-16 17:56:01',
            '[DETECT_OS]' => 'Windows',
            '[DETECT_OS_VER]' => 'Windows 10',
            '[DETECT_BROWSER]' => 'Chrome',
            '[DETECT_BROWSER_VER]' => '58.0.3029.96',
            '[DETECT_USER_AGENT]' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36',
            '[DETECT_DEVICE]' => 'Mobile',
            'src="../' => 'src="'.config('constants.LEAD_REACTOR_PATH'),
            'href="../' => 'href="'.config('constants.LEAD_REACTOR_PATH'),
        ];
        foreach ($values as $short_code => $value) {
            if (strpos($content_stack, $short_code) !== false) {
                $content_stack = str_replace($short_code, $value, $content_stack);
            }
        }

        $content_stack = preg_replace('~<!--(.*?)-->~s', '', $content_stack);
        $content_stack = str_replace('-->', '', $content_stack);
        $content_stack = str_replace('<--', '', $content_stack);

        $newStr = '';
        $commentTokens = [T_COMMENT];

        if (defined('T_DOC_COMMENT')) {
            $commentTokens[] = T_DOC_COMMENT;
        } // PHP 5
        if (defined('T_ML_COMMENT')) {
            $commentTokens[] = T_ML_COMMENT;
        }  // PHP 4

        $tokens = token_get_all($content_stack);
        foreach ($tokens as $token) {
            if (is_array($token)) {
                if (in_array($token[0], $commentTokens)) {
                    continue;
                }
                $token = $token[1];
            }
            $newStr .= $token;
        }
        $content_stack = $newStr;

        // \Log::info($content_stack);
        $hasCode = false;
        $phpStartCount = substr_count($content_stack, '<?php') + substr_count($content_stack, '<?=');
        //\Log::info($phpStartCount);
        $phpEndCount = substr_count($content_stack, '?>');
        //\Log::info($phpEndCount);

        if ($phpStartCount != $phpEndCount) {
            $hasCode = true;
            $errors[] = 'PHP Parsing error. Check PHP tags.';
        }

        $errors = [];
        /*if(strpos($campaign->stack, '<?php') !== false) {
            try {
                ob_start();
                eval('?>'.$content_stack);
                $content_stack = ob_get_contents();
                ob_end_clean();
            } catch (\Throwable $e) {
                $errors[] = 'PHP parsing error.';
                $errors[] = $e;
                \Log::info('EVAL ERROR');
                \Log::info($e);
            }
        }*/

        // load HTML
        $document->loadHTML($content_stack);

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        $xpath = new \DOMXpath($document);

        $nodes = $xpath->query('//*');

        $names = [];
        $elements = [];
        $removedPCode = false;
        foreach ($nodes as $node) {
            if (! in_array($node->nodeName, $exclude)) {
                if ($hasCode && ! $removedPCode) {
                    //This is to remove additional error "Missing closing tag for <p>" when a php parsing error code exists
                    $removedPCode = true;
                } elseif ($node->nodeName == 'p') {
                    if (in_array('div', array_keys($elements))) {
                        if (! isset($elements[$node->nodeName])) {
                            $elements[$node->nodeName] = 0;
                        }
                        $elements[$node->nodeName] += 1;
                    }
                } else {
                    if (! isset($elements[$node->nodeName])) {
                        $elements[$node->nodeName] = 0;
                    }
                    $elements[$node->nodeName] += 1;
                }
            }
            $names[] = $node->nodeName;
        }

        foreach ($elements as $element => $count) {
            $ending_tag_count = substr_count($content_stack, "</$element>");
            if (substr_count($content_stack, "</$element>") < $count) {
                $errors[] = "Missing closing tag for </$element> total count $count only $ending_tag_count counted";
            }
        }

        if (count($errors) > 0) {
            $response[] = [
                'Campaign' => $campaign->id,
                'Errors' => $errors,
            ];
        }
    }

    return $response;

    return implode(PHP_EOL, array_unique($names));

});

Route::get('check1/{id}', function ($id) {
    $_SESSION = [
        'auth_cred' => '',
        'leadreactor_token' => '',
        'leadreactor_url' => config('app.main_url'),
        'default_exit_page_campaign' => '',
        'campaigns' => [[1]],
        'campaign_types' => [1],
        'creatives' => [],
        'filter_questions' => [],
        'filter_icons' => [],
        'path_id' => 1,
        'path_folder' => 'dynamic_live',
        'pixel' => ['postback' => '', 'fire_at' => '', 'header' => ''],
        'rev_tracker' => 1,
        'subid_breakdown' => 0,
        's1_breakdown' => 0,
        's2_breakdown' => 0,
        's3_breakdown' => 0,
        's4_breakdown' => 0,
        's5_breakdown' => 0,
        'path_details' => 1,
        'campaign_type_code' => ['', 'MO1', 'MO2', 'LFC1', 'External Path', 'CPAWALL', 'EXITPAGE', 'LFC2', 'MO3', 'TO1', 'TO2', 'MO4'],
        'external_campaigns_code' => [],
        'browser' => ['os' => '', 'os_version' => '', 'browser' => '', 'browser_version' => '', 'user_agent' => ''],
        'source_url' => config('constants.LEAD_REACTOR_PATH').'dynamic_live',
        'client_ip' => '127.0.0.1',
        'device' => ['isMobile' => 0, 'isTablet' => 0, 'isDesktop' => 1, 'type' => 'Desktop', 'view' => 1],
        'user' => [
            'screen_view' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@test.com',
            'email2' => '',
            'zip' => 10001,
            'birthdate' => '1963-09-16',
            'dobmonth' => '09',
            'dobday' => 16,
            'dobyear' => 1963,
            'gender' => 'F',
            'address' => '',
            'user_agent' => '',
            'phone' => '(806) 234-3593',
            'phone1' => 806,
            'phone2' => 234,
            'phone3' => 3593,
            'ethnicity' => '',
            'source_url' => 'http://path17.paidforresearch.com/dynamic_live_cdall/',
            'image' => '',
            'affiliate_id' => '',
            'offer_id' => '',
            'campaign_id' => '',
            's1' => '',
            's2' => '',
            's3' => '',
            's4' => '',
            's5' => '',
            'cs1' => '',
            'cs2' => '',
            'cs3' => '',
            'cs4' => '',
            'cs5' => '',
            'ip' => '127.0.0.1',
            'state' => 'NY',
            'city' => 'New York',
            'revenue_tracker_id' => 1,
            'path_id' => 2,
            'path_type' => 2,
            'session_id' => '123abc',
        ],
        'd1' => '',
        'd2' => '',
        'd3' => '',
        'd4' => '',
        'd5' => '',
        'cookie_cheked' => '',
        '_marketing_partners' => '',
        'xxTrustedFormToken' => '',
        'xxTrustedFormCertUrl' => '',
        'campaigns_anwered_counter' => 0,
        'campaigns_answered' => [],
        '_df_edemographic' => 1,
        'default_exit_page_campaign' => 1,
    ];
    $_COOKIE = [
        'my247MoneyDevo' => '',
        'uber_status' => '',
        'my247Money' => '',
    ];
    $self_closing = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];
    $exclude = array_merge($self_closing, ['html', 'body', 'head']);
    $campaigns = DB::connection('nlr')->select('SELECT id, stack FROM campaign_contents WHERE id = '.$id);
    $response = [];
    foreach ($campaigns as $campaign) {
        if ($campaign->stack == '') {
            break;
        }
        // create new DOMDocument
        $document = new \DOMDocument('1.0', 'UTF-8');

        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        $content_stack = $campaign->stack;

        //CONVERT SHORTCODES
        $values = [
            '[VALUE_AFFILIATE_ID]' => 1,
            'CD[VALUE_REV_TRACKER]' => 'CD1',
            '[VALUE_REV_TRACKER]' => 1,
            '[VALUE_EMAIL]' => 'test@test.com',
            '[VALUE_S1]' => '1',
            '[VALUE_S2]' => '2',
            '[VALUE_S3]' => '3',
            '[VALUE_S4]' => '4',
            '[VALUE_S5]' => '5',
            '[VALUE_FIRST_NAME]' => 'John',
            '[VALUE_LAST_NAME]' => 'Doe',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_IP]' => '127.0.0.1',
            '[VALUE_ADDRESS1]' => '123 Test St.',
            '[VALUE_PATH_ID]' => '1',
            '[VALUE_AGE]' => '24',
            '[VALUE_BIRTHDATE]' => '1994-03-16',
            '[VALUE_BIRTHDATE_MDY]' => '03-16-1994',
            '[VALUE_DOBDAY]' => '16',
            '[VALUE_DOBMONTH]' => '03',
            '[VALUE_DOBYEAR]' => '1994',
            '[VALUE_ETHNICITY]' => 'Caucasian',
            '[VALUE_GENDER]' => 'M',
            '[VALUE_TITLE]' => 'Title/Honorific (Mr, Ms, etc.)',
            '[VALUE_GENDER_FULL]' => 'Male',
            '[VALUE_STATE]' => 'NY',
            '[VALUE_CITY]' => 'New York',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_PHONE]' => '7898797897',
            '[VALUE_PHONE1]' => '789',
            '[VALUE_PHONE2]' => '879',
            '[VALUE_PHONE3]' => '7897',
            '[VALUE_DATE_TIME]' => '03/16/2020 17:56:01',
            '[VALUE_TODAY]' => '03/16/2020)',
            '[VALUE_TODAY_MONTH]' => '03',
            '[VALUE_TODAY_DAY]' => '16',
            '[VALUE_TODAY_YEAR]' => '2020',
            '[VALUE_TODAY_HOUR]' => '17',
            '[VALUE_TODAY_MIN]' => '56',
            '[VALUE_TODAY_SEC]' => '01',
            '[VALUE_PUB_TIME]' => '2020-03-16 17:56:01',
            '[DETECT_OS]' => 'Windows',
            '[DETECT_OS_VER]' => 'Windows 10',
            '[DETECT_BROWSER]' => 'Chrome',
            '[DETECT_BROWSER_VER]' => '58.0.3029.96',
            '[DETECT_USER_AGENT]' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36',
            '[DETECT_DEVICE]' => 'Mobile',
            'src="../' => 'src="'.config('constants.LEAD_REACTOR_PATH'),
            'href="../' => 'href="'.config('constants.LEAD_REACTOR_PATH'),
        ];
        foreach ($values as $short_code => $value) {
            if (strpos($content_stack, $short_code) !== false) {
                $content_stack = str_replace($short_code, $value, $content_stack);
            }
        }
        // \Log::info($content_stack);
        $content_stack = preg_replace('~<!--(.*?)-->~s', '', $content_stack);
        $content_stack = str_replace('-->', '', $content_stack);
        $content_stack = str_replace('<--', '', $content_stack);

        $errors = [];

        if (strpos($campaign->stack, '<?php') !== false) {
            try {
                ob_start();
                eval('?>'.$content_stack);
                $content_stack = ob_get_contents();
                ob_end_clean();
            } catch (\Throwable $e) {
                $errors[] = 'PHP parsing error';
                $errors[] = $e;
                \Log::info('EVAL ERROR');
                \Log::info($e);
            }
        }

        // \Log::info($content_stack);

        // load HTML
        $document->loadHTML($content_stack);

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        $xpath = new \DOMXpath($document);

        $nodes = $xpath->query('//*');

        $names = [];
        $elements = [];
        foreach ($nodes as $node) {
            if (! in_array($node->nodeName, $exclude)) {
                if (! isset($elements[$node->nodeName])) {
                    $elements[$node->nodeName] = 0;
                }
                $elements[$node->nodeName] += 1;
            }
            $names[] = $node->nodeName;
        }

        foreach ($elements as $element => $count) {
            $ending_tag_count = substr_count($content_stack, "</$element>");
            if ($ending_tag_count < $count) {
                $errors[] = "Missing closing tag for </$element> total count $count only $ending_tag_count counted";
            }
        }

        if (count($errors) > 0) {
            $response[] = [
                'Campaign' => $campaign->id,
                'Errors' => $errors,
            ];
        }
    }

    return $response;

    return implode(PHP_EOL, array_unique($names));

});

Route::get('code_checker', function () {

    $self_closing = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];
    $exclude = array_merge($self_closing, ['html', 'body', 'head']);
    $campaigns = DB::connection('nlr')->select('SELECT id, stack FROM campaign_contents WHERE id BETWEEN 1 AND 1000');
    $response = [];
    foreach ($campaigns as $campaign) {
        //\Log::info('Campaign: ' . $campaign->id);
        if ($campaign->stack == '') {
            continue;
        }
        $errors = [];

        // create new DOMDocument
        $document = new \DOMDocument('1.0', 'UTF-8');

        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        $content_stack = $campaign->stack;

        //CONVERT SHORTCODES
        $values = [
            '[VALUE_AFFILIATE_ID]' => 1,
            'CD[VALUE_REV_TRACKER]' => 'CD1',
            '[VALUE_REV_TRACKER]' => 1,
            '[VALUE_EMAIL]' => 'test@test.com',
            '[VALUE_S1]' => '1',
            '[VALUE_S2]' => '2',
            '[VALUE_S3]' => '3',
            '[VALUE_S4]' => '4',
            '[VALUE_S5]' => '5',
            '[VALUE_FIRST_NAME]' => 'John',
            '[VALUE_LAST_NAME]' => 'Doe',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_IP]' => '127.0.0.1',
            '[VALUE_ADDRESS1]' => '123 Test St.',
            '[VALUE_PATH_ID]' => '1',
            '[VALUE_AGE]' => '24',
            '[VALUE_BIRTHDATE]' => '1994-03-16',
            '[VALUE_BIRTHDATE_MDY]' => '03-16-1994',
            '[VALUE_DOBDAY]' => '16',
            '[VALUE_DOBMONTH]' => '03',
            '[VALUE_DOBYEAR]' => '1994',
            '[VALUE_ETHNICITY]' => 'Caucasian',
            '[VALUE_GENDER]' => 'M',
            '[VALUE_TITLE]' => 'Title/Honorific (Mr, Ms, etc.)',
            '[VALUE_GENDER_FULL]' => 'Male',
            '[VALUE_STATE]' => 'NY',
            '[VALUE_CITY]' => 'New York',
            '[VALUE_ZIP]' => '10001',
            '[VALUE_PHONE]' => '7898797897',
            '[VALUE_PHONE1]' => '789',
            '[VALUE_PHONE2]' => '879',
            '[VALUE_PHONE3]' => '7897',
            '[VALUE_DATE_TIME]' => '03/16/2020 17:56:01',
            '[VALUE_TODAY]' => '03/16/2020)',
            '[VALUE_TODAY_MONTH]' => '03',
            '[VALUE_TODAY_DAY]' => '16',
            '[VALUE_TODAY_YEAR]' => '2020',
            '[VALUE_TODAY_HOUR]' => '17',
            '[VALUE_TODAY_MIN]' => '56',
            '[VALUE_TODAY_SEC]' => '01',
            '[VALUE_PUB_TIME]' => '2020-03-16 17:56:01',
            '[DETECT_OS]' => 'Windows',
            '[DETECT_OS_VER]' => 'Windows 10',
            '[DETECT_BROWSER]' => 'Chrome',
            '[DETECT_BROWSER_VER]' => '58.0.3029.96',
            '[DETECT_USER_AGENT]' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36',
            '[DETECT_DEVICE]' => 'Mobile',
            'src="../' => 'src="'.config('constants.LEAD_REACTOR_PATH'),
            'href="../' => 'href="'.config('constants.LEAD_REACTOR_PATH'),
        ];
        foreach ($values as $short_code => $value) {
            if (strpos($content_stack, $short_code) !== false) {
                $content_stack = str_replace($short_code, $value, $content_stack);
            }
        }

        $content_stack = preg_replace('~<!--(.*?)-->~s', '', $content_stack);
        $content_stack = str_replace('-->', '', $content_stack);
        $content_stack = str_replace('<--', '', $content_stack);

        $newStr = '';
        $commentTokens = [T_COMMENT];

        if (defined('T_DOC_COMMENT')) {
            $commentTokens[] = T_DOC_COMMENT;
        } // PHP 5
        if (defined('T_ML_COMMENT')) {
            $commentTokens[] = T_ML_COMMENT;
        }  // PHP 4

        $tokens = token_get_all($content_stack);
        foreach ($tokens as $token) {
            if (is_array($token)) {
                if (in_array($token[0], $commentTokens)) {
                    continue;
                }
                $token = $token[1];
            }
            $newStr .= $token;
        }
        $content_stack = $newStr;
        // \Log::info($content_stack);
        $hasCode = false;
        $phpStartCount = substr_count($content_stack, '<?php') + substr_count($content_stack, '<?=');
        //\Log::info($phpStartCount);
        $phpEndCount = substr_count($content_stack, '?>');
        //\Log::info($phpEndCount);

        if ($phpStartCount != $phpEndCount) {
            $hasCode = true;
            $errors[] = 'PHP Parsing error. Check PHP tags.';
        }

        /*if(strpos($content_stack, '<?php') !== false) {
            try {
                ob_start();
                eval('?>'.$content_stack);
                $content_stack = ob_get_contents();
                ob_end_clean();
            } catch (\Throwable $e) {
                $hasCode = true;
                $errors[] = 'PHP parsing error.';
                $errors[] = $e;
                // \Log::info('EVAL ERROR');
                // \Log::info($e);
            }
        }*/

        // load HTML
        $document->loadHTML($content_stack);

        // Restore error level
        libxml_use_internal_errors($internalErrors);

        $xpath = new \DOMXpath($document);

        $nodes = $xpath->query('//*');

        //$names = array();
        $elements = [];
        $removedPCode = false;
        foreach ($nodes as $node) {
            if (! in_array($node->nodeName, $exclude)) {
                if (! isset($elements[$node->nodeName])) {
                    $elements[$node->nodeName] = 0;
                }
                if ($hasCode && ! $removedPCode) {
                    //This is to remove additional error "Missing closing tag for <p>" when a php parsing error code exists
                    $removedPCode = true;
                } else {
                    $elements[$node->nodeName] += 1;
                }
            }
            //\Log::info($node->nodeName);
            //$names[] = $node->nodeName;
        }

        foreach ($elements as $element => $count) {
            // \Log::info($element.' '.$count.': '.substr_count($content_stack, "<$element").' - '.substr_count($content_stack, "</$element>"));
            if (substr_count($content_stack, "</$element>") < $count) {
                $errors[] = "Missing closing tag for <$element>";
            }
        }

        if (count($errors) > 0) {
            $response[] = [
                'Campaign' => $campaign->id,
                'Errors' => $errors,
            ];
        }
    }

    return $response;

    return implode(PHP_EOL, array_unique($names));

});