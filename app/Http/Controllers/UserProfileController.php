<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
 	public function getAuthUser()
  	{
  		$user = \Auth::user();
  		\Log::info('getAuthUser');
  		// \Log::info(decrypt($user->password));
  		\Log::info($user->getOriginal('password'));
        return view('pages.profile')->with('user',$user);
  	}

  	public function updateAuthUser(Request $request)
  	{
  		$user = \App\User::find(\Auth::id());

	 //  		$this->validate(request(), [
	 //    	'name' => 'required',
	 //    	'contact_no' => 'required',
	 //    	'email' => 'required|email|unique:users',
	 //    	'password' => 'required|min:8|confirmed',
	 //  		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		// ]);

  	$cover = request()->image_url;
  	if($cover){
    	$extension = $cover->getClientOriginalExtension();
    	Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover)); 
  	}

	$user['name'] = $request['name'];
	$user['email'] = $request['email'];
	$user['contact_no'] = $request['contact_no'];
	$user['address'] = $request['address'];
	$user['password'] = bcrypt($request['password']);
	$user['image_url'] = $cover ? $cover->getFilename().'.'.$extension : $user->image_url;

	$user->save();
    return redirect('/profile');
  	}  	
}
