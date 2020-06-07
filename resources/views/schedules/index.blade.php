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
                            <th>Actions</th>
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
                                {{\Carbon\Carbon::parse($schedule['occur_every_start_time'])->format('F j, Y, g:i a')}}
                            </td>
                            <td class="hidden-md-down">
                                {{\Carbon\Carbon::parse($schedule['occur_every_end_time'])->format('F j, Y, g:i a')}}
                            </td>
                            <td><span class="badge {{$schedule['status_class']}}">{{$schedule['status']}}</span></td>
                            <td>
                                <form action="{{ url('/schedules', ['id' => $schedule->id]) }}" method="post">
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
                @if(count($schedules)==0)
                <div class="alert alert-success">
                    <center>
                        <strong>No Schedules Found!</strong>
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