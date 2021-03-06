@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.rooms.index','&larr;  Вернуться к списку',NULL,array("class"=>'btn btn-default')) }}
<h3>Просмотр номера</h3>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Название номер</th>
			<th>Цена номера</th>
			<th>Порядок</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.rooms.edit',array($room->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
			<a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('rooms',$room->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
			</td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.rooms.destroy',$room->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td>{{{ $room->title }}}</td>
			<td>{{{ $room->price }}}</td>
			<td>{{ $room->sort }}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($room->created_at) }}</td>
		</tr>
	</tbody>
</table>
@stop