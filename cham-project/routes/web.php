<?php
use App\Http\Controllers\IndexController;
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
//Route::get('/', [HomeController::class, 'index']);
//Route::get('/flower/{month}', [IndexController::class, 'showFlower']);
Auth::routes();
Route::group(['prefix' => 'admin'], function()
{
    Route::get('/', 'HomeController@index')->name('admin')->middleware('auth');
    Route::get('/event/add', 'EventController@adminCreate')->middleware('auth');

});
Route::get('/', 'IndexController@index');
Route::get('/flowersforyou/{month}', 'OldProject@showFlower');
Route::get('/wish', 'OldProject@wish');
