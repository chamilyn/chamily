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
    Route::resource('/event', 'EventController')->middleware('auth');
    Route::get('/get_event_datatable', 'EventController@getDatatables')->middleware('auth');

});
Route::get('/', 'IndexController@index');
Route::get('/flowersforyou/{month}', 'OldProjectController@showFlower');
Route::get('/wish', 'OldProjectController@wish');
Route::get('/schedule', 'EventController@clientIndex');
Route::get('/get_event_schedules', 'EventController@getEventSchedules');


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});