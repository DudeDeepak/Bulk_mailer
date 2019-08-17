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
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});


// Testing purpose

// Route::get('/send-mail', function() {


// 	$subject = "This is a sample subject !";
// 	$message = "This is a sample message !!";


// 	$email = "deepakpalakkal2795@gmail.com";

//     // Mail::to($email)->send(new SendEmailMailable($subject, $message));


// 	$job = (new SendEmailJob($email, $subject, $message))->delay(Carbon::now()->addSeconds(5));
// 	dispatch($job);

	
// 	dd('Email Sent');


// });

// Route::get('/member-list', function () {
//     return view('mail.member_list');
// });

Route::get('/member-list', 'MemberController@list_member');

Route::post('/add-member', 'MemberController@add_member');

Route::post('/edit-member/{id}', 'MemberController@edit_member');

Route::post('/delete-member/{id}', 'MemberController@delete_member');

Route::post('/send-bulk-mail', 'MailController@send_mail');

