@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.sights.index','&larr;  Вернуться к списку',NULL,array("class"=>'btn btn-default')) }}
<h3> Просмотр достопримечательности </h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Название услуги</th>
			<th>Порядок</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.sights.edit',array($sight->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
				<a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('sights',$sight->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
			</td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.sights.destroy',$sight->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td>{{{ $sight->title }}}</td>
			<td>{{ $sight->sort }}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($sight->created_at) }}</td>
		</tr>
	</tbody>
</table>
@stop