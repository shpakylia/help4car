@extends('layouts.admin')

@section('content')
    <div class="container">
        {!! Form::model($service, ['method'=>'PATCH', 'action'=> ['Admin\AdminServiceController@update', $service->id], 'enctype'=>'multipart/form-data']) !!}
        @include ('admin.services.form', ['submitText' => 'Сохранить'])

        {!! Form::close() !!}

        @if($service->img)
            {!! Form::open(['method'=>'PATCH', 'action'=> ['Admin\AdminServiceController@updateImg', $service->id] ]) !!}

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

    </div>
@endsection
