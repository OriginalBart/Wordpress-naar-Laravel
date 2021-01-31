<?php

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

Route::get('/', 'FetchProjectsController@index');
Route::get('/projects', 'FetchProjectsController@fetchAll');
Route::get('/projects/detail/{id}', 'FetchProjectsController@detail');
Route::post('/add/cart', 'OrderController@store');


Route::get('/about', function () {
    return view('about');
});

Route::get('/timetable', function () {
    return view('dashboard.timetable.index');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

    Route::resource('project', 'ProjectenController');


    Route::resource('order', 'OrderController');

});
Route::group(['middleware' => ['auth']],function(){
    Route::get('event','EventController@index')->name('event');
    Route::get('event-list','EventController@event_list');
    Route::post('event','EventController@save_event');
    Route::get('all-event','EventController@all_event')->name('all-event');
    Route::get('single-event/{id}','EventController@single_event');
    Route::post('update-event','EventController@update_event');
    Route::delete('delete-event/{id}','EventController@delete_event');
    Route::post('/event/fetch','EventController@StageReq')->name('event.fetch');

});
Auth::routes(
// [
//     'register' => false, // Register Routes...
//     'reset' => false, // Reset Password Routes...
//     'verify' => false, // Email Verification Routes...
// ]
);