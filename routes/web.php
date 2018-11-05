<?php
// 主页
Route::get('/', 'StaticPagesController@home');
// 帮助页面
Route::get('/help', 'StaticPagesController@help')->name('help');
// 关于页面
Route::get('/about', 'StaticPagesController@about')->name('about');


// 注册页面
Route::get('/signup', 'UsersController@create')->name('signup');
// 用户路由资源
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destory')->name('logout');