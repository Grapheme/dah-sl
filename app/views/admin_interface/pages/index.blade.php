@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.pages.create','Добавить новую страницу',NULL,array("class"=>'btn btn-default')) }}
<h3> Страницы </h3>
@if($pages->count())
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
		@foreach ($pages as $page)
			<tr>
				<td>
					<a class="btn btn-default" href="{{ URL::route('control-panel.pages.edit',array($page->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('pages',$page->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
				</td>
				<td>
				@if(!$page->readonly)
				{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.pages.destroy',$page->id)))}}
					<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
				{{ Form::close() }}
				@else
					<a class="btn btn-danger" href="#" disabled><span class="glyphicon glyphicon-trash"></span></a>
				@endif
				</td>
				<td>{{{ $page->page_title }}}</td>
				<td>{{ HTML::link($page->page_url,$page->page_url, array('target' => '_blank')) }}</td>
				<td>{{ myDateTime::SwapDotDateWithTime($page->created_at) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Страницы отсутсвуют</span>
@endif
@stop