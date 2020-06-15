@extends('layout.master')
@section('title', 'Edit')
@section('parentPageTitle', 'Schedules')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->


@stop
@section('content')

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Schedules</strong> Create</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('ScheduleController@update',['id'=>$schedule->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Schedule Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{$schedule['name']}}" class="form-control" placeholder="Enter Schedule Name" id='name' name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="password_2">Schedule Type</label>
                            <input type="hidden" id="type" class="form-control" placeholder="">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" {{$schedule->type == 'one_time' ? "checked" : "" }} id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">One Time</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input" {{$schedule->type == 'recurring' ? "checked" : "" }}>
                                <label class="custom-control-label" for="customRadioInline2">Recurring</label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div id="recurring">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">Repeat Every</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" value="{{$schedule['recurr_frequency']}}" id="recurr_frequency" class="form-control" name="recurr_frequency" placeholder="No. of">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control show-tick" id="recurr_type" name="recurr_type">
                                            <!-- <option value="">-- Please select --</option> -->
                                            <option {{$schedule->recurr_type == 'days' ? "selected" : ""}} value="days">Days</option>
                                            <option {{$schedule->recurr_type == 'weeks' ? "selected" : ""}} value="weeks">Weeks</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="password_2">Frequency</label>
                                <input type="hidden" id="is_once" class="form-control" placeholder="">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="frequency_once" name="frequency_once" class="custom-control-input" >
                                    <label class="custom-control-label" for="frequency_once">Occur Once</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio"  id="frequency_every" name="frequency_every" class="custom-control-input">
                                    <label class="custom-control-label" for="frequency_every">Occur Every</label>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div id="every">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                    <label for="occur_every_number">Occur Every</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" value="{{$schedule['occur_every_number']}}" id="occur_every_number" name="occur_every_number" class="form-control" placeholder="No. of">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control show-tick" id="occur_every_type" name="occur_every_type">
                                                <!-- <option value="">-- Please select --</option> -->
                                                <option {{$schedule->occur_every_type == 'days' ? "selected" : ""}} value="hour">Hour</option>
                                                <option {{$schedule->occur_every_type == 'minute' ? "selected" : ""}} value="minute">Minute</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="once">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                    <label for="email_address_2">Occurence Time</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" id="occur_once_time" value="{{$schedule['occur_once_time']}}" name="occur_once_time" class="form-control timepicker" placeholder="Please choose a time...">
                                    </div>
                                </div>
                            </div>
                            </br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">Start Time</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                    </div>
                                    <input type="text" id="occur_every_start_time" name="occur_every_start_time" class="form-control timepicker" value="{{$schedule['occur_every_start_time']}}"  placeholder="Please choose a time...">
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">End Time</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                    </div>
                                    <input type="text" value="{{$schedule['occur_every_end_time']}}" id="occur_every_end_time" name="occur_every_end_time" class="form-control timepicker" placeholder="Please choose a time...">
                                </div>
                            </div>
                        </div>
                        </br>
                        <!-- <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">Start Date</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" id="recur_duration_start_date" class="form-control datetimepicker" placeholder="Please choose date & time...">
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">End Date</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" id="recur_duration_end_date" class="form-control datetimepicker" placeholder="Please choose date & time...">
                                </div>
                            </div>
                        </div>
                        </br> -->
                    </div>
                    <div id='one_time'>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">Occurence Time</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                    </div>
                                    <input type="text" value="{{$schedule['one_time_time']}}" class="form-control timepicker one_time_time" placeholder="Please choose a time..." id="one_time_time" name="one_time_time">
                                </div>
                            </div>
                        </div>
                        <!-- </br>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">Occurence Date</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control datetimepicker" placeholder="Please choose date & time..." id="one_time_date">
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-8 offset-sm-2">
                            <!-- <div class="checkbox">
                                <input id="remember_me_2" type="checkbox">
                                <label for="remember_me_2">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <div class="col-sm-8 offset-sm-2 pull-right">
                            <button type="submit" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // $("#customRadioInline1").prop("checked", true);
    var schedule = {!! $schedule !!};
    if(schedule.type == "one_time"){
        this.one_time();
    }
    else if(schedule.type == "recurring"){
        this.recurring();
    }
    if(schedule.is_once == true){
        this.frequency_once();

    }
    else if(schedule.is_once == false){
        this.frequency_every();

    }
    function frequency_once() {
            $("#frequency_every").prop("checked", false);
            $("#frequency_once").prop("checked", true);
            $("#is_once").value = true;
            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("show");
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("hide");
    }
    function frequency_every() {
            $("#frequency_once").prop("checked", false);
            $("#frequency_every").prop("checked", true);
            $("#is_once").value = false;
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("show");
            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("hide");
    }
    function one_time(){
            $("#customRadioInline2").prop("checked", false);
            $('#recurring').removeClass("hide");
            $('#recurring').removeClass("show");
            $('#recurring').addClass("hide");
            $('#one_time').removeClass("hide");
            $('#one_time').removeClass("show");
            $('#one_time').addClass("show");
            $("#type").value = 'one_time';
    }    
    function recurring(){
            $("#customRadioInline1").prop("checked", false);
            $("#frequency_once").prop("checked", true);
            $("#type").value = 'recurring';
            $('#recurring').removeClass("hide");
            $('#recurring').removeClass("show");
            $('#recurring').addClass("show");
            $('#one_time').removeClass("hide");
            $('#one_time').removeClass("show");
            $('#one_time').addClass("hide");
            $("#frequency_every").prop("checked", false);
            $("#is_once").value = true;

            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("show");
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("hide");
    }
    $("#customRadioInline1").change(function() {
        if (this.checked == true) {
            $("#customRadioInline2").prop("checked", false);
            $('#recurring').removeClass("hide");
            $('#recurring').removeClass("show");
            $('#recurring').addClass("hide");
            $('#one_time').removeClass("hide");
            $('#one_time').removeClass("show");
            $('#one_time').addClass("show");
            $("#type").value = 'one_time';
        }
    });
    $("#customRadioInline2").change(function() {
        if (this.checked == true) {
            $("#customRadioInline1").prop("checked", false);
            $("#frequency_once").prop("checked", true);
            $("#type").value = 'recurring';
            $('#recurring').removeClass("hide");
            $('#recurring').removeClass("show");
            $('#recurring').addClass("show");
            $('#one_time').removeClass("hide");
            $('#one_time').removeClass("show");
            $('#one_time').addClass("hide");
            $("#frequency_every").prop("checked", false);
            $("#is_once").value = true;

            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("show");
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("hide");
        }
    });

    $("#frequency_once").change(function() {
        if (this.checked == true) {
            $("#frequency_every").prop("checked", false);
            $("#is_once").value = true;
            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("show");
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("hide");
            // this.frequency_once();

        }
    });
    $("#frequency_every").change(function() {
        if (this.checked == true) {
            $("#frequency_once").prop("checked", false);
            $("#is_once").value = false;
            $('#every').removeClass("hide");
            $('#every').removeClass("show");
            $('#every').addClass("show");
            $('#once').removeClass("hide");
            $('#once').removeClass("show");
            $('#once').addClass("hide");
            // this.frequency_every();
        }
    });
    // $('#one_time_date').datepicker({
    //     changeMonth: true,
    //     changeYear: true
    // });
    // $('#one_time_date').bootstrapMaterialDatePicker({
    //     format: 'dddd DD MMMM YYYY',
    //     clearButton: true,
    //     nowButton: true,
    //     weekStart: 1,
    //     time: false
    // });
    // $('#date one_time_timetimepicker1').datetimepicker();
    $('.one_time_time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        // format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        switchOnClick: true,
        weekStart: 1
    });
    $('#occur_every_start_time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        // format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        switchOnClick: true,
        weekStart: 1
    });
    $('#occur_every_end_time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        // format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        switchOnClick: true,
        weekStart: 1
    });
    $('#occur_once_time').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        switchOnClick: true,
        weekStart: 1,
        date: false
    });
</script>
<style>
    .hide {
        display: none;
    }

    .show {
        display: block;
    }
</style>
@stop