<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = \App\Schedule::all();
        return view('schedules.index')->with('schedules', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::debug($request->all());
        // $x=\Carbon\Carbon::parse($request['one_time_time']);
        // \Log::debug($x);
        $schedule=new \App\Schedule();
        $schedule['name']=$request['name'];
        
        if(isset($request['customRadioInline2'])){
            $schedule['type']= 'recurring';
            $schedule['recurr_frequency']= $request['recurr_frequency'];
            $schedule['recurr_type']= $request['recurr_type'];
            if(isset($request['frequency_once'])){
                $schedule['is_once']= true;
                $schedule['occur_once_time']=\Carbon\Carbon::parse( $request['occur_once_time']);
            }else{
                $schedule['is_once']= false;
                $schedule['occur_every_number']= $request['occur_every_number'];
                $schedule['occur_every_type']= $request['occur_every_type'];
            }
            $schedule['occur_every_start_time']= $request['occur_every_start_time'];
            $schedule['occur_every_end_time']= $request['occur_every_end_time'];
        }else{
            $schedule['type']= 'one_time';
            $schedule['one_time_time'] = $request['one_time_time'];
        }
        $schedule['cron']=$schedule->getCronString();
        $schedule['one_time_date']=$schedule->getNextRunTime(null);
        $schedule->save();
        return redirect('/schedules');
        //
        // $rules = array(
        //     'name' => 'required',
        //     'description' => 'required',
        // );

        // $this->validate($request, $rules);
        // try {
        //     $list = new \App\ContactList();
        //     $list['name'] = $request['name'];
        //     $list['description'] = $request['description'];
        //     $list->save();
        //     return redirect('/contacts');
        // } catch (\Throwable $e) {
        //     \Log::error($e);

        //     //throw $th;
        // }
    }
    public function storeContact(Request $request)
    {
        //
        // $rules = array(
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required',
        //     'list_contact_id' => 'required',
        // );

        // $this->validate($request, $rules);
        // try {
        //     $contact = new \App\Contact();
        //     $contact['first_name'] = $request['first_name'];
        //     $contact['last_name'] = $request['last_name'];
        //     $contact['email'] = $request['email'];
        //     $contact['contact_list_id'] = $request['list_contact_id'];
        //     $contact->save();
        // } catch (\Throwable $e) {
        //     \Log::error($e);
            
        //     //throw $th;
        // }
        return redirect('/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $obj= \App\ContactList::find($id);
        // return view('contacts.show')->with('list',$obj);
    }
    public function showContacts($id)
    {
        //
        // $obj= \App\ContactList::find($id);
        // return view('contacts.showContacts')->with('list',$obj)->with('contacts',$obj->contacts);
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
        // $obj=\App\ContactList::find($id);
        // return view('contacts.addContact')->with('list',$obj);

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
        // //
        // $rules = array(
        //     'name' => 'required',
        //     'description' => 'required',
        // );

        // $this->validate($request, $rules);
        // try {
        //     $list = \App\ContactList::find($id);
        //     $list['name'] = $request['name'];
        //     $list['description'] = $request['description'];
        //     $list->save();
        //     return redirect('/contacts');
        // } catch (\Throwable $e) {
        //     \Log::error($e);

        //     //throw $th;
        // }
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
        // $obj=\App\ContactList::find($id);
        // $obj->contacts()->delete();
        // $obj->delete();
        return redirect('/schedules');

    }
}
