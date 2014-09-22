<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('sendmail', function(){
	Mail::send('emails.welcome', array(), function($msg){
		$msg->to('thanhcttsp@gmail.com', 'Thanh')->subject('Welcome');
	});
});

Route::get('cache', function(){
	Cache::add('post_123', "post 123", 60);
	return "Cached done";
});

Route::controller('', 'UsersController');

Route::group(array('prefix' => 'api'), function() {
    $namespace = 'Api';
//    Route::controller('product', $namespace . '\ProductController');
});