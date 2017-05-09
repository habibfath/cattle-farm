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

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('nerds', 'NerdController');

    // Route resource controller
    // Route::resource('/mahasiswa', 'MahasiswaController');

    // Route resource manual
    Route::post('/mahasiswa', 'MahasiswaController@store')->name('mahasiswa.store');
    Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/mahasiswa/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::delete('/mahasiswa/{id}', 'MahasiswaController@destroy')->name('mahasiswa.destroy');
    Route::put('/mahasiswa/{id}', 'MahasiswaController@update')->name('mahasiswa.update');
    Route::get('/mahasiswa/{id}', 'MahasiswaController@show')->name('mahasiswa.show');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
});

// Route test request
Route::post('/test-request', function () {
    $request = app('Illuminate\Http\Request');
    dd($request->all());
})->name('test-request');

Route::get('/', 'PageController@home')->name('page.home');
Route::get('/about', 'PageController@about')->name('page.about');
Route::get('/blog', 'PageController@blog')->name('page.blog');
Route::get('/contact', 'PageController@contact')->name('page.contact');


Route::post('/blog', 'PostController@store')->name('blog.store');
//Route::get('/blog', 'PostController@index')->name('blog.index');
Route::get('/blog/create', 'PostController@create')->name('blog.create');
Route::delete('/blog/{id}', 'PostController@destroy')->name('blog.destroy');
Route::put('/blog/{id}', 'PostController@update')->name('blog.update');
Route::get('/blog/{id}', 'PostController@show')->name('blog.show');
Route::get('/blog/{id}/edit', 'PostController@edit')->name('blog.edit');
