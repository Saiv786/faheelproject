@extends('layout.master')
@section('title', 'Templates')
@section('content')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />



@stop
<div class="row clearfix">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<a data-toggle="modal" data-target="#myModal" type="button" class="btn bg-info-800 btn-success">
			<i class="icon icon-plus2"></i> {{ trans('messages.create') }}
		</a>
		<div class="card project_list">
			<div class="table-responsive">
				<table class="table table-hover c_table theme-color">
					<thead>
						<th>Name</th>
						<th>Status</th>
						<th>Actions</th>
					</thead>
					<tbody>
						@foreach($templates as $template)
						<tr>
							<td>
								<a class="single-user-name" target="_blank" href="{{ action('TemplateController@preview',['uid'=>$template->uid]) }}" onclick="popupwindow('https://demo.acellemail.com/templates/5e140f1424fc2/preview', 'Sample Template Acitve', 800, 800)">{{$template->name}}</a><br>
								<!-- <a class="single-user-name" href="javascript:void(0);"></a><br> -->
							</td>

							<td><span class="badge badge-info">In Use</span></td>
							<td>
								<form action="{{ url('/templates', ['id' => $template->id]) }}" method="post">
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
				@if(count($templates)==0)
				<div class="alert alert-success">
					<center>
						<strong>No Templates Found!</strong>
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create Template</h4>
			</div>
			<form class="form-horizontal" action="{{ action('TemplateController@buildSelect',5)}}" method="GET">
				<div class="modal-body">
					<p>Select Contact List for Template</p>
					<select class="form-control show-tick" id="contact_list_id" name="contact_list_id">
						<!-- <option value="">-- Please select --</option> -->
						@foreach(\App\ContactList::where('customer_id',\Auth::user()->id)->get() as $list)
						<option value="{{$list->id}}">{{$list->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="modal-footer">
					<!-- <a  type="submit" class="btn bg-info-800 btn-success">
				<i class="icon icon-plus2"></i> {{ trans('messages.next') }}
			</a> -->
					<button type="submit" class="btn btn-default btn-primary">Next</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>