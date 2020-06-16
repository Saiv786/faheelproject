<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ContactListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = \App\ContactList::all();
        return view('contacts.index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'description' => 'required',
        );
        $this->validate($request, $rules);

        try {

            $list = new \App\ContactList();
            $list['name'] = $request['name'];
            $list['description'] = $request['description'];
            \Log::debug($request['custom_fields']);
            $list['custom_fields'] = $request['custom_fields'];
            $list->save();

            return $this->index();
            // return redirect('/contacts');
        } catch (\Throwable $e) {
            \Log::error($e);
            //throw $th;
        }
    }
    public function storeContact(Request $request)
    {
            
        \Log::info('storeContact');
        \Log::info($request);

        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'list_contact_id' => 'required',
        );

        $this->validate($request, $rules);
        try {
            $contact = new \App\Contact();
            $contact['first_name'] = $request['first_name'];
            $contact['last_name'] = $request['last_name'];
            $contact['email'] = $request['email'];
            $contact['phone_no'] = $request['phone_no'];
            $contact['address'] = $request['address'];
            $contact['contact_list_id'] = $request['list_contact_id'];
            $contact['fields'] = $request;
            $contact->save();
        } catch (\Throwable $e) {
            \Log::error($e);
            
            //throw $th;
        }
        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj= \App\ContactList::find($id);
        return view('contacts.show')->with('list',$obj);
    }
    public function showContacts($id)
    {
        //
        $obj= \App\ContactList::find($id);
        return view('contacts.showContacts')->with('list',$obj)->with('contacts',$obj->contacts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj=\App\ContactList::find($id);
        return view('contacts.addContact')->with('list',$obj);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'name' => 'required',
            'description' => 'required',
        );

        $this->validate($request, $rules);
        try {
            $list = \App\ContactList::find($id);
            $list['name'] = $request['name'];
            $list['description'] = $request['description'];
            $list->save();
            return redirect('/contacts');
        } catch (\Throwable $e) {
            \Log::error($e);

            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obj=\App\ContactList::find($id);
        $obj->contacts()->delete();
        $obj->delete();
        return redirect('/contacts');

    }
}
