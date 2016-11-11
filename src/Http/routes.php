<?php

Route::group(['middleware' => 'web', 'namespace' => 'Softwaretours\Site\Http\Controllers'], function()
{

	Route::get('/{pageName?}',['as' => 'page', 'uses' => 'PageController@page']);

	/*  LOAD MORE POSTS */
	Route::post('load-posts',['as' => 'posts.load-more', 'uses' => 'PageController@loadPosts']);
	Route::post('/contactForm', ['uses' => 'PageController@contactForm'])->name('contactForm');


});