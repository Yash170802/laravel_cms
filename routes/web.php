<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\team\teamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\Blog\blogcategoryController;
// use Illuminate\Support\Facades\App;
use App\Http\Controllers\Backend\subscriber\emailtosubscriberController;

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
    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin-main');
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin-dashboard');

    //PRODUCT-CATEGORY........................................................................................
    Route::get('product/category', [App\Http\Controllers\Backend\product\CategoryController::class, 'view'])->name('product-category');
    Route::post('/product/category/insert', [App\Http\Controllers\Backend\product\CategoryController::class, 'category_insert'])->name('category-insert');
    Route::post('/product/category/list', [App\Http\Controllers\Backend\product\CategoryController::class, 'categorylist'])->name('category-list');
    Route::post('/product/category/delete', [App\Http\Controllers\Backend\product\CategoryController::class, 'categoryDelete'])->name('category-delete');
    Route::post('/product/category/edit', [App\Http\Controllers\Backend\product\CategoryController::class, 'category_edit'])->name('category-edit');

    // SUBCATEGORY...........................................................................................
    Route::get('product/subcategory', [App\Http\Controllers\Backend\product\SubcategoryController::class, 'view'])->name('product-subcategory');
    Route::post('product/subcategory/insert', [App\Http\Controllers\Backend\product\SubcategoryController::class, 'subcategory_insert'])->name('subcategory-insert');
    Route::post('/product/subcategory/list', [App\Http\Controllers\Backend\product\SubcategoryController::class, 'subcategorylist'])->name('subcategory-list');
    Route::post('/product/subcategory/delete', [App\Http\Controllers\Backend\product\SubcategoryController::class, 'subcategoryDelete'])->name('subcategory-delete');
    Route::post('/product/subcategory/edit', [App\Http\Controllers\Backend\product\SubcategoryController::class, 'subcategory_edit'])->name('subcategory-edit');

    // BLOG CATEGORY...........................................................................................
    Route::get('blog/category', [App\Http\Controllers\Backend\Blog\CategoryController::class, 'view'])->name('blog-category');
    Route::post('blog/category/insert', [App\Http\Controllers\Backend\Blog\CategoryController::class, 'category_insert'])->name('category_insert');
    Route::post('/blog/category/list', [App\Http\Controllers\Backend\Blog\CategoryController::class, 'categorylist'])->name('categorylist');
    Route::post('/blog/category/delete', [App\Http\Controllers\Backend\blog\CategoryController::class, 'categoryDelete'])->name('categoy-delete');
    Route::post('/blog/category/edit', [App\Http\Controllers\Backend\blog\CategoryController::class, 'category_edit'])->name('categoy-edit');

    // BLOG SUBCATEGORY...........................................................................................
    Route::get('blog/subcategory', [App\Http\Controllers\Backend\Blog\SubcategoryController::class, 'view'])->name('blog-subcategory');
    Route::post('blog/subcategory/insert', [App\Http\Controllers\Backend\Blog\SubcategoryController::class, 'subcategory_insert'])->name('subcategoy-insert');
    Route::post('/blog/subcategory/list', [App\Http\Controllers\Backend\Blog\SubcategoryController::class, 'subcategorylist'])->name('subcategoy-list');
    Route::post('/blog/subcategory/delete', [App\Http\Controllers\Backend\Blog\SubcategoryController::class, 'subcategoryDelete'])->name('subcategoy-delete');
    Route::post('/blog/subcategory/edit', [App\Http\Controllers\Backend\Blog\SubcategoryController::class, 'subcategory_edit'])->name('subcategoy-edit');

    // Blog......................................................................................................
    Route::get('blog', [App\Http\Controllers\Backend\Blog\BlogController::class, 'view'])->name('blog');
    Route::post('/blog/insert', [App\Http\Controllers\Backend\Blog\BlogController::class, 'blog_insert'])->name('blog_insert');
    Route::post('/blog/list', [App\Http\Controllers\Backend\Blog\BlogController::class, 'bloglist'])->name('bloglist');
    Route::post('/blog/delete', [App\Http\Controllers\Backend\Blog\BlogController::class, 'blogDelete'])->name('blog_delete');
    Route::post('/blog/edit', [App\Http\Controllers\Backend\Blog\BlogController::class, 'blog_edit'])->name('blog_edit');

    // AllSUBSCRIBER...............................................................................................
    Route::get('subscriber', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'view'])->name('subscriber');
    Route::post('/subscriber/insert', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'subscriber_insert'])->name('subscriber-insert');
    Route::post('/subscriber/list', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'subscriberlist'])->name('subscriber-list');
    Route::post('/subscriber/delete', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'subscriberDelete'])->name('/subscriber-delete');
    Route::post('/subscriber/edit', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'subscriber_edit'])->name('/subscriber-edit');
    Route::post('/checkemail', [App\Http\Controllers\Backend\subscriber\SubscriberController::class, 'checkemail'])->name('/checkemail');

    // TESTIMONIAL...................................................................................................
    Route::get('testimonial', [App\Http\Controllers\Backend\testimonial\TestimonialController::class, 'view'])->name('testimonial');
    Route::get('/testimonial/list', [App\Http\Controllers\Backend\testimonial\TestimonialController::class, 'list'])->name('testimonial.list');
    Route::post('/testimonial/insert', [App\Http\Controllers\Backend\testimonial\TestimonialController::class, 'insert'])->name('testimonial.insert');
    Route::post('/testimonial/delete', [App\Http\Controllers\Backend\testimonial\TestimonialController::class, 'delete'])->name('testimonial.delete');
    Route::post('/testimonial/edit', [App\Http\Controllers\Backend\testimonial\TestimonialController::class, 'edit'])->name('testimonial.edit');

    //Email To Subscriber.....................................................................................
    Route::get('emailtosubscriber', [App\Http\Controllers\Backend\subscriber\EmailtosubscriberController::class, 'view'])->name('emailto-subscriber');
    Route::post('/getdata', [App\Http\Controllers\Backend\subscriber\EmailtosubscriberController::class, 'getdata'])->name('getdata');
    // Route::post('/getdata', 'App\Http\Controllers\Backend\subscriber\emailtosubscriberController@getdata')->name('getdata');

    //Team.....................................................................................
    Route::get('team', [App\http\Controllers\Backend\team\TeamController::class, 'view'])->name('team');
    Route::post('team/insert', [App\http\Controllers\Backend\team\TeamController::class, 'team_insert'])->name('team-insert');
    Route::post('/team/list', [App\http\Controllers\Backend\team\TeamController::class, 'teamlist'])->name('team-list');
    Route::post('/team/delete', [App\http\Controllers\Backend\team\TeamController::class, 'teamDelete'])->name('team-delete');
    Route::post('/team/edit', [App\http\Controllers\Backend\team\TeamController::class, 'team_edit'])->name('team-edit');


    //GenralSetting.....................................................................................
    Route::get('setting', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'view'])->name('setting');
    Route::post('setting/logo/insert', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'logoinsert'])->name('logo-insert');
    Route::post('setting/favicon/insert', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'faviconinsert'])->name('favicon-insert');
    Route::post('setting/topbar/insert', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'topbarinsert'])->name('topbar-insert');
    Route::post('setting/email', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'emailsendinsert'])->name('email-insert');
    Route::post('setting/color_insert', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'colorinsert'])->name('color-insert');
    Route::post('/social_media/insert', [App\Http\Controllers\Backend\setting\Genralsetting\GeneralSettingControllers::class, 'social_media_insert'])->name('social_media_insert');

    // SMTP SETTTING.............................................................................................
    Route::get('smtp_settings', [App\Http\Controllers\Backend\Setting\SmtpSettiingController::class, 'view'])->name('smtp_settings');
    Route::post('/smtp/insert', [App\Http\Controllers\Backend\Setting\SmtpSettiingController::class, 'insert'])->name('smtp.insert');
    Route::post('/smtp/mail', [App\Http\Controllers\Backend\Setting\SmtpSettiingController::class, 'mail'])->name('smtp.mail');

    // PRODUCT.......................................................................................................
    Route::get('products', [App\Http\Controllers\Backend\product\ProductsController::class, 'view'])->name('products');
    Route::post('/product/insert', [App\Http\Controllers\Backend\product\ProductsController::class, 'insert'])->name('product.insert');
    Route::get('/product/list', [App\Http\Controllers\Backend\product\ProductsController::class, 'list'])->name('product.list');
    Route::post('/product/delete', [App\Http\Controllers\Backend\product\ProductsController::class, 'delete'])->name('product.delete');
    Route::post('/product/edit', [App\Http\Controllers\Backend\product\ProductsController::class, 'edit'])->name('product.edit');

    // PRODUCT IMAGE..............................................................................................
    Route::post('/product/image/delete', [App\Http\Controllers\Backend\product\ProductsController::class, 'image_delete'])->name('product.image.delete');
    Route::get('/product/image/view/{id}', [App\Http\Controllers\Backend\product\ProductsController::class, 'image_view'])->name('product.image.view');

    // PRODUCT IMAGE LIST..........................................................................................
    Route::post('/product/image/list', [App\Http\Controllers\Backend\product\ProductImageController::class, 'list'])->name('product.image.list');
    Route::post('/product/image/view/delete', [App\Http\Controllers\Backend\product\ProductImageController::class, 'delete'])->name('product.image.view.delete');
    Route::post('/product/image/view/insert', [App\Http\Controllers\Backend\product\ProductImageController::class, 'insert'])->name('product.image.view.insert');

    // Portfolio Categories.....................................................................................
    Route::get('portfolioCategories', [App\Http\Controllers\Backend\PortfolioCategories\PortfolioCategoriesController::class, 'view'])->name('portfolioCategories');
    Route::post('/portfolioCategories/insert', [App\Http\Controllers\Backend\PortfolioCategories\PortfolioCategoriesController::class, 'insert'])->name('portfolioCategories.insert');
    Route::post('/portfolioCategories/list', [App\Http\Controllers\Backend\PortfolioCategories\PortfolioCategoriesController::class, 'list'])->name('portfolioCategories.list');
    Route::post('/portfolioCategories/delete', [App\Http\Controllers\Backend\PortfolioCategories\PortfolioCategoriesController::class, 'delete'])->name('portfolioCategories.delete');
    Route::post('/portfolioCategories/edit', [App\Http\Controllers\Backend\PortfolioCategories\PortfolioCategoriesController::class, 'edit'])->name('portfolioCategories.edit');

    // Portfolio.............................................................................................
    Route::get('portfolio', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'view'])->name('portfolio');
    Route::post('/portfolio/insert', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'insert'])->name('portfolio.insert');
    Route::post('/portfolio/list', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'list'])->name('portfolio.list');
    Route::post('/portfolio/delete', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'delete'])->name('portfolio.delete');
    Route::post('/portfolio/edit', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::post('/portfolio/image/delete', [App\Http\Controllers\Backend\Portfolio\PortfolioController::class, 'image_delete'])->name('portfolio.image.delete');

    // CLIENT ROUTE................................................................................................
    Route::get('client', [App\Http\Controllers\Backend\client\ClientController::class, 'view'])->name('client');
    Route::post('/client/insert', [App\Http\Controllers\Backend\client\ClientController::class, 'client_insert'])->name('client-insert');
    Route::post('/client/list', [App\Http\Controllers\Backend\client\ClientController::class, 'client_list'])->name('client-list');
    Route::post('/client/delete', [App\Http\Controllers\Backend\client\ClientController::class, 'client_delete'])->name('client-delete');
    Route::post('/client/edit', [App\Http\Controllers\Backend\client\ClientController::class, 'client_edit'])->name('client-edit');

    // FAQ ROUTE........................................................................................
    Route::get('faq', [App\Http\Controllers\Backend\faq\FaqController::class, 'view'])->name('faq');
    Route::post('/faq/insert', [App\Http\Controllers\Backend\faq\FaqController::class, 'faq_insert'])->name('faq-insert');
    Route::post('/faq/list', [App\Http\Controllers\Backend\faq\FaqController::class, 'faq_list'])->name('faq-list');
    Route::post('/faq/delete', [App\Http\Controllers\Backend\faq\FaqController::class, 'faq_delete'])->name('faq-delete');
    Route::post('/faq/edit', [App\Http\Controllers\Backend\faq\FaqController::class, 'faq_edit'])->name('faq-edit');

    // FEATURES...................................................................................................
    Route::get('feature', [App\Http\Controllers\Backend\feature\FeatureController::class, 'view'])->name('feature');
    Route::post('/feature/insert', [App\Http\Controllers\Backend\feature\FeatureController::class, 'feature_insert'])->name('feature-insert');
    Route::post('/feature/list', [App\Http\Controllers\Backend\feature\FeatureController::class, 'feature_list'])->name('feature-list');
    Route::post('/feature/delete', [App\Http\Controllers\Backend\feature\FeatureController::class, 'feature_delete'])->name('feature-delete');
    Route::post('/feature/edit', [App\Http\Controllers\Backend\feature\FeatureController::class, 'feature_edit'])->name('feature-edit');

    // Service.....................................................................................................
    Route::get('service', [App\Http\Controllers\Backend\Service\ServiceController::class, 'view'])->name('service');
    Route::post('/service/insert', [App\Http\Controllers\Backend\Service\ServiceController::class, 'insert'])->name('service.insert');
    Route::post('/service/list', [App\Http\Controllers\Backend\Service\ServiceController::class, 'list'])->name('service.list');
    Route::post('/service/delete', [App\Http\Controllers\Backend\Service\ServiceController::class, 'delete'])->name('service.delete');
    Route::post('/service/edit', [App\Http\Controllers\Backend\Service\ServiceController::class, 'edit'])->name('service.edit');
});
