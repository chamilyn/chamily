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
    Route::resource('/event', 'EventController')->middleware(['auth','is_admin']);
    Route::get('/get_event_datatable', 'EventController@getDatatables')->middleware(['auth','is_admin']);

    Route::get('/feedbacks', 'FeedbackController@index')->middleware(['auth','is_admin']);
    Route::delete('/feedbacks/{id}', 'FeedbackController@destroy')->middleware(['auth','is_admin']);

    Route::get('/savings', 'SavingController@index')->middleware(['auth','is_admin']);
    Route::get('/savings/create', 'SavingController@create')->middleware(['auth','is_admin']);
    Route::post('/savings', 'SavingController@store')->middleware(['auth','is_admin']);
    Route::get('/savings/{id}/edit', 'SavingController@edit')->middleware(['auth','is_admin']);
    Route::put('/savings/{id}', 'SavingController@update')->middleware(['auth','is_admin']);
    Route::delete('/savings/{id}', 'SavingController@destroy')->middleware(['auth','is_admin']);

    Route::get('/savings/{id}', 'SavingController@show')->middleware(['auth','is_admin']);
    Route::get('/savings/{id}/lineitem/create', 'SavingController@createLineitem')->middleware(['auth','is_admin']);
    Route::post('/savings/{id}/lineitem/', 'SavingController@storeLineitem')->middleware(['auth','is_admin']);
    Route::get('/savings/{id}/lineitem/{lineitem_id}/edit/', 'SavingController@editLineitem')->middleware(['auth','is_admin']);
    Route::put('/savings/{id}/lineitem/{lineitem_id}', 'SavingController@updateLineitem')->middleware(['auth','is_admin']);
    Route::delete('/savings/{id}/lineitem/{lineitem_id}', 'SavingController@destroyLineitem')->middleware(['auth','is_admin']);

});
Route::group(['prefix' => 'php_artisan_command'], function()
{
    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
        return 'Link complete!';
    })->middleware('auth');

    Route::get('/migrate', function () {
        Artisan::call('migrate');
        return 'Migration complete!';
    })->middleware('auth');

});
Route::group(['prefix' => 'kongtun'], function()
{
    Route::get('/', 'SavingController@info');
    Route::get('/login', 'SavingController@login');
    Route::get('/summary', 'SavingController@summary');

});
Route::get('/', 'IndexController@index')->name('welcome');
Route::get('/flowersforyou/{month}', 'OldProjectController@showFlower');
Route::get('/wish', 'OldProjectController@wish');
Route::get('/janken/2023', 'OldProjectController@janken2023');
Route::get('/schedule', 'EventController@clientIndex');
Route::get('/get_event_schedules', 'EventController@getEventSchedules');

Route::get('/feedbacks', 'FeedbackController@create');
Route::post('/feedbacks', 'FeedbackController@store');

Route::get('/random', function () {
    return view('random_number.random');
});
Route::get('/ledlight', function () {
    $text = request()->query('text_sign');
    $color = request()->query('text_color');
    if (!$text && !$color) {
        return view('sign_light.form');
    } else {
        return view('sign_light.show', compact("text", "color"));
    }
    
});
Route::post('/ledlight', function () {
    $text = request()->text_sign;
    $color = request()->text_color;
    $size = request()->text_size;
    $is_move = request()->text_move_val;
    return view('sign_light.show', compact("text", "color", "size", "is_move"));
    
});
Route::get('/test/random', function () {
    return view('random_number.random_new');
});

Route::get('/test/drawing', function () {
    return view('drawing.drawing');
});

Route::get('/about', function () {
    return view('about.about');
});

Route::get('/champoo_birthday_2023', function () {
    return view('birthday_project.2023.show');
});

Route::resource('/writing', 'WishingController');
Route::get('/writing/{id}/champoo', 'WishingController@showChampoo');
Route::post('/writing_save_lineitem', 'WishingController@storeLineitem');

Route::resource('/record_iam', 'RecordIamController');
Route::post('/record_iam_download', 'RecordIamController@downloadLink');