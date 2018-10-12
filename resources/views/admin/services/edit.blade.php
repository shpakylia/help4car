@extends('layouts.admin')

@section('content')
    {!! Form::model($service, ['method'=>'PATCH', 'action'=> ['Admin\AdminServiceController@update', $service->id], 'enctype'=>'multipart/form-data']) !!}
    @include ('admin.services.form', ['submitText' => 'Сохранить'])

    {!! Form::close() !!}


    <!-- add form to delete img -->
    @if($service->img)
        {!! Form::open(['method'=>'PATCH', 'action'=> ['Admin\AdminServiceController@destroyImg', $service->id] ]) !!}

        <!-- Form input hidden with id-->

        {!! Form::hidden('id', $service->id) !!}
        <img src="{{asset('img/categories/'.$service->img)}}" alt="">
        <!-- Form input-->

        <div class="form-group">
            {!! Form::submit('Удалить картинку', ['class'=> 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    @endif
    @include ('errors.list')

@endsection
