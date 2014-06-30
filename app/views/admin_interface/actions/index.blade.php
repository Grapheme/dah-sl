@extends('admin_interface.cpanel')
@section('content')

<h1>Все акции</h1>

<p>{{ link_to_route('control-panel.actions.create', 'Добавить новую акцию') }}</p>

@if ($actions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th width="60">&equiv;</th>
				<th>Название</th>
				<!--<th>Описание</th>-->
				<th>Ссылка</th>
				<th width="60">Картинки</th>
				<th width="60">&nbsp;</th>
				<th width="60">&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($actions as $action)
				<tr>
					<td>{{{ $action->order }}}</td>
					<td>{{{ $action->name }}}</td>
					<!--<td>{{{ $action->short }}}</td>-->
					<!--<td>{{{ $action->image }}}</td>-->
					<td>{{{ $action->link }}}</td>
	                <td>
    					<a class="btn btn-default" href="{{ URL::route('control-panel.images.index',array('actions',$action->id)) }}"><span class="glyphicon glyphicon-picture"></span></a>
                    </td>
                    <td>
                        <!--{{ link_to_route('control-panel.actions.edit', 'Edit', array($action->id), array('class' => 'btn btn-info')) }}-->
    					<a class="btn btn-default" href="{{ URL::route('control-panel.actions.edit',array($action->id)) }}"><span class="glyphicon glyphicon-edit"></span></a>

                    </td>
                    <td>
                        <!--
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('control-panel.actions.destroy', $action->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        -->
        				{{ Form::open(array('method'=>'DELETE','route'=>array('control-panel.actions.destroy',$action->id)))}}
        					<button type="submit" class="btn btn-danger delete-action"><span class="glyphicon glyphicon-trash"></span></button>
        				{{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no actions
@endif

@stop
