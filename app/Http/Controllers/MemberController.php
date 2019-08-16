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

    	$member_list = Member::get();

    	return view('mail.member_list', [
    		'member_list' => $member_list
    	]);

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

	  	if(Member::where('id', '=', $id)->exists()) {

		  	Member::where('id', '=', $id)->update([
		  		'name' => $request->input('edit-member-name'),
		  		'email' => $request->input('edit-member-email')
	    	]);

		  	Session::flash('success', 'The member information has been updated');
	    	
		    return Redirect::to('member-list');

	  	} 

	  	Session::flash('update-issue', 'Some issue caused during update');
    	
	    return Redirect::to('member-list');

    }

    public function delete_member($id) {
    	
	  	if(Member::where('id', '=', $id)->exists()) {

		  	Member::where('id', '=', $id)->delete();

		  	Session::flash('success', 'The member has been deleted');
	    	
		    return Redirect::to('member-list');

	  	} 

	  	Session::flash('delete-issue', 'Some issue caused during deleting');
    	
	    return Redirect::to('member-list');

    }


}
