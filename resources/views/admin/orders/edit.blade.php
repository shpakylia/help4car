@extends('layouts.admin')
{{--{{var_dump($services)}}--}}
@section('content')
    {!! Form::model($order, ['method' => "PATCH", 'url' => 'admin/orders/'.$order->id]) !!}
    @include('admin.orders.form')
    {!! Form::close() !!}
    @include ('errors.list')

@endsection
