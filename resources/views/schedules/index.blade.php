@extends('layout.master')
@section('title', 'Schedules')
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="{{ route('schedules.create') }}" type="button" class="btn bg-info-800 btn-success">
            <i class="icon icon-plus2"></i> {{ trans('messages.create') }}
        </a>
        <div class="card project_list">
            <div class="table-responsive">
                <table class="table table-hover c_table theme-color">
                    <thead>
                        <tr>
                            <th style="width:50px;">Name</th>
                            <th>Description</th>
                            <th class="hidden-md-down">Last run At</th>
                            <th class="hidden-md-down" width="150px">From</th>
                            <th class="hidden-md-down" width="150px">To</th>
                            <th>Priority</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="single-user-name" href="javascript:void(0);">Schedule 1</a><br>
                                <!-- <small>Project Lead</small> -->
                            </td>
                            <td>
                                <strong>Everyday at 5 A.M</strong><br>
                                <!-- <small>Cost: $215</small> -->
                            </td>
                            <td class="hidden-md-down">
                                19-April-2020 05:00 A.M
                                <!-- <ul class="list-unstyled team-info margin-0">
                                    <li><img src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="Avatar"></li>
                                    <li><img src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="Avatar"></li>
                                    <li><img src="{{asset('assets/images/xs/avatar4.jpg')}}" alt="Avatar"></li>
                                    <li><img src="{{asset('assets/images/xs/avatar6.jpg')}}" alt="Avatar"></li>
                                </ul> -->
                            </td>
                            <td class="hidden-md-down">
                                05-April-2020 05:00 A.M

                                <!-- <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                                <small>Rate: 50%</small> -->
                            </td>
                            <td class="hidden-md-down">
                                30-April-2020 05:00 A.M

                                <!-- <div class="progress">
                                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                                <small>Rate: 80%</small> -->
                            </td>
                            <td><span class="badge badge-success">Running</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <ul class="pagination pagination-primary mt-4">
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <!-- <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li> -->
            </ul>
        </div>
    </div>
</div>
@stop