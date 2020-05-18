@extends('layout.master')
@section('title', 'Templates')
@section('content')
<div class="row clearfix">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<a href="{{ action('TemplateController@buildSelect') }}" type="button" class="btn bg-info-800 btn-success">
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