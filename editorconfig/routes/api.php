<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\AuthController@login');
Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'API\AuthController@logout');
    Route::post('update_password', 'API\UserController@updatePassword');
    Route::get('document_types', 'API\UserController@documentTypes');
    Route::get('profile', 'API\UserController@profile');
    Route::get('my_documents/{parent_id}/{member_id}', 'API\UserController@myDocuments');
    Route::delete('delete_document/{id}', 'API\UserController@deleteDocument');
    Route::post('upload_document', 'API\UserController@uploadDocument');
    Route::get('banks', 'API\UserController@banks');
    Route::get('notifications', 'API\UserController@notifications');
    Route::get('mark_as_read', 'API\UserController@markAsRead');
    Route::post('add_update_member', 'API\UserController@addUpdateMember');
    Route::get('member_list', 'API\UserController@memberList');
    Route::delete('delete_member/{id}', 'API\UserController@deleteMember');
    Route::post('change_member_status', 'API\UserController@changeMemberStatus');
    Route::get('get_document_filter/{member_id}/{key}', 'API\UserController@uploadedDocumentsFilter');
    Route::get('get_month_with_count/{member_id}/{key}', 'API\UserController@getMonthWiseCount');
});
