@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.pages.index','&larr;  Вернуться к списку',NULL,array("class"=>'btn btn-default')) }}
<h3>Просмотр страницы</h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Title страницы</th>
			<th>URL страницы</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.pages.edit',array($page->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
				<a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('pages',$page->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
			</td>
			<td>
			@if(!$page->readonly)
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.pages.destroy',$page->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-edit"></span></button>
			{{ Form::close() }}
			@else
				<a class="btn btn-danger" href="#" disabled><span class="glyphicon glyphicon-edit"></span></a>
			@endif
			</td>
			<td>{{{ $page->page_title }}}</td>
			<td>{{{ $page->page_url }}}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($page->created_at) }}</td>
		</tr>
	</tbody>
</table>
@stop
