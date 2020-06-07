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
                            <th class="" style="width:50px;">Name</th>
                            <th class="" style="width:150px;">Description</th>
                            <th class="hidden-md-down">Next run At</th>
                            <th class="hidden-md-down" width="150px">From</th>
                            <th class="hidden-md-down" width="150px">To</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>
                                <a class="single-user-name" href="javascript:void(0);">{{$schedule['name']}}</a><br>
                                <!-- <small>Project Lead</small> -->
                            </td>
                            <td>
                                <small>
                                    <span>
                                       <wbr> {{$schedule['description']}} </wbr>
                                    </span>
                                </small><br>
                                <!-- <small>Cost: $215</small> -->
                            </td>
                            <td class="hidden-md-down">
                                {{$schedule['next_run_time']}}
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
                        @endforeach
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