<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/about-us', 'PageController@aboutUs')->name('about-us');
// Route::get('/faqs', 'PageController@faqs')->name('faqs');
 Route::get('/privacy-policy', 'DashboardController@privacyPolicy')->name('privacy_policy');
// Route::get('/contact-us', 'PageController@contactUs')->name('contact-us');

//Auth::routes();
 Route::get('/', 'DashboardController@index')->name('landing_page');
 Route::get('/inquiry', 'DashboardController@inquiry')->name('inquiry');
 Route::post('/inquiry', 'DashboardController@submitInquiry');
 Route::get('/thank-you', 'DashboardController@thankyou')->name('thankyou');
 Route::post('/contact-us', 'DashboardController@submitContact')->name('contact_us');
Route::get('/terms-conditions', 'DashboardController@termsConditions')->name('terms_conditions');
Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->name('logout');


Route::namespace("Admin")->prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {

        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/policies', 'PolicyController@index')->name('policies');
        Route::post('/policies', 'PolicyController@updatePolicy');
        Route::get('/enquiries', 'InquiryController@index')->name('enquiries');
        Route::get('/contact-us', 'ContactUsController@index')->name('contactus');
        Route::get('accountants', 'AccountantController@index')->name('accountants');
        Route::post('accountants/delete', 'AccountantController@delete');
        Route::post('accountants/change-status', 'AccountantController@statusChange');
        Route::get('accountant-view/{id}', 'AccountantController@view')->name('view_accountant');
        Route::get('accountant/clients-view/{id}', 'AccountantController@viewClient')->name('admin_view_client');
        Route::get('accountants/add', 'AccountantController@add')->name('add_accountant');
        Route::post('accountants/add-update', 'AccountantController@addUpdateAccountant')->name('add_update_accountant');
        Route::get('accountants/edit/{id}', 'AccountantController@edit')->name('edit_accountant');
        Route::get('my-profile', 'ProfileController@index')->name('admin_profile');
        Route::post('update-profile', 'ProfileController@updateProfile')->name('admin_update_profile');
        Route::get('subscription-plans', 'PlanController@index')->name('plans');
        Route::get('edit-plan/{id}', 'PlanController@edit')->name('edit_plan');
        Route::post('edit-plan/{id}', 'PlanController@updatePlan');

        Route::get('notifications', 'AccountantController@notifications')->name('notifications');
        Route::post('send-notification', 'AccountantController@sendNotifications')->name('adminSendNotification');
    });
});

Route::namespace("Accountant")->prefix('accountant')->group(function () {
    Route::group(['middleware' => ['auth', 'accountant']], function () {

        Route::get('/', 'DashboardController@index')->name('accountant_dashboard');

        Route::get('clients', 'ClientController@index')->name('clients');
        Route::get('clients/gst', 'ClientController@gst')->name('accoutant_gst');
        Route::get('clients/data-summary/{id}', 'ClientController@dataSummary')->name('accoutant_data_summary');
        Route::post('clients/delete', 'ClientController@delete');
        Route::post('clients/documents/delete', 'ClientController@deleteDocument');
        Route::post('clients/change-status', 'ClientController@statusChange');
        Route::post('clients/document/change-status', 'ClientController@documentStatusChange');
        Route::get('client-view/{id}', 'ClientController@view')->name('view_client');
        Route::get('client-personal-details/{id}', 'ClientController@clientDetails')->name('client_personal_details');
        Route::get('member-view/{id}', 'ClientController@view')->name('view_client_member');
        Route::get('clients/add', 'ClientController@add')->name('add_client');
        Route::post('clients/add-update', 'ClientController@addUpdateAccountant')->name('add_update_client');
        Route::get('clients/edit/{id}', 'ClientController@edit')->name('edit_client');
        Route::get('client-notifications', 'ClientController@notifications')->name('send_notifications');
        
        Route::post('send-notification', 'ClientController@sendNotifications')->name('sendNotification');
        Route::get('notifications', 'NotificationController@index')->name('accountant_notifications');
        Route::get('mark-as-read', 'NotificationController@markAsRead')->name('accountant_mark_as_read');
        Route::get('my-profile', 'ProfileController@index')->name('accountant_settings');
        Route::post('update-password', 'ProfileController@updatePassword')->name('accountant_update_password');
        Route::post('update-profile', 'ProfileController@updateProfile')->name('accountant_update_profile');
        

        Route::get('clients/download-csv', 'ClientController@downloadZip')->name('downloadZip');
        Route::get('clients/download-json', 'ClientController@downloadJson')->name('downloadJson');
        Route::post('upload-gst-document', 'ClientController@uploadGstDocument');

    });
});

Route::namespace("Client")->prefix('client')->group(function () {
    Route::group(['middleware' => ['auth', 'client']], function () {
        Route::get('/', 'MemberController@index')->name('client_dashboard');
        Route::post('/dms/delete', 'DocumentController@deleteDocument');
        Route::get('/dms', 'DocumentController@dms')->name('dms');
        Route::get('/gst', 'DocumentController@gst')->name('gst');
        Route::post('/upload-document', 'DocumentController@uploadDocument');
        Route::post('/upload-gst-document', 'DocumentController@uploadGstDocument');
        Route::get('my-profile', 'ProfileController@index')->name('client_profile');
        Route::post('update-password', 'ProfileController@updatePassword')->name('client_update_password');
        Route::get('help', 'SupportController@index')->name('client_help');
        Route::post('create-support-ticket', 'SupportController@addSupportTicket')->name('client_add_support');
        Route::get('notifications', 'NotificationController@index')->name('client_notifications');
        Route::get('mark-as-read', 'NotificationController@markAsRead')->name('client_mark_as_read');

        Route::get('members', 'MemberController@index')->name('members');
        Route::post('members/delete', 'MemberController@delete');
        Route::post('members/documents/delete', 'MemberController@deleteDocument');
        Route::post('members/change-status', 'MemberController@statusChange');
        Route::post('members/document/change-status', 'MemberController@documentStatusChange');
        Route::get('member-view/{id}', 'MemberController@view')->name('view_member');
        Route::get('member-details/{id}', 'MemberController@details')->name('member_details');
        Route::get('members/add', 'MemberController@add')->name('add_member');
        Route::post('members/add-update', 'MemberController@addUpdateMember')->name('add_update_member');
        Route::get('members/edit/{id}', 'MemberController@edit')->name('edit_member');

    });
});
