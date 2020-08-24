@extends('layout.master')
@section('title', 'Create')
@section('parentPageTitle', 'Campaign')
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
                <h2><strong>Campaign</strong> Create</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('CampaignController@update',['id'=>$list['id']]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Contact List</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control show-tick" id="contact_list_id" name="contact_list_id">
                                     @foreach ($data['contact_lists'] as $contact_list)
                                        <option {{$list->contact_list_id == $contact_list->id ? "selected" : ""}} value="{{ $contact_list->id }}">{{ $contact_list->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{$list['name']}}" id="name" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="subject">Subject<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{$list['subject']}}" id="subject" name="subject" class="form-control" placeholder="Enter subject" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="from_name">From Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{$list['from_name']}}" id="from_name" name="from_name" class="form-control" placeholder="Enter Frame Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="from_email">From Email<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="email" value="{{$list['from_email']}}" id="from_email" name="from_email" class="form-control" placeholder="Enter Frame Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="reply_to">Reply To<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="email" value="{{$list['reply_to']}}" id="reply_to" name="reply_to" class="form-control" placeholder="Enter Reply to" required>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="password_2"></label>
                            <input type="hidden" id="type" class="form-control" placeholder="">
                        </div>
                        <!-- <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" id="track_open" value=true name="track_open" class="custom-control-input" {{$list->track_open == true ? "checked" : ''}}>
                                <label class="custom-control-label" for="track_open">Track opens</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" value=true id="track_click" name="track_click" class="custom-control-input" {{$list->track_click == true ? "checked" : ''}}>
                                <label class="custom-control-label" for="track_click">Track clicks</label>
                            </div>
                        </div> -->
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Templates</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control show-tick" id="template_id" name="template_id">
                                    <!-- <option value="">-- Please select --</option> -->
                                     @foreach ($data['templates'] as $template)
                                        <option {{$list->template_id == $template->id ? "selected" : ""}} value="{{ $template->id }}">{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email_address_2">Schedules</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="form-control show-tick" id="schedule_id" name="schedule_id">
                                    <!-- <option value="">-- Please select --</option> -->
                                     @foreach ($data['schedules'] as $schedule)
                                        <option {{$list->schedule_id == $schedule->id ? "selected" : ""}} value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                                    @endforeach
                                </select>
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
                            <button type="submit" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect" value="submit">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop