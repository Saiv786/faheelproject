@extends('layout.master')
@section('title', 'Customers')
@section('content')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->


@stop

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Customer</strong> Edit</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('CustomerController@update',['id'=>$user['id']]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{$user['name']}}" value="{{$user['name']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Email<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="{{$user['email']}}" value="{{$user['email']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="email">No of Emails<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="email_counts" name="email_counts" class="form-control" placeholder="{{$user['email_counts']}}" value="{{$user['email_counts']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                         <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="no_email">No Emails Sent<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="emails_sent" name="emails_sent" class="form-control" placeholder="{{$user['emails_sent']}}" value="{{$user['emails_sent']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="contact">Contact No<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="contact_no" name="contact_no" class="form-control" placeholder="Enter List Name" value="{{$user['contact_no']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="address">Address<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="address" name="address" class="form-control" placeholder="{{$user['address']}}" value="{{$user['address']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                         <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="no_email">Role<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <select class="form-control show-tick" id="role_id" name="role_id">
                                    <option value="{{$user->role_id}}" selected>
                                    	{{$user->role()->find($user->role_id)->name}}
                                    </option>
                                    @foreach ($roles as $role)
								    	@if($role->id != $user->role_id)
		                                    <option value="{{$role->id}}">
		                                    	{{$role->name}}
		                                    </option>
	                                    @endif
	                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    </br>
                    </br>
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
                            <button type="submit" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect" value="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop