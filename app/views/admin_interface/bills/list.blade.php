@extends('admin_interface.cpanel')
@section('content')
{{ link_to_route('control-panel.bills.create','Создать новый счет',NULL,array("class"=>'btn btn-default')) }}
{{ link_to_route('control-panel.statistic','Статистика',date("Y"),array("class"=>'btn btn-info')) }}
@if($unpaidBills->count())
<h3> Неоплаченные счета </h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-md-2"></th>
			<th>Номер</th>
			<th>Плательщик</th>
			<th>Услуга</th>
			<th>Сумма</th>
			<th>Создан</th>
		</tr>
	</thead>
	<tbody>
	@foreach($unpaidBills as $bill)
		<tr>
			<td>
				<a class="btn btn-default" href="{{ URL::action('BillsController@edit',$bill->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
				<a class="btn btn-danger delete-action" href="{{ URL::action('BillsController@delete',$bill->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
			<td> {{ $bill->id }} </td>
			<td> {{ $bill->payer }} </td>
			<td> {{ $bill->service }} </td>
			<td> {{ priceFormatter::Format( $bill->price ) }} </td>
			<td> {{ myDateTime::SwapDotDateWithTime($bill['created_at']) }} </td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Неоплаченные счета отсутсвуют</span>
@endif
<h3> Оплаченные счета </h3>
@if($paidBills->count())
<table class="table table-striped">
	<thead>
		<tr>
			<th>Номер</th>
			<th>Плательщик</th>
			<th>Услуга</th>
			<th>Сумма</th>
			<th>Оплачен</th>
		</tr>
	</thead>
	<tbody>
	@foreach($paidBills as $bill)
		<tr>
			<td> {{ $bill->id }} </td>
			<td> {{ $bill->payer }} </td>
			<td> {{ $bill->service }} </td>
			<td> {{ priceFormatter::Format( $bill->price ) }} </td>
			<td> {{ myDateTime::SwapDotDateWithTime($bill['paid_at']) }} </td>
		</tr>
	@endforeach
	</tbody>
</table>
@else
	<span class="label label-info">Оплаченные счета отсутсвуют</span>
@endif
@stop