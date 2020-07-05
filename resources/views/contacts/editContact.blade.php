@extends('layout.master')
@section('title', 'Add Contact')
@section('parentPageTitle', 'Contact Lists')
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
                <h2><strong>Contact</strong> Edit Contact</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('ContactListController@updateContact', $obj->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">First Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" value="{{$obj->first_name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Last Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{$obj->last_name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="description">Contact E-mail<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter E-mail" value="{{$obj->email}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Phone No.<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Enter Phone No." value="{{$obj->phone_no}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Address<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{$obj->address}}" required>
                            </div>
                        </div>
                    </div>
                    @foreach($obj->fields as $key=>$field)
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="name">{{$key}}<span class="text-blush"> *</span></label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="address" name="{{$field}}" value="{{$field}}" class="form-control" placeholder="Enter Address" required>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                        <input type="number" id="list_contact_id" name="list_contact_id" class="form-control" value="{{$obj->contact_list_id}}" hidden>

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