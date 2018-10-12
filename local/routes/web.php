<?php

use \Illuminate\Support\Facades\Route;

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
Route::get('test', function () {
    return view('public.support.review');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('soicial');
    Route::get('/callback/{social}', 'SocialAuthController@callback')->name('soicial_callback');
});

Route::post('/notification', function (Illuminate\Http\Request $request) {
    event(new App\Events\NotiEvent($request->get('message'), $request->get('book_id')));
    return [
        'status' => true,
    ];
})->name('notification');

Route::group(['namespace' => 'Client'],function (){
    Route::get('/','IndexController@index')->name('index');
    Route::post('/action_info','IndexController@action_info')->name('action_info');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckAdminLoggedIn'], function () {
        Route::get('/', 'AuthController@getLogin');
        Route::post('/', 'AuthController@postLogin');
    });
    Route::group(['middleware' => 'CheckAdminLoggedOut'], function () {
        Route::get('logout', 'AdminController@getLogout');

        Route::get('/', function () {
            return view('admin.index.index');
        });

        Route::group(['prefix' => 'account','middleware' => 'CheckSuperAccount'], function () {
            Route::get('/', 'AccountController@index');
            Route::post('add', 'AccountController@store');
            Route::post('updatePermission/{id}','AccountController@updatePermission');
            Route::post('resetPassword/{id}','AccountController@resetPassword');
            Route::get('delete/{id}', 'AccountController@delete');
        });

        Route::group(['prefix' => 'config','middleware' => 'CheckConfigPermission'], function () {
            Route::get('/', 'ConfigController@index');
            Route::post('banner', 'ConfigController@updateBanner');
            Route::get('banner/delete/{key}', 'ConfigController@deleteBanner');
            Route::post('info', 'ConfigController@updateInfo');
            Route::post('term', 'ConfigController@updateTerm');
            Route::post('policy', 'ConfigController@updatePolicy');
        });

        Route::group(['prefix' => 'config','middleware' => 'CheckConfigPermission'], function () {
            Route::get('/', 'ConfigController@index');
        });

        Route::group(['prefix' => 'customer-info','middleware' => 'CheckConfigPermission'], function () {
            Route::get('/', 'InfoCustomerController@index')->name('customer_info');
            Route::get('/update_status_info/{id}', 'InfoCustomerController@update_status')->name('update_status_info');
        });

        Route::group(['prefix' => 'website-info','middleware' => 'CheckConfigPermission'], function () {
            Route::get('/', 'InfoWebsiteController@index')->name('website_info');
            Route::post('update_info', 'InfoWebsiteController@update_info')->name('update_info');
        });

        Route::get('general', function () {
            return view('admin.index.forms.general');
        });
        Route::get('advanced', function () {
            return view('admin.index.forms.advanced');
        });
        Route::get('editors', function () {
            return view('admin.index.forms.editors');
        });
        Route::get('simple', function () {
            return view('admin.index.tables.simple');
        });
        Route::get('data', function () {
            return view('admin.index.tables.data');
        });
        Route::get('profile', function () {
            return view('admin.index.profile.profile');
        });
    });
});