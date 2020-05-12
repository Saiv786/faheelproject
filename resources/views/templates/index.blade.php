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
					</thead>
					<tbody>
						@foreach($templates as $template)
						<tr>
							<td>
								<a class="single-user-name" href="javascript:void(0);">{{$template->name}}</a><br>
								<!-- <small>Project Lead</small> -->
							</td>

							<td><span class="badge badge-info">In Use</span></td>
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