@extends('layouts.admin')
@section('content')
    {!! Form::model($order, ['method' => "PATCH", 'url' => 'admin/orders/'.$order->id]) !!}
    @include('admin.orders.form')
    {!! Form::close() !!}
    @include ('errors.list')

@endsection
