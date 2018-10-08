@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            @include('flash::message')
            @include('errors.list')
            {!! Form::open(['method'=> 'POST', 'url'=> '/orders']) !!}
            @include('orders.form')
            {!! Form::close() !!}
        </div>
    </div>

@endsection