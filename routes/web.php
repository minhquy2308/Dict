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



Auth::routes();

Route::resource('word', 'WordTempController');
Route::prefix('admin')->group(function () {
    Route::resource('words', 'WordController');
    Route::get('/words/check', 'WordController@check')->name('words.check');
});
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('main');
    
    Route::get('/author', [
        'uses' => 'AppController@getAuthorPage',
        'as' => 'author',
        'roles' => ['Admin', 'Author']
    ]);
    Route::get('/author/generate-article', [
        'uses' => 'AppController@getGenerateArticle',
        'as' => 'author.article',
        'roles' => ['Author']
    ]);
    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'roles' => ['Admin']
    ]);
    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'roles' => ['Admin']
    ]);
    });