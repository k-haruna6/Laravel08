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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create','create')->name('news.create');
});
/*[課題３]
 Route::controller(AAAController::class)->prefix('xxx')->group(function() {
    Route::get('bbb');
 }
 */

 //【課題４】//
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create','add')->name('profile.add');
    Route::post('profile/create','create')->name('profile.create');
    
    Route::get('profile/edit','add')->name('profile.add');
    Route::post('profile/edit','update')->name('profile.update');
 });
 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
