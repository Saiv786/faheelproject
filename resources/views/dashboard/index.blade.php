@extends('layout.master')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')
<script>
    // var year = ['2013', '2014', '2015', '2016', '2020'];
    var year = <?php echo $dates; ?>;
    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;


    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Click',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: data_click
        }, {
            label: 'View',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };
    var dounut_data = {
        datasets: [{
            data: [
                <?php echo \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->where('opens', '>', 0)->count() ?>,
                <?php echo \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->count() ?>,

            ],
            backgroundColor: [
                'blue',
                'green',
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Viewed Emails',
            'Sent Emails',
        ]


    };
    var url_data = {
        datasets: [{
            data: [
                <?php echo \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->where('clicks', '>', 0)->count() ?>,
                <?php echo \jdavidbakr\MailTracker\Model\SentEmail::where('user_id', \Auth::user()->id)->count() ?>,

            ],
            backgroundColor: [
                'yellow',
                'green',
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'URL Clicked Emails',
            'Sent Emails',
        ]


    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Monthly Email Status'
                }
            }
        });
        var ctx = document.getElementById("canvas2").getContext("2d");
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: dounut_data,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Viewed To Sent Ratio'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
        var ctx = document.getElementById("canvas3").getContext("2d");
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: url_data,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'URL Clicked To Sent Ratio'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
        var ctx = document.getElementById("canvas4").getContext("2d");
        var area_chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo $dates; ?>,
                datasets: [{
                    data: <?php echo $viewer; ?>,
                    label: "Views",
                    borderColor: "#3e95cd",
                    fill: true
                }, {
                    data: <?php echo $click; ?>,
                    label: "Clicks",
                    borderColor: "#8e5ea2",
                    fill: true
                }, {
                    data: <?php echo $sent; ?>,
                    label: "Sent",
                    borderColor: "#3cba9f",
                    fill: true
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Monthly Emails Trend'
                }
            }
        });

    };
</script>

<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h7>Sending <br> Limit</h7>
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
                <h7>Contact <br>Lists</h7>
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
                <h7>Contacts </h7>
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
                <h7>Open Rate</h7>
                <h2>{{\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('opens','>',0)->count()}} <small class="info">of {{\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->count()}}</small></h2>
                <small>Total Viewed Emails</small>
                <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow=" {{((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('opens','>',0)->count() )/ (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->count() ==0 ?1 :\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->count() ))*100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('opens','>',0)->count() )/ (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->count() ==0 ?1 :\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->count() ))*100 }}%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="parentContainer" style="width: 100%;">
    <canvas class="col-md-6" id="canvas2" style="float: left; width: 45%; height: 260px;"></canvas>
    <canvas class="col-md-6" id="canvas3" style="float: right; width: 45%; height: 260px;"></canvas>
</div>
<canvas id="canvas" height="280" width="600"></canvas>
<canvas id="canvas4" height="280" width="600"></canvas>



@stop
@section('page-script')
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
@stop