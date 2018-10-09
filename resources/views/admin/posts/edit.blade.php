@extends('layouts.admin')

@section('content')
    {!! Form::model($post, ['method' => "PATCH", 'url' => 'admin/posts/'.$post->id]) !!}
    @include('admin.posts.form')
    {!! Form::close() !!}
    @include ('errors.list')
@endsection
