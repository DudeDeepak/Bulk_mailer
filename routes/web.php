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
	$subject = "This is a sample subject !";
	$message = "This is a sample message !!";

	$job = (new SendEmailJob($email, $subject, $message))->delay(Carbon::now()->addSeconds(5));
	dispatch($job);

	return 'Email Sent';

});

// Route::get('/member-list', function () {
//     return view('mail.member_list');
// });

Route::get('/member-list', 'MemberController@list_member');

Route::post('/add-member', 'MemberController@add_member');

Route::post('/edit-member/{$id}', 'MemberController@edit_member');

Route::delete('/delete/{$id}', 'MemberController@delete_member');

