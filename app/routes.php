<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
| Is this file a controller?
*/

// route to show the home page
Route::get('/', function()
{
	return View::make('wonderworld');
});


// route to show the philosophy page
Route::get('philosophy', function() 
{
    return View::make('philosophy');
});

// route to show the Steiner-featured Activities page
Route::get('Steiner-featured Activities', function()
{
	 return View::make('Steiner-featured Activities');
});

// route to show the Nature-rich Environment for Learning page
Route::get('Nature-rich Environment for Learning', function()
{
	 return View::make('Nature-rich Environment for Learning');
});

// route to show the Sustainable Education page
Route::get('Sustainable Education', function()
{
	 return View::make('Sustainable Education');
});

// route to show the Play-based Learning page
Route::get('Play-based Learning', function()
{
	 return View::make('Play-based Learning');
});

// route to show the Developing Moral Sensibilities page
Route::get('Developing Moral Sensibilities', function()
{
	 return View::make('Developing Moral Sensibilities');
});

// route to show the Healthy Eating Habit page
Route::get('Healthy Eating Habit', function()
{
	 return View::make('Healthy Eating Habit');
});

// route to show the Our Fees page
Route::get('Our Fees', function()
{
	 return View::make('Our Fees');
});

// route to show the Photoes page
Route::get('Photoes', function()
{
	 return View::make('Photoes');
});

// route to show the Play Group page
Route::get('Play Group', function()
{
	 return View::make('Play Group');
});

// route to show the parenting English page
Route::get('inenglish', function()
{
	 return View::make('inenglish');
});

// route to show the parenting Chinese page
Route::get('inchinese', function()
{
	 return View::make('inchinese');
});

// route to show the Contact page
Route::get('Contact', function()
{
	 return View::make('Contact');
});

// route to process the enquery form, use controller to make a simpler routes.php
Route::post('/', 'HomeController@Validate');

// route to show the enquiry sent page
Route::get('enquirysent', function()
{
	 return View::make('enquirysent');
});
