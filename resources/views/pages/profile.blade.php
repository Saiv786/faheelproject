@extends('layout.master')
@section('title', 'User Profile')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/light-gallery/css/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                @if(isset(\Auth::user()->image_url))
                <a href=""><img src="{{\Auth::user()->image_url}}" class="rounded-circle shadow " alt="profile-image"></a>
                @else
                <a href=""><img src="{{asset('assets/images/default.png')}}" class="rounded-circle shadow " alt="profile-image"></a>

                @endif
                <h4 class="m-t-10">{{\Auth::user()->name ?? null}}</h4>
                <div class="row">
                    <div class="col-12">
                        <!-- <ul class="social-links list-unstyled">
                            <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul> -->
                        <p class="text-muted">{{\Auth::user()['email']}}</p>
                        <p class="text-muted">{{\Auth::user()['address']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="body">
                <form class="form-horizontal" action="{{ action('UserProfileController@updateAuthUser') }}" accept-charset="utf-8" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Profile Pic<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="file" value="{{\Auth::user()['image_url']}}" id="image_url" name="image_url" class="form-control">
                            </div>
                        </div>
                    </div><div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">User Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{\Auth::user()['name']}}" id="name" name="name" class="form-control" placeholder="Enter List Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Email<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="email" value="{{\Auth::user()['email']}}" id="email" name="email" class="form-control" placeholder="Enter Email Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Contact No.<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{\Auth::user()['contact_no']}}" id="contact_no" name="contact_no" class="form-control" placeholder="Enter Contact No." required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Address<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" value="{{\Auth::user()['address']}}" id="address" name="address" class="form-control" placeholder="Enter Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Password<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="password" value=""  id="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Confirmed Password<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="password" value=""  id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter Confirmed Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-8 offset-sm-2">
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
@section('page-script')
<script src="{{asset('assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('assets/js/pages/calendar/calendar.js')}}"></script>
@stop