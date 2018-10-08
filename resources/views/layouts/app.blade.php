<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.site_name') }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    @yield('inside_css')
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div class="container-fluid">
    <a href="/">
        <div class="brand col-sm-2">
               <img  class="brand_img" src="{{asset('img/help4car_logo.svg')}}" alt="brand">
        </div>
    </a>
    <div class="location col-sm-offset-1 col-sm-2">
        <p>Где мы:</p>
        <div>
            <p>г.&nbsp;Киев,</p>
            <p>м.&nbsp;Академгородок,</p>
            <p>ул. В.Степанченко&nbsp;4-Б,</p>
        </div>
    </div>

    <div class="work col-sm-2">
        <p>График работы:</p>
        <div>
            <p><span>с 09:00 до 18:00</span></p>
            <p><span>Сб:</span> с 09.00 до 16.00,</p>
            <p><span>Вс:</span> выходной</p>
        </div>
    </div>

    <div class="contacts col-sm-3">
        <p>Контакты:</p>
        <div>
            <p><span>(044)&nbsp;221-65-54</span><span>(098)&nbsp;956-05-07</span></p>
            <p><span>(094)&nbsp;821-65-54</span><span>(063)&nbsp;610-13-95</span></p>
        </div>
    </div>

</div>
<nav class="navbar navbar-default navbar-static-top first-nav">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                $active_main = Request::url() == '/' ? 'active' : '';
                $active_services = Request::url() == '/services/' ? 'active' : '';
                $active_prices = Request::url() == '/prices/' ? 'active' : '';
                $active_contacts = Request::url() == '/contacts/' ? 'active' : '';
                $active_register = Request::url() == '/register/' ? 'active' : '';
                ?>
                <li {{$active_main}}><a href="{{url('/')}}">Главная</a></li>
                <li {{$active_services}}><a href="{{url('/services/')}}">Услуги</a></li>
                <li {{$active_prices}}><a href="{{url('/prices/')}}">Цены</a></li>
                <li {{$active_contacts}}><a href="{{url('/contacts')}}">Контакты</a></li>
                <li {{$active_register}}><a href="{{url('/orders')}}">Запись на СТО</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>

</html>
