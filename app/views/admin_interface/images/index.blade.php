@extends('admin_interface.cpanel')
@section('content')
<a class="btn btn-default" href="{{ url('control-panel/'.Request::segment(3)) }}">&larr; Вернуться к списку</a>
<? #echo "<pre>" . print_r($item, 1) . "</pre>"; ?>
{{ link_to_route('control-panel.images.create','Добавить изображение',array(Request::segment(3),$item->id),array("class"=>'btn btn-default')) }}
<h3> Изображения для "{{$item->title}}"</h3>
@if ($images->count())
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="col-md-1"></th>
			<th class="col-md-1"></th>
			<th>Изображение</th>
			<th>Порядок</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($images as $image)
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.images.edit',array($image->id,Request::segment(3),$item->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
			</td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.images.destroy',$image->id,Request::segment(3),$item->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td>{{HTML::image($image->image['thumbnail'])}}</td>
			<td>{{{ $image->sort }}}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($image->created_at) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Изображения отсутствуют</span>
@endif
@stop
