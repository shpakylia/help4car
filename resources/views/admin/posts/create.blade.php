@extends('layouts.admin')

@section('content')
    {!! Form::open(['method' => "POST", 'url' => 'admin/posts']) !!}
    @include('admin.posts.form')
    {!! Form::close() !!}
    @include ('errors.list')
@endsection
