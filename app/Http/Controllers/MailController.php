<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;


class MailController extends Controller
{

	public function send_mail(Request $request) {

		if(empty($request->input('selected_member_id'))) {

			dd('no recipient selected');
		}

		$selected_member_info_array = Member::whereIn('id', $request->input('selected_member_id'))->get();

		$subject = "This is a sample subject !";
		$message = "This is a sample message !!";

		foreach($selected_member_info_array as $selected_member_info) {

			$email = $selected_member_info->email;

			$job = (new SendEmailJob($email, $subject, $message))->delay(Carbon::now()->addSeconds(5));
			dispatch($job);

		}
		

		dd('Email Sent');


	}
    
}
