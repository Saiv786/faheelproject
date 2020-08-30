@extends('layout.master')
@section('title', 'Contact Lists')
@section('parentPageTitle', 'Contacts')

@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="{{ route('contacts') }}" type="button" class="btn bg-info-800 btn-primary">
            <i class="zmdi zmdi-arrow-left"></i> {{ trans('messages.go_back') }}
        </a>
        <div class="card project_list">
            <div class="table-responsive">
                <table class="table table-hover c_table theme-color">
                    <thead>
                        <tr>
                            <th style="width:50px;">First Name</th>
                            <th>Last Name</th>
                            <th class="hidden-md-down">Email</th>
                            <th class="hidden-md-down" width="150px">Open Rate</th>
                            <th class="hidden-md-down" width="150px">Click Rate</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td><a href="{{ action('ContactListController@editContacts', $contact->id) }}">{{$contact->first_name}}</a><br>
                            </td>
                            <td><a href="{{ action('ContactListController@editContacts', $contact->id) }}">{{$contact->last_name}}</a><br></td>

                            </td>
                            <td>
                                <strong>{{$contact->email}}</strong><br>
                            </td>
                            <td class="hidden-md-down">
                                <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="{{ ((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('opens')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) )*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('opens')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) )*100}}%;"></div>
                                </div>
                                <small>Rate: {{( (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('opens')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) ) * 100}}%</small>
                            </td>
                            <td class="hidden-md-down">
                                <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="{{ ((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('clicks')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) )*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ((\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('clicks')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) )*100}}%;"></div>
                                </div>
                                <small>Rate: {{( (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->sum('clicks')) / (\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count() == 0 ? 1:\jdavidbakr\MailTracker\Model\SentEmail::where('user_id',\Auth::user()->id)->where('contact_id',$contact->id)->count()) ) * 100}}%</small>
                            </td>
                            <!-- <td>
                                <strong><a href="{{ action('ContactListController@editContacts', $contact->id) }}">Edit</a></strong><br>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($contacts)==0)
                <div class="alert alert-success">
                    <center>
                        <strong>No Contacts Found!</strong>
                    </center>
                </div>
                @endif
            </div>
            <ul class="pagination pagination-primary mt-4">
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <!-- <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li> -->
            </ul>
        </div>
    </div>
</div>
@stop