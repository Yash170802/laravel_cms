<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\Blog\blogcategoryController;

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

Route::get('/', function () {
    return redirect('admin');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'App\Http\Controllers\Backend\DashboardController@index')->name('admin-main');
    Route::get('/dashboard', 'App\Http\Controllers\Backend\DashboardController@index')->name('admin-dashboard');

    // TESTIMONIAL...................................................
    Route::get('testimonial', 'App\Http\Controllers\Backend\testimonial\TestimonialController@view')->name('testimonial');
    Route::post('/insert', 'App\Http\Controllers\Backend\testimonial\TestimonialController@insert')->name('insert');
    Route::post('/userlist', 'App\Http\Controllers\Backend\testimonial\TestimonialController@userlist')->name('userlist');
    Route::post('/testimonial_delete', 'App\Http\Controllers\Backend\testimonial\TestimonialController@testimonialDelete')->name('testimonialDelete');
    Route::post('/testimonial_edit', 'App\Http\Controllers\testimonial\TestimonialController@testimonial_edit')->name('testimonial_edit');

    // SMTP..................................................................................................
    Route::get('smtp_settings', 'App\Http\Controllers\Backend\smtp\SmtpSettiingController@view')->name('smtp_settings');
    Route::post('smtp_insert', 'App\Http\Controllers\Backend\smtp\SmtpSettiingController@insert')->name('smtp_insert');
    Route::post('send_mail', 'App\Http\Controllers\Backend\smtp\SmtpSettiingController@send_mail')->name('send_mail');

    // CATEGORY........................................................................................
    Route::get('category', 'App\Http\Controllers\Backend\product\CategoryController@view')->name('category');
    Route::post('/category_insert', 'App\Http\Controllers\Backend\product\CategoryController@category_insert')->name('category_insert');
    Route::post('/categorylist', 'App\Http\Controllers\Backend\product\CategoryController@categorylist')->name('categorylist');
    Route::post('/category_delete', 'App\Http\Controllers\Backend\product\CategoryController@categoryDelete')->name('categoryDelete');
    Route::post('/category_edit', 'App\Http\Controllers\Backend\product\CategoryController@category_edit')->name('category_edit');

    // SUBCATEGORY...........................................................................................
    Route::get('subcategory', 'App\Http\Controllers\Backend\product\SubcategoryController@view')->name('subcategory');
    Route::post('/subcategory_insert', 'App\Http\Controllers\Backend\product\subcategoryController@subcategory_insert')->name('subcategory_insert');
    Route::post('/subcategorylist', 'App\Http\Controllers\Backend\product\subcategoryController@subcategorylist')->name('subcategorylist');
    Route::post('/subcategory_delete', 'App\Http\Controllers\Backend\product\subcategoryController@subcategoryDelete')->name('subcategoryDelete');
    Route::post('/subcategory_edit', 'App\Http\Controllers\Backend\product\subcategoryController@subcategory_edit')->name('subcategory_edit');

    // BLOGCATEGORY...........................................................................................
    Route::get('blogcategory', 'App\Http\Controllers\Backend\blog\BlogcategoryController@view')->name('blogcategory');
    Route::post('/blogcategorycategory_insert', 'App\Http\Controllers\Backend\blog\BlogcategoryController@category_insert')->name('blogcategory_insert');
    Route::post('/blogcategorylist', 'App\Http\Controllers\Backend\blog\BlogcategoryController@categorylist')->name('blogcategorylist');
    Route::post('/blogcategory_delete', 'App\Http\Controllers\Backend\blog\BlogcategoryController@categoryDelete')->name('blogcategoryDelete');
    Route::post('/blogcategory_edit', 'App\Http\Controllers\Backend\blog\BlogcategoryController@category_edit')->name('blogcategory_edit');

    // BLOGSUBCATEGORY...........................................................................................
    Route::get('blogsubcategory', 'App\Http\Controllers\Backend\blog\BlogsubcategoryController@view')->name('blogsubcategory');
    Route::post('/blogsubcategorycategory_insert', 'App\Http\Controllers\Backend\blog\BlogsubcategoryController@subcategory_insert')->name('blogsubcategory_insert');
    Route::post('/blogsubcategorylist', 'App\Http\Controllers\Backend\blog\BlogsubcategoryController@subcategorylist')->name('blogsubcategorylist');
    Route::post('/blogsubcategory_delete', 'App\Http\Controllers\Backend\blog\BlogsubcategoryController@subcategoryDelete')->name('blogsubcategoryDelete');
    Route::post('/blogsubcategory_edit', 'App\Http\Controllers\Backend\blog\BlogsubcategoryController@subcategory_edit')->name('blogsubcategory_edit');

    // Blog......................................................................................................
    Route::get('blog', 'App\Http\Controllers\Backend\blog\BlogController@view')->name('blog');
    Route::post('/blog_insert', 'App\Http\Controllers\Backend\blog\BlogController@blog_insert')->name('blog_insert');
    Route::post('/bloglist', 'App\Http\Controllers\Backend\blog\BlogController@bloglist')->name('bloglist');
    Route::post('/blog_delete', 'App\Http\Controllers\Backend\blog\BlogController@blogDelete')->name('blog_delete');
    Route::post('/blog_edit', 'App\Http\Controllers\Backend\blog\BlogController@blog_edit')->name('blog_edit');

    // AllSUBSCRIBER
    Route::get('subscriber', 'App\Http\Controllers\Backend\subscriber\subscriberController@view')->name('subscriber');
    Route::post('subscriber_insert', 'App\Http\Controllers\Backend\subscriber\subscriberController@subscriber_insert')->name('subscriber_insert');
    Route::post('subscriberlist', 'App\Http\Controllers\Backend\subscriber\subscriberController@subscriberlist')->name('subscriberlist');
    Route::post('/subscriber_delete', 'App\Http\Controllers\Backend\subscriber\subscriberController@subscriberDelete')->name('subscriberDelete');
    Route::post('/subscriber_edit', 'App\Http\Controllers\Backend\subscriber\subscriberController@subscriber_edit')->name('subscriber_edit');
    Route::post('/checkemail', 'App\Http\Controllers\Backend\subscriber\subscriberController@checkEmail')->name('checkemail');
    // Route::('/checkemail', 'App\Http\Controllers\Backend\subscriber\subscriberController@checkemail')->name('subscriber_edit');


    //Email To Subscriber.....................................................................................
    Route::get('emailtosubscriber', 'App\Http\Controllers\Backend\subscriber\emailtosubscriberController@view')->name('emailtosubscriber');
    Route::post('/getdata', 'App\Http\Controllers\Backend\subscriber\emailtosubscriberController@getdata')->name('getdata');
    // Route::post('send_mail', 'App\Http\Controllers\Backend\subscriber\emailtosubscriberController@send_mail')->name('send_mail');

    //Team.....................................................................................
    Route::get('team', 'App\Http\Controllers\Backend\team\teamController@view')->name('team');
    Route::post('/team_insert', 'App\Http\Controllers\Backend\team\teamController@team_insert')->name('team_insert');
    Route::post('/teamlist', 'App\Http\Controllers\Backend\team\teamController@teamlist')->name('teamlist');
    Route::post('/team_delete', 'App\Http\Controllers\Backend\team\teamController@teamDelete')->name('teamDelete');
    Route::post('/team_edit', 'App\Http\Controllers\Backend\team\teamController@team_edit')->name('team_edit');

    //GenralSetting.....................................................................................
    Route::get('setting', 'App\Http\Controllers\Backend\setting\GeneralSettingControllers@view')->name('setting');
    Route::post('setting_insert', 'App\Http\Controllers\Backend\setting\GeneralSettingControllers@logoinsert')->name('setting_insert');
    Route::post('favicon_insert', 'App\Http\Controllers\Backend\setting\GeneralSettingControllers@faviconinsert')->name('favicon_insert');

});
