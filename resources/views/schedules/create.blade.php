@extends('layout.master')
@section('title', 'Create')
@section('parentPageTitle', 'Schedules')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
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
                <form class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Schedule Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter Schedule Name">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="password_2">Schedule Type</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">One Time</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Recurring</label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Repeat Every</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" id="email_address_2" class="form-control" placeholder="No. of">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="10">Days</option>
                                        <option value="20">Weeks</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="password_2">Frequency</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Occur Once</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Occur Every</label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Occur Every</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" id="email_address_2" class="form-control" placeholder="No. of">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="10">Hour</option>
                                        <option value="20">Minute</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                <input type="text" class="form-control timepicker" placeholder="Please choose a time...">
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
                                <input type="text" class="form-control timepicker" placeholder="Please choose a time...">
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Start Date</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control datetimepicker" placeholder="Please choose date & time...">
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
                                <input type="text" class="form-control datetimepicker" placeholder="Please choose date & time...">
                            </div>
                        </div>
                    </div>
                    </br>
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
                            <button type="button" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop