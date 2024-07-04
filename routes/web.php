<?php

use Illuminate\Support\Facades\Route;
Route::get('/', 'PodcastController@index')
    ->middleware('cache.headers:no-cache,private,max-age=30000;etag');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});



Route::get('sitemap-generate', 'HomeController@xmlSitemapNow');
//Route::get('{slug}/{slug1}', 'HomeController@childXmlSitemapNow');

/* ----------------------------------------------------------------------------------------------------------------------------------------------------------------- Front End Code Start ----------------------------------------------------------------------------------------------------------------------------------------------------------------- */
Route::get('token_store', 'HomeController@notification_token_store');
Route::group([ 'middleware' => ['web_mid']], function ()
{

    /* ------------------------------------ Index Page Code Start ------------------------------------ */
    Route::get('/', 'HomeController@index');
    Route::get('/searchText/{str}', 'HomeController@SearchText');
    Route::post('searchReport', 'HomeController@show_search_data');
    Route::post('searchNotFoundSubmit','HomeController@searchNotFoundResult');
    Route::get('services', 'ServiceController@servicePage');
    Route::get('insights', 'ServiceController@insightPage');
    Route::get('insights/{slug}', 'ServiceController@insightSinglePage');
    Route::get('press-release', 'PressReleaseController@pressReleasePage');
    Route::get('press-release/{slug}', 'PressReleaseController@pressReleaseDatilePage');
    Route::post('save_press_release', 'PressReleaseController@submitEnquiry');
    Route::get('about-us', 'HomeController@cmspages');
    Route::get('privacy-policy', 'HomeController@cmspages');
    Route::get('terms-conditions', 'HomeController@cmspages');
    Route::get('disclaimer', 'HomeController@cmspages');
    Route::get('return-policy', 'HomeController@cmspages');
    Route::get('trending-report','ReportController@is_trending');
    Route::get('latest-report','ReportController@is_latest');
    Route::get('industries','ReportController@industriesPage');
    Route::get('industry/{category_slug}','ReportController@categoryPage');
    Route::get('industry-report/{report_slug}','ReportController@reportDescription');
    Route::get('ja/industry-report/{report_slug}','ReportController@reportDescriptionJa');
    Route::get('industry-report/toc/{report_slug}','ReportController@reportDescription');
    Route::get('industry-report/segmentation/{report_slug}','ReportController@reportDescription');
    Route::get('industry-report/methodology/{report_slug}','ReportController@reportDescription');
    Route::get('industry-report/lot/{report_slug}','ReportController@reportDescription');
    Route::get('industry-report/infographic/{report_slug}','ReportController@reportDescription');


    Route::get('request-toc/{report_slug}','ReportController@reportAction');
    Route::get('request-methodology/{report_slug}','ReportController@reportAction');
    Route::get('inquire-before-purchase/{report_slug}','ReportController@reportAction');
    Route::get('ask-for-discount/{report_slug}','ReportController@reportAction');
    Route::get('ask-for-customization/{report_slug}','ReportController@reportAction');
    Route::get('request-sample/{report_slug}','ReportController@reportAction');
    Route::get('any-question/{report_slug}','ReportController@reportAction');
    Route::get('speak-analyst/{report_slug}','ReportController@reportAction');
    Route::post('requestSubmit','ReportController@requestQueryStore');
    Route::get('sample-request-thank-you','ReportController@thankyouPage');
    Route::get('discount-request-thank-you','ReportController@thankyouPage');
    Route::get('contact-us','ContactController@contactUsPage');
    Route::post('contactSave','ContactController@contactStore');
    Route::get('thankyou','ContactController@ThankyouPage');
    Route::post('checkout','CheckoutController@goToCheckout');
      Route::post('toc_section_buy','CheckoutController@SectionBuyNow');
    Route::post('paymentNow','CheckoutController@CheckoutNow');
    Route::post('subscribeSave', 'HomeController@subscribeStore');
    Route::any('paypalStatus', 'CheckoutController@PaypalCallback');
    Route::get('page-not-found','HomeController@test_pages');
   //Route::any('{catchall}', 'HomeController@test_pages')->where('catchall', '.*');

});





/* ----------------------------------------------------------------------------------------------------------------------------------------------------------------- Front End Code End ----------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------backend publisher start----------------------------------------------------------------------------------------------------------------------------- Front End Code End ----------------------------------------------------------------------------------------------------------------------------------------------------------------- */


Route::group(array('prefix' => 'login','namespace'=>'publisherAdmin'), function(){

	Route::group([ 'middleware' => ['publisher_admin','web_mid']], function () {
        Route::any('/', ['as' => '/', 'uses' => 'UserController@login']);
        Route::any('/login', ['as' => 'login', 'uses' => 'UserController@login']);

    /* ----------------------------------- Forgate Password Email Code Start ----------------------------------- */

        Route::any('forgotpassword', ['as' => 'forgotpassword', 'uses' =>'UpdatePasswordController@forgotpasswordStore']);

        Route::any('resetPassword', ['as' => 'resetPassword', 'uses' =>'UpdatePasswordController@changePassword']);

        Route::any('updatePassword', ['as' => 'updatePassword', 'uses' =>'UpdatePasswordController@updatePasswordStore']);

     /* ----------------------------------- Forgate Password Email Code End ----------------------------------- */

  });
  });
Route::group(array('prefix' => 'user','namespace'=>'publisherAdmin'), function(){

  Route::group( [ 'middleware' => ['auth_admin','web_mid']], function () {
   Route::any('/dashboard',['as' => 'dashboard', 'uses' =>'DashboardController@showDashboard']);
   Route::any('logout', ['as' => 'logout', 'uses' =>'UserController@logout']);
  
});
});
/* ------------------------------------backend publisher end----------------------------------------------------------------------------------------------------------------------------- Front End Code End ----------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/*------------------ BackEnd Master Admin Code Start ---------------------*/

Route::group(array('prefix' => 'masterAdmin','namespace'=>'masterAdmin'), function(){

	Route::group([ 'middleware' => ['guest_admin','web_mid']], function () {
        Route::any('/', ['as' => '/', 'uses' => 'UserController@login']);
        Route::any('/login', ['as' => 'login', 'uses' => 'UserController@login']);

    /* ----------------------------------- Forgate Password Email Code Start ----------------------------------- */

        Route::any('forgotpassword', ['as' => 'forgotpassword', 'uses' =>'UpdatePasswordController@forgotpasswordStore']);

        Route::any('resetPassword', ['as' => 'resetPassword', 'uses' =>'UpdatePasswordController@changePassword']);

        Route::any('updatePassword', ['as' => 'updatePassword', 'uses' =>'UpdatePasswordController@updatePasswordStore']);

     /* ----------------------------------- Forgate Password Email Code End ----------------------------------- */

  });

 Route::group([ 'middleware' => ['auth_admin','web_mid']], function () {
        Route::any('/dashboard',['as' => 'dashboard', 'uses' =>'DashboardController@showDashboard']);
        Route::any('/notification',['as' => 'notification', 'uses' =>'DashboardController@send_now_notifi']);
        Route::any('sendNotificationNow',['as' => 'sendNotificationNow', 'uses' =>'DashboardController@SendNowFirebase']);
        Route::any('logout', ['as' => 'logout', 'uses' =>'UserController@logout']);

 Route::any('user-list', ['as' => 'user-list', 'uses' =>'RegistrationController@index']);

        Route::any('userstatusupdate', ['as' => 'userstatusupdate', 'uses' =>'RegistrationController@status_update']);

        Route::any('registernewuser', ['as' => 'registernewuser', 'uses' =>'RegistrationController@registeruser']);
        Route::any('newuserstore', ['as' => 'newuserstore', 'uses' =>'RegistrationController@registeruserstore']);
     
        Route::any('user_edit/{id}', ['as' => 'user_edit', 'uses' =>'RegistrationController@category_update']);
        Route::any('user_update', ['as' => 'user_update', 'uses' =>'RegistrationController@user_update']);
        
        Route::any('userDelete/{id}', ['as' => 'userDelete', 'uses' =>'RegistrationController@categoryDestory']);



     /* ------------------------------------------------------- Slider Code Start ------------------------------------------------------- */

        Route::get('slider', ['as' => 'slider', 'uses' =>'SliderController@sliderPage']);

        Route::any('addSlider', ['as' => 'addSlider', 'uses' =>'SliderController@addSliderPage']);

        Route::post('sliderSave', ['as' => 'sliderSave', 'uses' =>'SliderController@sliderStore']);

        Route::any('sliderUpdate/{slider_id}', ['as' => 'sliderUpdate', 'uses' =>'SliderController@sliderUpdatePage']);

        Route::post('sliderEditSave', ['as' => 'sliderEditSave', 'uses' =>'SliderController@sliderEditStore']);

        Route::any('sliderDelete/{slider_id}', ['as' => 'sliderDelete', 'uses' =>'SliderController@sliderDeleteFormat']);

        Route::any('sliderStatusUpdate', ['as' => 'sliderStatusUpdate', 'uses' =>'SliderController@sliderStatusUpdateStore']);


     /* ------------------------------------------------------- Slider Code End ------------------------------------------------------- */

     /* ---------------------------------------------------- Publisher Code Start ------------------------------------------------------- */

        Route::get('publisher', ['as' => 'publisher', 'uses' =>'PublisherController@publisherPage']);

        Route::any('addPublisher', ['as' => 'addPublisher', 'uses' =>'PublisherController@addPublisherPage']);

        Route::post('publisherSave', ['as' => 'publisherSave', 'uses' =>'PublisherController@publisherStore']);

        Route::any('publisherUpdate/{publisher_id}', ['as' => 'publisherUpdate', 'uses' =>'PublisherController@publisherUpdatePage']);

        Route::post('publisherEditSave', ['as' => 'publisherEditSave', 'uses' =>'PublisherController@publisherEditStore']);

        Route::any('publisherDelete/{publisher_id}', ['as' => 'publisherDelete', 'uses' =>'PublisherController@publisherDeleteFormat']);


     /* ------------------------------------------------------- Publisher Code End ------------------------------------------------------- */


     /* ---------------------------------------------------- All Report Code Start ------------------------------------------------------- */

        Route::get('allReport', ['as' => 'allReport', 'uses' =>'AllReportController@allReportPage']);

        Route::any('treadingStatusUpdate', ['as' => 'treadingStatusUpdate', 'uses' =>'AllReportController@treadingStatusUpdateSave']);

        Route::any('addAllReport', ['as' => 'addAllReport', 'uses' =>'AllReportController@addAllReportPage']);

        Route::post('allReportSave', ['as' => 'allReportSave', 'uses' =>'AllReportController@allReportStore']);

        Route::any('allReportUpdate/{all_reports_id}', ['as' => 'allReportUpdate', 'uses' =>'AllReportController@allReportUpdatePage']);

        Route::any('allJapaneseReportUpdate/{all_reports_id}', ['as' => 'allJapaneseReportUpdate', 'uses' =>'AllReportController@allJapaneseReportUpdatePage']);

        Route::post('allReportEditSave', ['as' => 'allReportEditSave', 'uses' =>'AllReportController@allReportEditStore']);

        Route::post('allJapaneseReportEditSave', ['as' => 'allJapaneseReportEditSave', 'uses' =>'AllReportController@allJapaneseReportEditStore']);

        Route::any('allReportDelete/{all_reports_id}', ['as' => 'allReportDelete', 'uses' =>'AllReportController@allReportDeleteFormat']);

        Route::any('importAllReport', ['as' => 'importAllReport', 'uses' =>'AllReportController@importAllReportPage']);

        Route::any('importAllReportStore', ['as' => 'importAllReportStore', 'uses' =>'AllReportController@importAllReportStore']);

        Route::any('allReportSearch', ['as' => 'allReportSearch', 'uses' =>'AllReportController@allReportSearchPage']);

        Route::any('export', ['as' => 'export', 'uses' =>'AllReportController@export']);
        Route::any('reportDiscount', ['as' => 'reportDiscount', 'uses' =>'AllReportController@ReportDiscount']);
        Route::any('reportDiscountSave', ['as' => 'reportDiscountSave', 'uses' =>'AllReportController@ReportDiscountSave']);



        /* Report Purchase Code Start */

        Route::get('reportPurchase', ['as' => 'reportPurchase', 'uses' =>'AllReportController@reportPurchasePage']);

        Route::any('reportPurchaseDelete/{payment_id}', ['as' => 'reportPurchaseDelete', 'uses' =>'AllReportController@reportPurchaseDeleteFormat']);

        /* Report Purchase Code End */


        /* requestSample Code Start */

        Route::get('requestSample', ['as' => 'requestSample', 'uses' =>'AllReportController@requestSamplePage']);

        Route::any('requestSampleDelete/{request_sample_id}', ['as' => 'requestSampleDelete', 'uses' =>'AllReportController@requestSampleDeleteFormat']);

        /* requestSample Code End */
		 /* requestSample Code Start */

        Route::get('requestJPSample', ['as' => 'requestJPSample', 'uses' =>'AllReportController@requestJPSamplePage']);

        Route::any('requestJPSampleDelete/{request_sample_id}', ['as' => 'requestJPSampleDelete', 'uses' =>'AllReportController@requestJPSampleDeleteFormat']);

        /* requestSample Code End */


        /* Report Request Code Start */

        Route::get('reportRequest', ['as' => 'reportRequest', 'uses' =>'AllReportController@reportRequestPage']);

        Route::any('reportRequestDelete/{report_request_sample_id}', ['as' => 'reportRequestDelete', 'uses' =>'AllReportController@reportRequestDeleteFormat']);

        /* Report Request Code End */



     /* ----------------------------------------------------- All Report Code End ------------------------------------------------------- */


     /* ---------------------------------------------------- TOC Start ------------------------------------------------------- */

        Route::get('tocList/{id}', ['as' => 'tocList', 'uses' =>'AllReportController@TOCList']);

        Route::any('addTOC/{id}', ['as' => 'addTOC', 'uses' =>'AllReportController@TOC_add']);

        Route::post('tocSave', ['as' => 'tocSave', 'uses' =>'AllReportController@tocStore']);

        Route::any('tocUpdate/{toc_id}', ['as' => 'tocUpdate', 'uses' =>'AllReportController@tocUpdatePage']);

        Route::post('tocEditSave', ['as' => 'tocEditSave', 'uses' =>'AllReportController@tocEditStore']);

        Route::any('tocDelete/{toc_id}', ['as' => 'tocDelete', 'uses' =>'AllReportController@tocDeleteFormat']);


     /* ----------------------------------------------------- TOC End ------------------------------------------------------- */

     /* ---------------------------------------------------- FAQ Start ------------------------------------------------------- */


        Route::get('faqList/en/{id}', ['as' => 'faqList', 'uses' =>'AllReportController@FAQList']);
        
        Route::get('faqList/ja/{id}', ['as' => 'faqListJapanese', 'uses' =>'AllReportController@FAQListJapanese']);

        Route::any('addFAQ/{id}', ['as' => 'addFAQ', 'uses' =>'AllReportController@FAQ_add']);

        Route::post('faqSave', ['as' => 'faqSave', 'uses' =>'AllReportController@faqStore']);

        Route::any('faqUpdate/{faq_id}', ['as' => 'faqUpdate', 'uses' =>'AllReportController@faqUpdatePage']);

        Route::any('faqJapaneseUpdate/{faq_id}', ['as' => 'faqJapaneseUpdate', 'uses' =>'AllReportController@faqJapaneseUpdatePage']);

        Route::post('faqEditSave', ['as' => 'faqEditSave', 'uses' =>'AllReportController@faqEditStore']);

        Route::post('faqJapaneseEditSave', ['as' => 'faqJapaneseEditSave', 'uses' =>'AllReportController@faqJapaneseEditStore']);

        Route::any('faqDelete/{faq_id}', ['as' => 'faqDelete', 'uses' =>'AllReportController@faqDeleteFormat']);

        Route::any('faqJapaneseDelete/{faq_id}', ['as' => 'faqJapaneseDelete', 'uses' =>'AllReportController@faqJapaneseDeleteFormat']);


     /* ----------------------------------------------------- TOC End ------------------------------------------------------- */


     /* ---------------------------------------------------- Artical Code Start ------------------------------------------------------- */

        Route::get('artical', ['as' => 'artical', 'uses' =>'ArticalController@articalPage']);

        Route::any('addArtical', ['as' => 'addArtical', 'uses' =>'ArticalController@addArticalPage']);

        Route::post('articalSave', ['as' => 'articalSave', 'uses' =>'ArticalController@articalStore']);

        Route::any('articalUpdate/{artical_id}', ['as' => 'articalUpdate', 'uses' =>'ArticalController@articalUpdatePage']);

        Route::post('articalEditSave', ['as' => 'articalEditSave', 'uses' =>'ArticalController@articalEditStore']);

        Route::any('articalDelete/{artical_id}', ['as' => 'articalDelete', 'uses' =>'ArticalController@articalDeleteFormat']);

        Route::any('articalSeeMore/{artical_id}', ['as' => 'articalSeeMore', 'uses' =>'ArticalController@articalSeeMorePage']);

     /* ----------------------------------------------------- Artical Code End ------------------------------------------------------- */

     /* ---------------------------------------------------- Service Code Start ------------------------------------------------------- */

// image save to s3
     Route::any('image', ['as' => 'image', 'uses' =>'AstuteServiceController@s3imginputpage']);
     Route::post('image_store', ['as' => 'image_store', 'uses' =>'AstuteServiceController@s3imgstore']);
     
     Route::get('imageshow', ['as' => 'imageshow', 'uses' =>'AstuteServiceController@image_show']);
// s3 save code end
        Route::get('service', ['as' => 'service', 'uses' =>'AstuteServiceController@servicePage']);

        Route::any('addService', ['as' => 'addService', 'uses' =>'AstuteServiceController@addServicePage']);

        Route::post('serviceSave', ['as' => 'serviceSave', 'uses' =>'AstuteServiceController@serviceStore']);

        Route::any('serviceUpdate/{service_id}', ['as' => 'serviceUpdate', 'uses' =>'AstuteServiceController@serviceUpdatePage']);

        Route::post('serviceEditSave', ['as' => 'serviceEditSave', 'uses' =>'AstuteServiceController@ServiceEditStore']);

        Route::any('serviceDelete/{artical_id}', ['as' => 'serviceDelete', 'uses' =>'AstuteServiceController@serviceDeleteFormat']);



     /* ----------------------------------------------------- Artical Code End ------------------------------------------------------- */


     /* ---------------------------------------------------- Career Code Start ------------------------------------------------------- */

        Route::get('career', ['as' => 'career', 'uses' =>'CareerController@careerPage']);

        Route::any('addCareer', ['as' => 'addCareer', 'uses' =>'CareerController@addCareerPage']);

        Route::post('careerSave', ['as' => 'careerSave', 'uses' =>'CareerController@careerStore']);

        Route::any('careerUpdate/{career_id}', ['as' => 'careerUpdate', 'uses' =>'CareerController@careerUpdatePage']);

        Route::post('careerEditSave', ['as' => 'careerEditSave', 'uses' =>'CareerController@careerEditStore']);

        Route::any('careerDelete/{career_id}', ['as' => 'careerDelete', 'uses' =>'CareerController@careerDeleteFormat']);





        /* ------------------------------------ Job Request Code Start ------------------------------------ */

        Route::get('jobRequest', ['as' => 'jobRequest', 'uses' =>'CareerController@jobRequestPage']);

        Route::any('jobRequestDelete/{carrer_job_request_id}', ['as' => 'jobRequestDelete', 'uses' =>'CareerController@jobRequestDeleteFormat']);

        /* ------------------------------------ Job Request Code End ------------------------------------ */

     /* ----------------------------------------------------- Career Code End ------------------------------------------------------- */



     /* ----------------------------------------------------- CMS Code Start ------------------------------------------------------- */

        Route::get('cms_page', ['as' => 'cms_page', 'uses' =>'CMSController@cms_list']);
        Route::get('add_cms', ['as' => 'add_cms', 'uses' =>'CMSController@add_cms_page']);
        Route::post('cms_save', ['as' => 'cms_save', 'uses' =>'CMSController@cms_store']);

        Route::any('cms_edit/{cms_id}', ['as' => 'cms_edit', 'uses' =>'CMSController@cms_update']);
        Route::post('cms_update_save', ['as' => 'cms_update_save', 'uses' =>'CMSController@cms_update_store']);
        Route::any('cmsDelete/{id}', ['as' => 'cmsDelete', 'uses' =>'CMSController@cmsdestory']);

        Route::any('cmsSeeMore/{cms_id}', ['as' => 'cmsSeeMore', 'uses' =>'CMSController@cmsSeeMorePage']);

        /* ----------------------------------------------------- CMS Code End ------------------------------------------------------- */



     /* ------------------------------------------------ Press Release Code Start ------------------------------------------------------- */

        Route::get('pressRelease', ['as' => 'pressRelease', 'uses' =>'PressRelaseController@pressReleasePage']);

        Route::any('addPressRelease', ['as' => 'addPressRelease', 'uses' =>'PressRelaseController@addPressReleasePage']);

        Route::post('pressReleaseSave', ['as' => 'pressReleaseSave', 'uses' =>'PressRelaseController@pressReleaseStore']);

        Route::any('pressReleaseUpdate/{press_release_id}', ['as' => 'pressReleaseUpdate', 'uses' =>'PressRelaseController@pressReleaseUpdatePage']);

        Route::post('pressReleaseEditSave', ['as' => 'pressReleaseEditSave', 'uses' =>'PressRelaseController@pressReleaseEditStore']);

        Route::any('pressReleaseDelete/{press_release_id}', ['as' => 'pressReleaseDelete', 'uses' =>'PressRelaseController@pressReleaseDeleteFormat']);

        Route::get('pressReleaseEnquiry', ['as' => 'pressReleaseEnquiry', 'uses' =>'PressRelaseController@pressReleaseEnquiry']);


        Route::any('importPressRelease', ['as' => 'importPressRelease', 'uses' =>'PressRelaseController@importPressReleasePage']);

        Route::any('importPressReleaseStore', ['as' => 'importPressReleaseStore', 'uses' =>'PressRelaseController@importPressReleaseStore']);

        Route::any('pressReleaseSeeMore/{press_release_id}', ['as' => 'pressReleaseSeeMore', 'uses' =>'PressRelaseController@pressReleaseSeeMorePage']);

   /* ----------------------------------------------------- Press Release Code End ------------------------------------------------------- */


    /* ------------------------------------------- Report Ocean Insidee Code Start ------------------------------------------------------- */

    Route::get('astuteInside', ['as' => 'astuteInside', 'uses' =>'AstuteInsideController@astuteInsidePage']);

    Route::any('addastuteInside', ['as' => 'addastuteInside', 'uses' =>'AstuteInsideController@addastuteInsidePage']);

    Route::post('astuteInsideSave', ['as' => 'astuteInsideSave', 'uses' =>'AstuteInsideController@astuteInsideStore']);

    Route::any('astuteInsideUpdate/{id}', ['as' => 'astuteInsideUpdate', 'uses' =>'AstuteInsideController@astuteInsideUpdatePage']);

    Route::post('astuteInsideEditSave', ['as' => 'astuteInsideEditSave', 'uses' =>'AstuteInsideController@astuteInsideEditStore']);

    Route::any('astuteInsideDelete/{id}', ['as' => 'astuteInsideDelete', 'uses' =>'AstuteInsideController@astuteInsideDeleteFormat']);

    Route::any('astuteInsideSeeMore/{id}', ['as' => 'astuteInsideSeeMore', 'uses' =>'AstuteInsideController@astuteInsideSeeMorePage']);


	Route::get('insideCategory', ['as' => 'insideCategory', 'uses' =>'AstuteInsideController@insideCategory']);
    Route::post('insideCategorySave', ['as' => 'insideCategorySave', 'uses' =>'AstuteInsideController@insideCategoryStore']);
    Route::post('insideCategoryUpdate', ['as' => 'insideCategoryUpdate', 'uses' =>'AstuteInsideController@insideCategoryUpdateStore']);
    Route::get('astuteInsideCategoryDelete/{id}', ['as' => 'astuteInsideCategoryDelete', 'uses' =>'AstuteInsideController@insideCategoryDestory']);


 /* ------------------------------------------------- Report Ocean Inside Code End ------------------------------------------------------- */


 /* ------------------------------------------------- Express Point Code Start ------------------------------------------------------- */

    Route::get('expressPoint', ['as' => 'expressPoint', 'uses' =>'ExpressPointController@expressPointPage']);

    Route::any('addExpressPoint', ['as' => 'addExpressPoint', 'uses' =>'ExpressPointController@addExpressPointPage']);

    Route::post('expressPointSave', ['as' => 'expressPointSave', 'uses' =>'ExpressPointController@expressPointStore']);

    Route::any('expressPointUpdate/{express_point_id}', ['as' => 'expressPointUpdate', 'uses' =>'ExpressPointController@expressPointUpdatePage']);

    Route::post('expressPointEditSave', ['as' => 'expressPointEditSave', 'uses' =>'ExpressPointController@expressPointEditStore']);

    Route::any('expressPointDelete/{express_point_id}', ['as' => 'expressPointDelete', 'uses' =>'ExpressPointController@expressPointDeleteFormat']);


 /* --------------------------------------------------- Express Point Code End ------------------------------------------------------- */


     /* ------------------------------------------------- Why Report Ocean Code Start ---------------------------------------------------- */

        Route::get('whyastute', ['as' => 'whyastute', 'uses' =>'WhyastuteController@whyastutePage']);

        Route::any('addWhyastute', ['as' => 'addWhyastute', 'uses' =>'WhyastuteController@addWhyastutePage']);

        Route::post('whyastuteSave', ['as' => 'whyastuteSave', 'uses' =>'WhyastuteController@whyastuteStore']);

        Route::get('whyastuteUpdate/{why_report_ocean_id}', ['as' => 'whyastuteUpdate', 'uses' =>'WhyastuteController@whyastuteUpdatePage']);

        Route::post('whyastuteEditSave', ['as' => 'whyastuteEditSave', 'uses' =>'WhyastuteController@whyastuteEditStore']);

        Route::any('whyastuteDelete/{why_report_ocean_id}', ['as' => 'whyastuteDelete', 'uses' =>'WhyastuteController@whyastuteDeleteFormat']);


     /* --------------------------------------------------- Why Report Ocean Code End ---------------------------------------------------- */


     /* ---------------------------------------------------- Category Code Start ---------------------------------------------------- */

    /* Category Level 1*/

        Route::get('category_list', ['as' => 'category_list', 'uses' =>'CategoryController@category_show']);
        Route::post('categoryType', ['as' => 'categoryType', 'uses' =>'CategoryController@categoryTypeSearch']);
        Route::any('add_category', ['as' => 'add_category', 'uses' =>'CategoryController@add_category']);
        Route::post('category_save', ['as' => 'category_save', 'uses' =>'CategoryController@category_store']);
        Route::any('category_edit/{id}', ['as' => 'category_edit', 'uses' =>'CategoryController@category_update']);
        Route::post('category_update', ['as' => 'category_update', 'uses' =>'CategoryController@category_update_store']);
         Route::any('categoryDelete/{id}', ['as' => 'categoryDelete', 'uses' =>'CategoryController@categoryDestory']);

         Route::post('category_status_update', ['as' => 'category_status_update', 'uses' =>'CategoryController@category_status_update']);

        Route::post('category_show_update', ['as' => 'category_show_update', 'uses' =>'CategoryController@category_show_update_store']);



         /*Category Level 2*/
        Route::get('sub_category/{id}', ['as' => 'sub_category', 'uses' =>'CategoryController@sub_category_show']);
        Route::any('add_sub_category/{id}', ['as' => 'add_sub_category', 'uses' =>'CategoryController@add_sub_category']);
         Route::post('sub_category_save', ['as' => 'sub_category_save', 'uses' =>'CategoryController@sub_category_store']);
        Route::any('sub_category_edit/{id}', ['as' => 'sub_category_edit', 'uses' =>'CategoryController@sub_category_update']);
        Route::post('sub_category_update_save', ['as' => 'sub_category_update_save', 'uses' =>'CategoryController@sub_category_update_store']);

        Route::post('sub_category_status_update', ['as' => 'sub_category_status_update', 'uses' =>'CategoryController@sub_category_status_update']);


     /* ---------------------------------------------------- Category Code End ---------------------------------------------------- */


     /* ---------------------------------------- Our Client Code Start ---------------------------------------- */

        Route::get('ourClient', ['as' => 'ourClient', 'uses' =>'OurClientController@ourClientPage']);

        Route::any('addOurClient', ['as' => 'addOurClient', 'uses' =>'OurClientController@addOurClientPage']);

        Route::post('ourClientSave', ['as' => 'ourClientSave', 'uses' =>'OurClientController@ourClientStore']);

        Route::any('ourClientUpdate/{our_client_id}', ['as' => 'ourClientUpdate', 'uses' =>'OurClientController@ourClientUpdatePage']);

        Route::post('ourClientEditSave', ['as' => 'ourClientEditSave', 'uses' =>'OurClientController@ourClientEditStore']);

        Route::any('ourClientDelete/{our_client_id}', ['as' => 'ourClientDelete', 'uses' =>'OurClientController@ourClientDeleteFormat']);


     /* ---------------------------------------- Our Client Code End ---------------------------------------- */



     /* -------------------------------------------------- Testominal Code Start -------------------------------------------------- */

        Route::get('testominal', ['as' => 'testominal', 'uses' =>'TestominalController@testominalPage']);

        Route::any('addTestominal', ['as' => 'addTestominal', 'uses' =>'TestominalController@addTestominalPage']);

        Route::post('testominalSave', ['as' => 'testominalSave', 'uses' =>'TestominalController@testominalStore']);

        Route::any('testominalUpdate/{testominal_id}', ['as' => 'testominalUpdate', 'uses' =>'TestominalController@testominalUpdatePage']);

        Route::post('testominalEditSave', ['as' => 'testominalEditSave', 'uses' =>'TestominalController@testominalEditStore']);

        Route::any('testominalDelete/{testominal_id}', ['as' => 'testominalDelete', 'uses' =>'TestominalController@testominalDeleteFormat']);


     /* -------------------------------------------------- Testominal Code End -------------------------------------------------- */



     /* ------------------------------------------------ Change Password Code Start ------------------------------------------------ */

     Route::get('changePassword', ['as' => 'changePassword', 'uses' =>'UpdatePasswordController@changePasswordPage']);

     Route::any('passwordUpdate/{id}', ['as' => 'passwordUpdate', 'uses' =>'UpdatePasswordController@passwordUpdateForamt']);

     Route::post('changePasswordUpdate', ['as' => 'changePasswordUpdate', 'uses' =>'UpdatePasswordController@changePasswordUpdateStore']);

     Route::post('userStatusUpdate', ['as' => 'userStatusUpdate', 'uses' =>'UpdatePasswordController@userStatusUpdateStore']);

     /* ------------------------------------------------ Change Password Code End ------------------------------------------------ */





     /* ----------------------------------------------------------------------------------------------------------------------------------------------------- Contact Information Code Start ----------------------------------------------------------------------------------------------------------------------------------------------------- */

     /* --------------------------------------- Subscribe Code Start ----------------------------------- */

     Route::get('subscribe', ['as' => 'subscribe', 'uses' =>'ContactController@subscribePage']);
     Route::get('subscribeDelete/{subscribe_id}', ['as' => 'subscribeDelete', 'uses' =>'ContactController@subscribeDeleteFormat']);



     /* --------------------------------------- Subscribe Code End ------------------------------------ */


     /* --------------------------------------- Contact Information Code Start ----------------------------------- */

     Route::get('contact', ['as' => 'contact', 'uses' =>'ContactController@contactPage']);
     Route::get('contactDelete/{contact_id}', ['as' => 'contactDelete', 'uses' =>'ContactController@contactDeleteFormat']);

     Route::get('contactReplay/{contact_id}', ['as' => 'contactReplay', 'uses' =>'ContactController@contactReplayPage']);

     Route::any('contactReplaySave', ['as' => 'contactReplaySave', 'uses' =>'ContactController@contactReplayStore']);

     /* --------------------------------------- Contact Information Code End ------------------------------------ */


      /* ------------------------------------- Site Information Code Start --------------------------------------- */

     Route::get('siteInformation', ['as' => 'siteInformation', 'uses' =>'ContactController@siteInformationPage']);
     Route::any('siteInformationEditSave', ['as' => 'siteInformationEditSave', 'uses' =>'ContactController@siteInformationEditStore']);

     /* ------------------------------------- Site Information Code End --------------------------------------- */

     /* --------------------------------------- Subscribe Code Start ----------------------------------- */

     Route::get('becomePartner', ['as' => 'becomePartner', 'uses' =>'ContactController@becomePartnerPage']);
     Route::get('becomePartnerDelete/{become_partner_id}', ['as' => 'becomePartnerDelete', 'uses' =>'ContactController@becomePartnerDeleteFormat']);

     /* --------------------------------------- Subscribe Code End ------------------------------------ */



     /* ----------------------------------------------------------------------------------------------------------------------------------------------------- Contact Information Code End ----------------------------------------------------------------------------------------------------------------------------------------------------- */






});

});

/*------------------ BackEnd Master Admin Code End -----------------------*/
