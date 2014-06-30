@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.room_properties.index','&larr;  Вернуться к списку',NULL,array("class"=>'btn btn-default')) }}
<h3>Просмотр оснащения</h3>
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th class="col-md-1"></th>
		<th class="col-md-1"></th>
		<th>Название</th>
		<th>Порядок</th>
		<th>Дата создания</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>
			<a class="btn btn-default" href="{{ URL::route('control-panel.room_properties.edit',array($room_property->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		<td>
		{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.room_properties.destroy',$room_property->id)))}}
			<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
		{{ Form::close() }}
		</td>
		<td>{{$room_property->title}}</td>
		<td>{{ $room_property->sort }}</td>
		<td>{{ myDateTime::SwapDotDateWithTime($room_property->created_at) }}</td>
	</tr>
</tbody>
</table>
@stop
