@extends('layouts.admin')

@section('content')
    <a href="{{url('admin/orders/create')}}" class="btn btn-primary">Добавить заказ</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>дата</th>
                <th>информация</th>
                <th></th>
            </tr>
        </thead>
        <tbody>


        @foreach($orders as $order)
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    {{$order->date}}
                </td>
                <td>
                    {{$order->notice}}
                </td>
                <td>
                    <a href="{{url('admin/orders/'.$order->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
