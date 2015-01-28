@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.news.index','&larr;  Вернуться к списку',NULL,array("class"=>'btn btn-default')) }}
<h3>Просмотр новости</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>№ п.п</th>
			<th>Название</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			<a class="btn btn-default" href="{{ URL::route('control-panel.news.edit',array($news->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.news.destroy',$news->id)))}}
			<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
		</td>
		<td>{{ $news->sort }}</td>
		<td>{{ $news->title }}</td>
		<td>{{ myDateTime::SwapDotDateWithTime($news->date_publication) }}</td>
	</tr>
	</tbody>
</table>
@stop