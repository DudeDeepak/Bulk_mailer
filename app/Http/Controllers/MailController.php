<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;


class MailController extends Controller
{

	// Function to accept the user list and queue mails 
	// and dispatch

	public function send_mail(Request $request) {

		// initialize variables

		$response_array = [];

		// check if selected members are empty

		if(empty($request->input('selected_member_id'))) {

			// Send response back to the user and return

			$response_array['status'] = 300;
			$response_array['msg'] = "No recipients selected to send the mail !!";

			header('Content-Type: application/json');
			echo json_encode($response_array);

			return;
		}

		// Get the user in formation for selected memeber

		$selected_member_info_array = Member::whereIn('id', $request->input('selected_member_id'))->get();

		// Get the mail subject and contents and queue the mail process 
		// and dispatch using queue workers

		$subject = $request->input('mail_subject');
		$message = $request->input('mail_content');

		foreach($selected_member_info_array as $selected_member_info) {

			$email = $selected_member_info->email;

			$job = (new SendEmailJob($email, $subject, $message))->delay(Carbon::now()->addSeconds(5));
			dispatch($job);

		}
		
		// Send response back to the user

		$response_array['status'] = 200;
		$response_array['msg'] = "Mail request has been sent successfully !!";

		header('Content-Type: application/json');
		echo json_encode($response_array);

	}
    
}
