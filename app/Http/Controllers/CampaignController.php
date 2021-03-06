<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
	public function index()
	{
		$data = \App\Campaign::where('customer_id',\Auth::user()->id)->get();
		return view('campaigns.index')->with('campaigns', $data);
	}

    public function create()
    {
    	$data = $this->getRelatedData();
        return view('campaigns.create')->with('data',$this->getRelatedData());
    }

    public function store(Request $request)
    {
    	$rules = array(
            'name' => 'required',
            'contact_list_id' => 'required',
            'subject' => 'required',
            'from_name' => 'required',
            'from_email' => 'required | email',
            'reply_to' => 'required | email',
            'template_id' => 'required',
            'schedule_id' => 'required',
        );

        $this->validate($request, $rules);
    	try {

    		$campaign = new \App\Campaign();

    		$campaign['contact_list_id'] = $request['contact_list_id'];
    		$campaign['name'] = $request['name'];
    		$campaign['subject'] = $request['subject'];
    		$campaign['from_name'] = $request['from_name'];
    		$campaign['from_email'] = $request['from_email'];
    		$campaign['reply_to'] = $request['reply_to'];
    		$campaign['track_open'] = (boolean)$request['track_open'];
    		$campaign['track_click'] = (boolean)$request['track_click'];
    		$campaign['template_id'] = $request['template_id'];
    		$campaign['schedule_id'] = $request['schedule_id'];
    		$campaign['customer_id'] = \Auth::user()->id;
    		$campaign['next_run_time'] = \App\Schedule::find($request['schedule_id'])->getNextRunTimeDate() ?? null;

            $campaign->save();
            // $template=\App\Template::find($request['template_id']);
            // $regex = '~\{([^}]*)\}~';
            // // $string = "www.example.com/?foo={foo}&test={test}";
            // preg_match_all($regex, $template['content'], $matches);
            // // preg_match_all($regex, $string, $matches);
            // var_dump($matches[1]);
            // $data=[];
            // $data['template_vars']= $matches[1];
            // $data['template_vars']= $matches[1];
            
            // // return view('campaigns.mapping')->with(['campaign'=>$campaign,'data' => $this->getRelatedData()]);
            return redirect('/Campaigns');
        } catch (\Throwable $e) {
            \Log::error($e);
        }
    	return view();
    }

    public function show($id)
    {
    	$obj= \App\Campaign::find($id);
        return view('campaigns.show')->with(['list'=>$obj,'data' => $this->getRelatedData()]);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'contact_list_id' => 'required',
            'subject' => 'required',
            'from_name' => 'required',
            'from_email' => 'required | email',
            'reply_to' => 'required | email',
            'template_id' => 'required',
            'schedule_id' => 'required',
        );

        $this->validate($request, $rules);
        try {
            $list = \App\Campaign::find($id);

           	$list['contact_list_id'] = $request['contact_list_id'];
    		$list['name'] = $request['name'];
    		$list['subject'] = $request['subject'];
    		$list['from_name'] = $request['from_name'];
    		$list['from_email'] = $request['from_email'];
    		$list['reply_to'] = $request['reply_to'];
    		$list['track_open'] = (boolean)$request['track_open'];
    		$list['track_click'] = (boolean)$request['track_click'];
    		$list['template_id'] = $request['template_id'];
    		$list['schedule_id'] = $request['schedule_id'];

            $list->save();
            return redirect('/Campaigns');
        } catch (\Throwable $e) {
            \Log::error($e);
        }
    }

    public function getRelatedData()
    {
    	$data = [];
    	$data['contact_lists'] = \App\ContactList::all();
    	$data['templates'] = \App\Template::all();
    	$data['schedules'] = \App\Schedule::all();

    	return $data;
    }
}
