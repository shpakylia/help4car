@extends('layouts.app')

@section('inside_css')
    <link rel="stylesheet" href="{{asset('css/hoverEffect.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="grid">
            @foreach ($cats as $cat)
            <figure class="effect-ming">
                <img src="{{asset('img/categories/'. $cat->img)}}" alt = "{{$cat->title}}"/>
                <figcaption>
                    <h2>{{$cat->title}}</h2>
                    <p>{{$cat->notice}}</p>
                    <a href="{{$cat->alias}}">Подробнее ...</a>
                </figcaption>
            </figure>
            @endforeach

        </div>
    </div>
@endsection

