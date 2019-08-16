<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;
use Session;
use Redirect;

class MemberController extends Controller
{
    
    public function list_member() {

    	return view('mail.member_list');

    }

    public function add_member(Request $request) {


		$input = [
	             'name'   => $request->input('name'),
	             'email' => $request->input('email')
	              ];
	  	$rules = [
	             'name'   => 'required',
	             'email' => 'email'
	             ];
	  	$messages = [
	                  'required' => '* fields is mandatory',
	                  'email'  => 'Please provide email with proper format'
	                ];

	  	$validator = Validator::make($input, $rules, $messages);

	  	if(Member::where('email', $request->input('email'))->exists()) {

		  	Session::flash('member-already-exist', 'The email is already taken');
	    	
	    	return Redirect::to('member-list');

	  	}

	  	Member::create([
	  		'name' => $request->input('name'),
	  		'email' => $request->input('email')
    	]);

	  	Session::flash('success', 'The member has been created');
    	
	    return Redirect::to('member-list');

    }

    public function edit_member(Request $request, $id) {
    	
    }

    public function delete_member($id) {
    	
    }


}
