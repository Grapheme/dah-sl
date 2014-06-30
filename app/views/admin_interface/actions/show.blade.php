@extends('layouts.scaffold')

@section('main')

<h1>Show Action</h1>

<p>{{ link_to_route('control-panel.actions.index', 'Return to all actions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Order</th>
				<th>Short</th>
				<th>Image</th>
				<th>Link</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $action->name }}}</td>
					<td>{{{ $action->order }}}</td>
					<td>{{{ $action->short }}}</td>
					<td>{{{ $action->image }}}</td>
					<td>{{{ $action->link }}}</td>
                    <td>{{ link_to_route('control-panel.actions.edit', 'Edit', array($action->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('control-panel.actions.destroy', $action->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
