@extends('layouts.admin')

@section('content')
    <div class="container">
        {!! Form::open(['url'=> 'admin/services', 'enctype'=>'multipart/form-data']) !!}
        @include ('admin.services.form',['submitText' => 'Создать'])

        {!! Form::close() !!}

        @include ('errors.list')
    </div>
@endsection
