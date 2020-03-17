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
Route::get('Login', 'LoginController@getLogin');
Route::post('postLogin','LoginController@postLogin');
Route::get('Logout', 'LoginController@getLogout');

Route::group(['prefix'=>'Admin','middleware'=>'checkLogin'], function(){

	Route::group(['prefix'=>'User'],function(){
		//list user
		Route::get('','LoginController@getIndex')->name('user.list');
		//create user
		Route::get('create','LoginController@create')->name('user.add')->middleware('checkacl:user-list');
		Route::post('create','LoginController@store')->name('user.postadd');
		Route::get('edit/{id}','LoginController@edit')->name('user.edit');
		Route::post('postedit/{id}','LoginController@postedit')->name('user.postedit');
		Route::get('delete/{id}','LoginController@delete')->name('user.delete');
	});
	//Role
	Route::group(['prefix'=>'Roles'],function(){
		//list user
		Route::get('','RolesController@getIndex')->name('role.list');
		//create user
		Route::get('create','RolesController@create')->name('role.add');
		Route::post('create','RolesController@store')->name('role.postadd');
		Route::get('edit/{id}','RolesController@edit')->name('role.edit');
		Route::post('postedit/{id}','RolesController@postedit')->name('role.postedit');
		Route::get('delete/{id}','RolesController@delete')->name('role.delete');
	});

});

