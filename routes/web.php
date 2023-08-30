<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProfileupdateController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin',  'admin/dashboard'], function () {
    Route::get('logout', [LoginController::class,'logout']);
    Route::auth();
    Route::get('/', [DashboardController::class,'index']);

    /*IMAGE UPLOAD IN SUMMER NOTE*/
    Route::post('image/upload', [ImageController::class,'upload_image']);

    Route::get('dashboard', [DashboardController::class,'index']);

    /* PROFILE MANAGEMENT */
    Route::resource('profile_update', ProfileupdateController::class);

    /* BANNER MANAGEMENT */
    Route::post('banner/assign', [BannerController::class,'assign']);
    Route::post('banner/unassign', [BannerController::class,'unassign']);
    Route::resource('banner', BannerController::class);

    /* CATEGORY MANAGEMENT */
    Route::post('category/assign', [CategoryController::class,'assign']);
    Route::post('category/unassign', [CategoryController::class,'unassign']);
    Route::resource('category', CategoryController::class);

    /* PRODUCTS MANAGEMENT */
    Route::post('products/assign', [ProductController::class,'assign']);
    Route::post('products/unassign', [ProductController::class,'unassign']);
    Route::resource('products', ProductController::class);

    Route::get('/contactUs', [DashboardController::class,'contactUs']);
    Route::post('/contactUs/{id}', [DashboardController::class,'contactUsDelete']);

    Route::get('/settings', [DashboardController::class,'settings']);
    Route::post('/settings/{id}', [DashboardController::class,'settingUpdate']);

    Auth::routes();
});

/*----------------FRONT END ROUTE START----------------*/

Route::get('/', [HomeController::class,'index']);
Route::get('/contactUs', [HomeController::class,'contactUs']);
Route::post('storeContactUs', [HomeController::class,'storeContactUs']);

/*----------------FRONT END ROUTE END----------------*/
