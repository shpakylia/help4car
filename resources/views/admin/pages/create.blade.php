@extends('layouts.admin')

@section('content')
    {!! Form::open(['method' => "POST", 'url' => 'admin/pages']) !!}
    @include('admin.pages.form')
    {!! Form::close() !!}
    @include ('errors.list')
@endsection
