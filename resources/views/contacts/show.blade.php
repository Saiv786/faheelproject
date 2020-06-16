@extends('layout.master')
@section('title', 'Edit')
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
                <h2><strong>Contact Lists</strong> Edit</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('ContactListController@update',['id'=>$list['id']]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">List Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter List Name" value="{{$list['name']}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="description">List Description<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <textarea id="description" name="description" class="form-control" placeholder="Enter Description" required>{{$list['description']}}</textarea>
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
                </form>
            </div>
        </div>
    </div>
</div>


@stop