<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
// Admin route
use App\http\Controllers\Admin\DashboardController;
use App\http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
use App\http\Controllers\Admin\DistricController;
use App\http\Controllers\Admin\SubDistricController;
use App\http\Controllers\Admin\PostController;
use App\http\Controllers\Admin\PhotoController;
use App\http\Controllers\Admin\VideoGalleryController;
use App\http\Controllers\Admin\SettingController;
use App\http\Controllers\Admin\GoogleAdsController;
use App\http\Controllers\Admin\FacebookPageController;
use App\http\Controllers\Admin\PageController;
use App\http\Controllers\Admin\FooterController;
// User Route
use App\http\Controllers\User\HomeController;
use App\http\Controllers\User\ViewPostController;
use App\http\Controllers\User\CategoryNewsController;
use App\http\Controllers\User\SubCategoryNewsController;
use App\http\Controllers\User\GalleryController;
use App\http\Controllers\User\DinamicPageController;
use App\http\Controllers\User\ArchiveController;


// Frontend Route
Route::get('/',[HomeController::class,'Home'])->name('home');
Route::get('/view-post/{id}',[ViewPostController::class,'Index'])->name('view.post');
Route::get('/category/news/{id}',[CategoryNewsController::class,'CategoryNews'])->name('category.news');
Route::get('/sub-category/news/{id}',[SubCategoryNewsController::class,'SubCategoryNews'])->name('sub.category.news');
Route::get('/all-country/news',[CategoryNewsController::class,'countryPost'])->name('country.news');
Route::get('/photo-gallery',[GalleryController::class,'PhotoGallery'])->name('photo.gallery');
Route::get('/video-gallery',[GalleryController::class,'VideoGallery'])->name('video.gallery');
Route::get('/pages/{slug}',[DinamicPageController::class,'Index'])->name('front.page');
Route::get('/search',[ArchiveController::class,'Search'])->name('search');

// Language Frontend
Route::get('lan',[HomeController::class,'Language'])->name('lan');
Route::get('/not-found-404',[HomeController::class,'NotFound'])->name('not.found');

// Admin Authentication Controller
Route::prefix('auth')->group(function(){
    Route::get('/login',[AuthController::class,'Login'])->name('login');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    Route::get('/log-out',[AuthController::class,'Logout'])->name('log.out');
});

// Admin Route
Route::prefix('admin')->middleware('adminAuth')->group(function(){
    //Dashboard
    Route::get('/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard');
    //Category-----
    Route::resource('/category', CategoryController::class);
    //Sub Category-----
    Route::resource('/sub-category', SubCategoryController::class);
    //Distric-----
    Route::resource('/districs', DistricController::class);
    //Sub Distric-----
    Route::resource('/sub-districs', SubDistricController::class);
    //Post Route-----
    Route::resource('/post', PostController::class);
    Route::get('/get/subcategory/{id}',[PostController::class,'getSubCategory'])->name('getSubCat');
    Route::get('/get/districs/{id}',[PostController::class,'getSubDistrics'])->name('getSubDist');
    //Photo Gallery Route-----
    Route::resource('/photo', PhotoController::class);
    //Video Gallery Route-----
    Route::resource('/video', VideoGalleryController::class);
    // Page Route-----
    Route::resource('/page', PageController::class);
    Route::get('/page/{id}', [PageController::class,'update'])->name('pageUpdates');

    //Setting Route-----

        // Social route
        Route::get('/setting/social/',[SettingController::class,'social'])->name('social');
        Route::post('/setting/social/update/{id}',[SettingController::class,'socialUpdate'])->name('social.update');
        // SEO route
        Route::get('/setting/seo/',[SettingController::class,'seo'])->name('seo');
        Route::post('/setting/seo/update/{id}',[SettingController::class,'seoUpdate'])->name('seo.update');
        // Prayer Time Route ----
        Route::get('/setting/namaz/',[SettingController::class,'Namaz'])->name('namaz');
        Route::post('/setting/namaz/update/{id}',[SettingController::class,'namazUpdate'])->name('namaz.update');
        // Live TV Route ----
        Route::get('/setting/tv/',[SettingController::class,'TV'])->name('tv');
        Route::post('/setting/tv/update/{id}',[SettingController::class,'TvUpdate'])->name('tv.update');
        Route::get('/setting/tv/status/{id}',[SettingController::class,'TVstatus'])->name('tvstatus');
        // Notice Route ----
        Route::get('/setting/notice/',[SettingController::class,'Notice'])->name('notice');
        Route::post('/setting/notice/update/{id}',[SettingController::class,'NoticeUpdate'])->name('notice.update');
        Route::get('/setting/notice/status/{id}',[SettingController::class,'NoticeStatus'])->name('noticestatus');
        // Google Adscense
        Route::get('/google-ads',[GoogleAdsController::class,'Index'])->name('google.ads');
        Route::post('/google-ads/store',[GoogleAdsController::class,'Store'])->name('ads.store');
        // Facebook Page
        Route::get('/setting/facebook-page/',[FacebookPageController::class,'Index'])->name('fb.page');
        Route::post('/setting/facebook-page/update/{id}',[FacebookPageController::class,'PageUpdate'])->name('page.update');
        Route::get('/setting/facebook-page/status/{id}',[FacebookPageController::class,'PageStatus'])->name('page.status');
        // Footer Controller
        Route::get('/footer',[FooterController::class,'Index'])->name('footer');
        Route::post('/footer/store/{id}',[FooterController::class,'Update'])->name('footer.store');
});
