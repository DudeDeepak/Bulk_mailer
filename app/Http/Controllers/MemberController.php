<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;
use Session;
use Redirect;

class MemberController extends Controller
{


	// Function to list the contacts 
    
    public function list_member() {

    	$member_list = Member::get();

    	return view('mail.member_list', [
    		'member_list' => $member_list
    	]);

    }


    // Function to add the contacts into the list

    public function add_member(Request $request) {

    	// validate input

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

	  	// Check if the user mail is alerady present

	  	if(Member::where('email', $request->input('email'))->exists()) {

		  	Session::flash('member-already-exist', 'The email is already taken');
	    	
	    	return Redirect::to('/');

	  	}

	  	// Create the user

	  	Member::create([
	  		'name' => $request->input('name'),
	  		'email' => $request->input('email')
    	]);

    	// redirect back with proper message

	  	Session::flash('success', 'The member has been created');
    	
	    return Redirect::to('/');

    }

    // Function to edit the contact in the list

    public function edit_member(Request $request, $id) {
    	
    	//validate user

		$input = [
	             'edit-member-name'   => $request->input('edit-member-name'),
	             'edit-member-email' => $request->input('edit-member-email')
	              ];
	  	$rules = [
	             'edit-member-name'   => 'required',
	             'edit-member-email' => 'email'
	             ];
	  	$messages = [
	                  'required' => '* fields is mandatory',
	                  'email'  => 'Please provide email with proper format'
	                ];

	  	$validator = Validator::make($input, $rules, $messages);


	  	// check if the member is already present or got the 
	  	// the requiest from outside ui client and update 

	  	if(Member::where('id', '=', $id)->exists()) {

		  	Member::where('id', '=', $id)->update([
		  		'name' => $request->input('edit-member-name'),
		  		'email' => $request->input('edit-member-email')
	    	]);

		  	Session::flash('success', 'The member information has been updated');
	    	
		    return Redirect::to('/');

	  	}

	  	// in case of error send back appropriate message

	  	Session::flash('update-issue', 'Some issue caused during update');
    	
	    return Redirect::to('/');

    }

    // Function to delete the contacts in the list

    public function delete_member($id) {

    	// check if the user is present and delete it
    	
	  	if(Member::where('id', '=', $id)->exists()) {

		  	Member::where('id', '=', $id)->delete();

		  	Session::flash('success', 'The member has been deleted');
	    	
		    return Redirect::to('/');

	  	} 

	  	// in case of error send back appropriate message

	  	Session::flash('delete-issue', 'Some issue caused during deleting');
    	
	    return Redirect::to('/');

    }


}
