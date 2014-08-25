@extends('admin_interface.cpanel')
@section('content')
{{ HTML::link('control-panel/bills','Вернуться назад',array("class"=>'btn btn-default')) }}
    <h3> Статистика заказов за {{ Request::segment(5) }} год </h3>
    <div id="billschart" style="width:848px;height: 300px;" class="chart"></div>
    <?php
        $months = array('','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
    ?>
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Месяц</th>
    			<th>Количество (Заказ номера)</th>
    			<th></th>
    			<th>Количество (Заказ услуги)</th>
    		</tr>
    	</thead>
    	<tbody>
    	@foreach($months as $index => $month)
    		<tr>
    			<td> {{ $month }} </td>
    			<td> {{ isset($roomsBooking[$index]) ? $roomsBooking[$index]['cnt'] .' шт.' : '' }} </td>
    			<td></td>
    			<td> {{ isset($servicesBooking[$index]) ? $servicesBooking[$index]['cnt'] .' шт.' : '' }} </td>
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
    var rooms = []
    var services = [];
    @foreach($months as $index => $month)
        @if(isset($roomsBooking[$index]))
            rooms.push([ {{ $index }} , {{ $roomsBooking[$index]['cnt'] }} ])
        @else
            rooms.push([ {{ $index }}, 0])
        @endif
        @if(isset($servicesBooking[$index]))
            services.push([ {{ $index }} , {{ $servicesBooking[$index]['cnt'] }} ])
         @else
            services.push([ {{ $index }}, 0])
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
            content : "%x-й месяц - %y заказов",
        },
        colors : [$color_paid,$color_unpaid],
    };

    var plot = $.plot($("#billschart"),[{data : rooms,label : "Заказ номеров"},{data : services,label : "Заказ услуг"}] , options);
</script>
@stop