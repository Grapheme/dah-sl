@extends('admin_interface.cpanel')
@section('content')
{{ HTML::link('control-panel/bills','Вернуться назад',array("class"=>'btn btn-default')) }}
    <h3> Статистика счетов за {{ Request::segment(5) }} год </h3>
    <div id="billschart" style="width:848px;height: 300px;" class="chart"></div>
    <?php
        $months = array('','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
    ?>
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Месяц</th>
    			<th>Количество (опл.)</th>
    			<th>Сумма (опл.)</th>
    			<th></th>
    			<th>Количество (не опл.)</th>
    			<th>Сумма (не опл.)</th>
    		</tr>
    	</thead>
    	<tbody>
    	@foreach($months as $index => $month)
    		<tr>
    			<td> {{ $month }} </td>
    			<td> {{ isset($paidBills[$index]) ? $paidBills[$index]['cnt'] .' шт.' : '' }} </td>
    			<td> {{ isset($paidBills[$index]) ? $paidBills[$index]['price'] .' руб.' : '' }}  </td>
    			<td></td>
    			<td> {{ isset($unpaidBills[$index]) ? $unpaidBills[$index]['cnt'] .' шт.' : '' }} </td>
    			<td> {{ isset($unpaidBills[$index]) ? $unpaidBills[$index]['price'] .' руб.' : '' }} </td>
    		</tr>
    	@endforeach
    	</tbody>
    </table>
@stop
@section('scripts')

{{ HTML::script('js/flot/jquery.flot.cust.js') }}
{{ HTML::script('js/flot/jquery.flot.categories.js') }}
{{ HTML::script('js/flot/jquery.flot.tooltip.js') }}

<script type="text/javascript">

    var $chrt_border_color  = "#efefef";
    var $color_paid        = "#ff0000";
    var $color_unpaid       = "#ff00ff";

    var $month = ['','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
    var unpaid = []
    var paid = [];
    @foreach($months as $index => $month)
        @if(isset($paidBills[$index]))
            paid.push([ {{ $index }} , {{ $paidBills[$index]['cnt'] }} ])
        @else
            paid.push([ {{ $index }}, 0])
        @endif
        @if(isset($unpaidBills[$index]))
            unpaid.push([ {{ $index }} , {{ $unpaidBills[$index]['cnt'] }} ])
        @else
            unpaid.push([ {{ $index }}, 0])
        @endif
    @endforeach

    var options = {
        xaxis : {
           mode: "categories",
           tickLength: 0
        },
        series : {
            lines : {
                show : true,
                lineWidth : 1,
                fill : true,
                fillColor : {
                    colors : [{opacity : 0.1}, {opacity : 0.15}]
                }
            },
           points: { show: true },
           shadowSize : 0
        },
        selection : {
            mode : "x"
        },
        grid : {
            hoverable : true,
            clickable : true,
            tickColor : $chrt_border_color,
            borderWidth : 0,
            borderColor : $chrt_border_color,
        },
        tooltip : true,
        tooltipOpts : {
            content : "%x-й месяц - %y",
        },
        colors : [$color_paid,$color_unpaid],
    };

    var plot = $.plot($("#billschart"),[{data : unpaid,label : "Неоплаченные счета"},{data : paid,label : "Оплаченные счета"}] , options);
</script>
@stop