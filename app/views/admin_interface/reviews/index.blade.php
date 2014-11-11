@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.reviews.create','Добавить новый отзыв',NULL,array("class"=>'btn btn-default')) }}
<h3> Отзывы </h3>
@if ($reviews->count())
<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Автор</th>
			<th>Рейтинг</th>
			<th>Порядок</th>
			<th>Дата создания</th>
		</tr>
	</thead>
	<tbody>
	@foreach($reviews as $review)
		<tr{{($review->valid == 0)?' class="danger"':''}}>
			<td>
				<a class="btn btn-default" href="{{ URL::route('control-panel.reviews.edit',array($review->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>
			</td>
			<td>
			{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.reviews.destroy',$review->id)))}}
				<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
			{{ Form::close() }}
			</td>
			<td>
				{{ HTML::image($review->icon)}}
				{{{ $review->author }}}
			</td>
			<td>{{{ $review->raiting }}}</td>
			<td>{{ $review->sort }}</td>
			<td>{{ myDateTime::SwapDotDateWithTime($review->created_at) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Отзывы отсутсвуют</span>
@endif
@stop