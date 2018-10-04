@extends('layouts.admin')

@section('content')
    {!! Form::open(['method' => "POST", 'url' => 'admin/orders']) !!}
    @include('admin.orders.form')
    {!! Form::close() !!}
    @include ('errors.list')

@endsection
