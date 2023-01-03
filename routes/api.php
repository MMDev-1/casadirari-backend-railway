<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MobileSectionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SectionController;



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
// Category Route
Route::group(['prefix' => '/v1'], function() {
Route::get('sliders', [SliderController::class, 'getSliders'])->name('getSliders');
Route::post('sliders/create', [SliderController::class, 'createSlider'])->name('createSlider');
Route::get('home/categoryTree', [CategoryController::class, 'getCategoryTree'])->name('getCategoryTree');
Route::get('home/categories', [CategoryController::class, 'getHomeCategories'])->name('getHomeCategories');
Route::post('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('home/sections', [SectionController::class, 'getHomeSections'])->name('getHomeSections');
Route::post('home/section/create', [SectionController::class, 'createSection'])->name('createSection');
Route::post('web/settings/footer/create', [FooterController::class, 'addFooterSettings'])->name('addFooterSettings');
Route::put('web/settings/footer/update', [FooterController::class, 'updateFooterSettings'])->name('updateFooterSettings');
Route::get('web/settings/footer', [FooterController::class, 'getFooterSettings'])->name('getFooterSettings');
Route::get('web/settings/mobile', [MobileSectionController::class, 'getMobileSettings'])->name('getMobileSettings');
Route::post('web/settings/mobile/create', [MobileSectionController::class, 'addMobileSection'])->name('addMobileSection');
Route::put('web/settings/mobile/update', [MobileSectionController::class, 'updateMobileSection'])->name('updateMobileSection');


});