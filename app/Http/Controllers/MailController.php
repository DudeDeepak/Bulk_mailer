<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;


class MailController extends Controller
{

	public function send_mail(Request $request) {


		$response_array = [];

		if(empty($request->input('selected_member_id'))) {

			$response_array['status'] = 300;
			$response_array['msg'] = "No recipients selected to send the mail !!";

			header('Content-Type: application/json');
			echo json_encode($response_array);

			return;
		}

		$selected_member_info_array = Member::whereIn('id', $request->input('selected_member_id'))->get();

		$subject = "This is a sample subject !";
		$message = "This is a sample message !!";

		foreach($selected_member_info_array as $selected_member_info) {

			$email = $selected_member_info->email;

			$job = (new SendEmailJob($email, $subject, $message))->delay(Carbon::now()->addSeconds(5));
			dispatch($job);

		}
		
		$response_array['status'] = 200;
		$response_array['msg'] = "Mail request has been sent successfully !!";

		header('Content-Type: application/json');
		echo json_encode($response_array);

	}
    
}
