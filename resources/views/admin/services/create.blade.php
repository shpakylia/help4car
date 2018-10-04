@extends('layouts.admin')

@section('content')
    {!! Form::open(['url'=> 'admin/services', 'enctype'=>'multipart/form-data']) !!}
    @include ('admin.services.form',['submitText' => 'Создать'])

    {!! Form::close() !!}

    @include ('errors.list')
@endsection
