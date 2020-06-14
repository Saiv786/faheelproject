<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
 	public function getAuthUser()
  	{
  		$user = \Auth::user();
  		// $user['password'] = Crypt::decryptString($use['password']);
        return view('pages.profile')->with('user',$user);
  	}

  	public function updateAuthUser(Request $request)
  	  	{
  	  		$user = \App\User::find(\Auth::id());
  	  		\Log::debug('in AtuthUser Upate Method');
  	  		\Log::debug($user);
  	  		$this->validate(request(), [
            	'name' => 'required',
            	'contact_no' => 'required',
            	'email' => 'required|email|unique:users',
            	'password' => 'required|min:8|confirmed'
        	]);

        	$user->name = $request['name'];
        	$user->email = $request['email'];
        	$user->email = $request['contact_no'];
        	$user->email = $request['address'];
        	$user->password = bcrypt($request['password']);

        	$user->save();
            return redirect('/profile');
  	  	}  	
}
