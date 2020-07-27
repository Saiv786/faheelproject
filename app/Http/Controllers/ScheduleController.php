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
        ini_set('max_execution_time', 180); 
        $lists = \App\Schedule::where('customer_id', \Auth::user()->id)->get();
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
        $schedule['customer_id']=\Auth::user()->id;
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj= \App\Schedule::find($id);
        return view('schedules.show')->with('schedule',$obj);
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
        // dd($id);
        // $rules = array(
        //     'name' => 'required',
        //     'description' => 'required',
        // );
        // $this->validate($request, $rules);

        try {
            $schedule = \App\Schedule::find($id);

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
            \App\Campaign::where('schedule_id', $schedule['one_time_date'])->update([
                'next_run_time'=> $schedule['one_time_date'],
            ]);
            return redirect('/schedules');
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
        $obj=\App\Schedule::find($id);
        $obj->delete();
        return redirect('/schedules');
    }
}
