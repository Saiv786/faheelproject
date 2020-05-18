@extends('layout.master')
@section('title', 'Contact Lists')
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="{{ action('ContactListController@create') }}" type="button" class="btn bg-info-800 btn-success">
            <i class="icon icon-plus2"></i> {{ trans('messages.create') }}
        </a>
        <div class="card project_list">
            <div class="table-responsive">
                <table class="table table-hover c_table theme-color">
                    <thead>
                        <tr>
                            <th style="width:50px;">Name</th>
                            <th>Description</th>
                            <th class="hidden-md-down">Subscribers</th>
                            <th class="hidden-md-down" width="150px">Open Rate</th>
                            <th class="hidden-md-down" width="150px">Click Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>
                                <a class="single-user-name" href="{{ action('ContactListController@show',['id'=>$list->id]) }}">{{$list->name}}</a><br>
                            </td>
                            <td>
                                <strong>{{$list->description}}</strong><br>
                            </td>
                            <td class="hidden-md-down">
                                <a class="single-user-name" href="{{ action('ContactListController@showContacts',['id'=>$list->id]) }}">{{$list->count}}</a><br>

                            </td>
                            <td class="hidden-md-down">
                                <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                                <small>Rate: 50%</small>
                            </td>
                            <td class="hidden-md-down">
                                <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                                <small>Rate: 80%</small>
                            </td>
                            <td>
                                <a href="{{ action('ContactListController@edit',['id'=>$list->id]) }}" data-popup="tooltip" title="" type="button" class="btn btn-icon" data-original-title="New subscriber">
                                    <i style="font-size: 30px;padding-top: 4px;" class=" zmdi zmdi-accounts-add"></i>
                                </a>
                                <form action="{{ url('/contacts', ['id' => $list->id]) }}" method="post">
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i style="font-size: 30px;padding-top: 4px;" class=" zmdi zmdi-delete"></i>
                                    </button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>

                                <!-- <a href="{{ action('ContactListController@destroy',['id'=>$list->id]) }}" data-popup="tooltip" title="" type="button" class="btn btn-danger btn-icon" data-original-title="New subscriber">
                                    <i style="font-size: 30px;padding-top: 4px;" class=" zmdi zmdi-delete"></i>
                                </a> -->
                            </td>
                            <!-- <td><span class="badge badge-info">Medium</span></td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($lists)==0)
                <div class="alert alert-success">
                    <center>
                        <strong>No Contact Lists Found!</strong>
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