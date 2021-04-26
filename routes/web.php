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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/form', 'Form\FormController@form')->Middleware('auth')->name('form');
// Route::post('/form', 'Form\FormController@store')->name('form.store');
// Route profile
Route::get('/profile', 'User\ProfileController@profile')->name('user.profile');
Route::post('/profile', 'User\ProfileController@sendProfile')->name('user.sendProfile');

//route dashboard = home
Route::get('/dashboard', 'User\DashboardController@dashboard')->name('user.dashboard');
Route::post('/dashboard', 'User\DashboardController@sendTable')->name('user.sendTable');
Route::post('/dashboard/edit/{id_tables}', 'User\DashboardController@editTable')->name('ediTable');
Route::post('/dashboard/del/{id_tables}', 'User\DashboardController@delTable')->name('delTable');


// Route columns
Route::get('/postit/{id_tables}', 'User\PostitController@postit')->name('user.postit');
Route::Post('/postit/{id_tables}', 'User\PostitController@addCol')->name('user.addCol');
Route::Post('/postit/edit/{id_tables}', 'User\PostitController@editCol')->name('user.editCol');
Route::post('/postit/delCol/{id_tables}', 'User\PostitController@delCol')->name('user.delCol');


//route cards and comm
Route::Post('/postit/{id_tables}/{column_id}', 'User\PostitController@addCard')->name('user.addCard');
Route::Post('/postit/edit/{id_tables}/{column_id}', 'User\PostitController@editCard')->name('user.editCard');
Route::post('/postit/delCard/{id_tables}/{column_id}', 'User\PostitController@delCard')->name('user.delCard');

Route::Post('/postit/{id_tables}/{column_id}/{card_id}', 'User\PostitController@addCom')->name('user.addCom');
Route::Post('/postit/edit/{id_tables}/{column_id}/{card_id}', 'User\PostitController@editCom')->name('user.editCom');
Route::Post('/postit/delCom/{id_tables}/{column_id}/{card_id}', 'User\PostitController@delCom')->name('user.delCom');

Route::get('/backgrounds', 'User\BackgroundController@getAll')->name('change_background');
Route::Post('/backgrounds', 'User\BackgroundController@addOne');
Route::Delete('/background', 'User\BackgroundController@deleteOne');
