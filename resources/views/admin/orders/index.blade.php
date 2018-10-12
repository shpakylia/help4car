@extends('layouts.admin')

@section('content')
    <a href="{{url('admin/orders/create')}}" class="btn btn-primary">Добавить заказ</a>
    <!-- block for full calendar script -->
    <div id="calendar"></div>

    <!-- fill calendar -->
    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                events: [
                        @foreach ($orders as $order)


                    {
                        id: '{{ $order->id }}',
                        title: '{{ isset($order->visitor->modal->name) ? $order->visitor->modal->name : '' }} | {{ isset($order->visitor->name) ? $order->visitor->name : '' }}',
                        start: '{{ $order->date }}',
                        backgroundColor: @if($order->status == 'reserve')
                                            '{{ $backgroundColor = 'blue'}}'
                                            @elseif($order->status == 'open')
                                            '{{ $backgroundColor = 'yellow'}}'
                                            @elseif($order->status == 'close')
                                            '{{ $backgroundColor = 'green'}}'
                                            @elseif($order->status == 'cancel')
                                            '{{ $backgroundColor = 'red' }}'
                                        @endif

                    },
                        @endforeach
                ],
                // event of edit order
                eventClick: function(calEvent, jsEvent, view) {
                    window.location.replace("{{url('admin/orders/')}}"+"/"+calEvent.id+"/edit");

                }
            });
        })

    </script>
@endsection

