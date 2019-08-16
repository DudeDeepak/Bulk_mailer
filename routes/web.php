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

use App\Jobs\SendEmailJob;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail', function() {

	$email = "deepakpalakkal2795@gmail.com";

	$job = (new SendEmailJob($email))->delay(Carbon::now()->addSeconds(15));
	dispatch($job);

	return 'Email Sent';

});