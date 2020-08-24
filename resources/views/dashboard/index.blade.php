@extends('layout.master')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Sending <br> Limit</h6>
                <h2>{{\Auth::user()->emails_sent}} <small class="info">of @php if(\Auth::user()->isAdmin()){echo 'Unlimited';}else { echo \Auth::user()->email_counts;} @endphp</small></h2>
                <!-- <small>2% higher than last month</small> -->
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{100*(\Auth::user()->emails_sent)/\Auth::user()->email_counts}}%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon sales">
            <div class="body">
                <h6>Contact Lists</h6>
                <h2>{{\App\ContactList::count()}}<small class="info">of 100</small></h2>
                <!-- <h2>{{\App\ContactList::count()}}% <small class="info">of 100</small></h2> -->
                <!-- <small>6% higher than last month</small> -->
                <small> Total Contact Lists </small>
                <div class="progress">
                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="{{\App\ContactList::count()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{\App\ContactList::count()}}%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon email">
            <div class="body">
                <h6>Contacts</h6>
                <h2>{{\App\Contact::count()}} <small class="info">of 1000</small></h2>
                <small>Total Registered Contacts</small>
                <div class="progress">
                    <div class="progress-bar l-purple" role="progressbar" aria-valuenow="{{(\App\Contact::count())*100/1000}}" aria-valuemin="0" aria-valuemax="100" style="width: {{(\App\Contact::count())*100/1000}}%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Open Rate</h6>
                <h2>{{\jdavidbakr\MailTracker\Model\SentEmail::where('opens','>',0)->count()}} <small class="info">of {{\jdavidbakr\MailTracker\Model\SentEmail::count()}}</small></h2>
                <small>Total Viewed Emails</small>
                <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow=" {{((\jdavidbakr\MailTracker\Model\SentEmail::where('opens','>',0)->count() )/ (\jdavidbakr\MailTracker\Model\SentEmail::count() ==0 ?1 :\jdavidbakr\MailTracker\Model\SentEmail::count() ))*100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{((\jdavidbakr\MailTracker\Model\SentEmail::where('opens','>',0)->count() )/ (\jdavidbakr\MailTracker\Model\SentEmail::count() ==0 ?1 :\jdavidbakr\MailTracker\Model\SentEmail::count() ))*100 }}%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong><i class="zmdi zmdi-chart"></i> Email</strong> Report</h2>
                <ul class="header-dropdown">
                    <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li> -->
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body mb-2">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="state_w1 mb-1 mt-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>{{\jdavidbakr\MailTracker\Model\SentEmail::count()}}</h5>
                                    <span><i class="zmdi zmdi-balance"></i> Sent</span>
                                </div>
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#868e96">5,2,3,7,6,4,8,1</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="state_w1 mb-1 mt-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>365</h5>
                                    <span><i class="zmdi zmdi-turning-sign"></i> Returns</span>
                                </div>
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#2bcbba">8,2,6,5,1,4,4,3</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="state_w1 mb-1 mt-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>65</h5>
                                    <span><i class="zmdi zmdi-alert-circle-o"></i> Queries</span>
                                </div>
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">4,4,3,9,2,1,5,7</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="state_w1 mb-1 mt-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5>2,055</h5>
                                    <span><i class="zmdi zmdi-print"></i> Invoices</span>
                                </div>
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">7,5,3,8,4,6,2,9</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="header">
                <h2><strong>Visitors</strong> Statistics</h2>
                <ul class="header-dropdown">
                    <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li> -->
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div id="world-map-markers" class="jvector-map"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Distribution</strong></h2>
                <ul class="header-dropdown">
                    <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li> -->
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body text-center">
                <div id="chart-pie" class="c3_chart d_distribution"></div>
                <button class="btn btn-primary mt-4 mb-4">View More</button>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Traffic</strong> Source</h2>
                <ul class="header-dropdown">
                    <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li> -->
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div id="chart-area-step" class="c3_chart d_traffic"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <span> More than 30% percent of users come from direct links. Check details page for more information.</span>
                        <div class="progress mt-4">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                        <div class="d-flex bd-highlight mt-4">
                            <div class="flex-fill bd-highlight">
                                <h5 class="mb-0">21,521 <i class="zmdi zmdi-long-arrow-up"></i></h5>
                                <small>Today</small>
                            </div>
                            <div class="flex-fill bd-highlight">
                                <h5 class="mb-0">%12.35 <i class="zmdi zmdi-long-arrow-down"></i></h5>
                                <small>Last month %</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
@stop