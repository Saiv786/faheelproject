@extends('layout.master')
@section('title', 'Customers')
@section('content')

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Customer</strong> View</h2>
            </div>
            <div class="body">
                <form class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->name}}<span class="text-blush"> *</span></label>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Email<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->email}}<span class="text-blush"> *</span></label>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">No of Emails<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->email_counts}}<span class="text-blush"> *</span></label>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">No Emails Sent<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->emails_sent}}<span class="text-blush"> *</span></label>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Contact No<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->contact_no}}<span class="text-blush"> *</span></label>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Address<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <label for="name">{{$user->address}}<span class="text-blush"> *</span></label>
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
                            <a href="/customer_edit/{{$user->id}}" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect">Edit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop