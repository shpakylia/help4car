@extends('layouts.admin')

@section('content')
    {!! Form::model($page, ['method' => "PATCH", 'url' => 'admin/pages/'.$page->id]) !!}
    @include('admin.pages.form')
    {!! Form::close() !!}
    @include ('errors.list')
@endsection
