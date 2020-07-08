@extends('layout.master')
@section('title', 'Customers')
@section('content')

<div class="row clearfix">
    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="{{ action('ContactListController@create') }}" type="button" class="btn bg-info-800 btn-success">
            <i class="icon icon-plus2"></i> {{ trans('messages.create') }}
        </a> -->
        <div class="card project_list">
            <div class="table-responsive">
                <table class="table table-hover c_table theme-color">
                    <thead>
                        <tr>
                            <th class="hidden-md-down">Name</th>
                            <th class="hidden-md-down">E-Mail</th>
                            <th class="hidden-md-down">Role</th>
                            <th class="hidden-md-down" width="150px">Contact No</th>
                            <th class="hidden-md-down" width="150px">Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\User::all() as $list)
                        <tr>
                            <td>
                                <a class="single-user-name" href="{{ action('ContactListController@show',['id'=>$list['id']]) }}">{{$list->name}}</a><br>
                            </td>
                            <td>
                                <strong>{{$list->email}}</strong><br>
                            </td>
                            <td class="hidden-md-down">

                                <strong>{{$list->role->name}}</strong><br>

                            </td>
                            <td class="hidden-md-down">
                                <strong>{{$list->contact_no}}</strong><br>
                            </td>
                            <td class="hidden-md-down">
                                <strong>{{$list->address}}</strong><br>
                            </td>
                            <td>
                                <form action="{{ url('/customers', ['id' => $list['id']]) }}" method="post">
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i style="font-size: 30px;padding-top: 4px;" class=" zmdi zmdi-delete"></i>
                                    </button>
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count(\App\User::all())==0)
                <div class="alert alert-success">
                    <center>
                        <strong>No Customer Found!</strong>
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