@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.news.create','Добавить новость',NULL,array("class"=>'btn btn-default')) }}
<h3> Новости </h3>
@if ($news->count())
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="105px"></th>
			<th></th>
			<th>Название</th>
            <th>Порядок</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
	@foreach($news as $new)
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.news.edit',array($new->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('news',$new->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
            </td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.news.destroy',$new->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td><a href="{{ URL::route('show-news',$new->id.'-'.BaseController::stringTranslite($new->title,100)) }}" target="_blank">{{ $new->title }}</a></td>
            <td>{{ $new->sort }}</td>
            <td>{{ myDateTime::SwapDotDateWithTime($new->date_publication) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Новости отсутсвуют</span>
@endif
@stop