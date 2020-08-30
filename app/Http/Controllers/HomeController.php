<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $viewer = \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->select(DB::raw("SUM(opens) as count,DATE_FORMAT(created_at, '%M %Y') as date"))
        ->orderBy("date")
        ->groupBy(DB::raw("date"))
        ->get()->toArray();
        $dates = array_column($viewer, 'date');
        $viewer = array_column($viewer, 'count');

        $click = \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->select(DB::raw("SUM(clicks) as count,DATE_FORMAT(created_at, '%M %Y') as date"))
        ->orderBy("date")
        ->groupBy(DB::raw("date"))
        ->get()->toArray();
        $click = array_column($click, 'count');
        $sent = \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->select(DB::raw("count(*) as count,DATE_FORMAT(created_at, '%M %Y') as date"))
        ->orderBy("date")
        ->groupBy(DB::raw("date"))
        ->get()->toArray();
        $sent = array_column($sent, 'count');

        return view('dashboard.index')
        ->with('viewer', json_encode($viewer, JSON_NUMERIC_CHECK))
        ->with('dates', json_encode($dates, JSON_NUMERIC_CHECK))
            ->with('click', json_encode($click, JSON_NUMERIC_CHECK))
            ->with('sent', json_encode($sent, JSON_NUMERIC_CHECK));
    }
    public function chartjs()
    {
        $viewer = \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->select(DB::raw("SUM(opens) as count,DATE_FORMAT(created_at, '%M %Y') as date"))
        ->orderBy("date")
        ->groupBy(DB::raw("date"))
        ->get()->toArray();
        $dates = array_column($viewer, 'date');
        $viewer = array_column($viewer, 'count');
        
        $click = \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->select(DB::raw("SUM(clicks) as count,DATE_FORMAT(created_at, '%M %Y') as date"))
        ->orderBy("date")
        ->groupBy(DB::raw("date"))
        ->get()->toArray();
        $click = array_column($click, 'count');

        return view('chartjs')
        ->with('viewer', json_encode($viewer, JSON_NUMERIC_CHECK))
        ->with('dates', json_encode($dates, JSON_NUMERIC_CHECK))
            ->with('click', json_encode($click, JSON_NUMERIC_CHECK));
    }
}
