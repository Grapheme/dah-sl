@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.news.create','Добавить новость',NULL,array("class"=>'btn btn-default')) }}
<h3> Новости </h3>
@if ($news->count())
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
	@foreach($news as $new)
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.news.edit',array($new->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
			</td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.news.destroy',$new->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td>{{ $new->sort }}</td>
			<td>{{ $new->title }}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($new->date_publication) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Новости отсутсвуют</span>
@endif
@stop