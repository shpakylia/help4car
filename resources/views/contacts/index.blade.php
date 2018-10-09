@extends('layouts.app')
@section('content')
    <div class="row">
            <h1>Наши контакты:</h1>
            @foreach(config('app.phones') as $phone)
            <p class="center"> {{$phone}}</p>
            @endforeach
    </div>
    <div class="row">
            <h1>Наш адрес:</h1>
            <p class="center">г.&nbsp;Киев </p>
            <p class="center">м.&nbsp;Академгородок</p>
            <p class="center">ул.&nbsp;В.&nbsp;Степанченка(Служебная) 4-Б</p>

    </div>
    <div class="row">
        <h1>Автомастераска на карте г.Киев</h1>
        <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Help4Car&key=AIzaSyBcF_ua1xLLO98G4I_KPxrbiH3pqWfbTcM" allowfullscreen></iframe>
    </div>
@endsection