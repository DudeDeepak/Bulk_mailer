<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailMailable;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail', function() {

	Mail::to('deepakpalakkal2795@gmail.com')->send(new SendEmailMailable());
	dd('mail sent');

});