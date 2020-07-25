<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($id)
    {
        $obj = \App\User::find($id);
        return view('customers.show')->with('user', $obj);
    }
    public function edit($id)
    {
        $user = \App\User::find($id);
        $roles = \App\Role::all();
        return view('customers.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
       //
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'email_counts' => 'required',
            'emails_sent' => 'required',
            'role_id' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
        );
        $this->validate($request, $rules);
        try {
            $user = \App\User::find($id);
            $user['name'] = $request['name'];
            $user['email'] = $request['email'];
            $user['email_counts'] = $request['email_counts'];
            $user['emails_sent'] = $request['emails_sent'];
            $user['role_id'] = $request['role_id'];
            $user['contact_no'] = $request['contact_no'];
            $user['address'] = $request['address'];
            $user->update();
            return redirect('/customers');
        } catch (\Throwable $e) {
            \Log::error($e);

            //throw $th;
        }
    }
}


// $user = \App\User::find($id);
//     	$data = request()->validate([
//             'name' => 'required',
//             'email' => 'required',
//             'email_counts' => 'required',
//             'emails_sent' => 'required',
//             'contact_no' => 'required',
//             'address' => 'required'
//         ]);
       
//     	$user->update($data);

//     	return redirect('/customers');