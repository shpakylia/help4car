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
        <div class="header">
            <div class="header-col brand col-sm-4 col-lg-3">
                <a href="/">
                   <img  class="brand_img" src="{{asset('img/help4car_logo.svg')}}" alt="brand">
                </a>
            </div>

            {{--</a>--}}
            {{--<div class="location col-sm-offset-1 col-sm-2">--}}
                {{--<div>--}}
                    {{--<p>г.&nbsp;Киев,</p>--}}
                    {{--<p>м.&nbsp;Академгородок,</p>--}}
                    {{--<p>ул. В.Степанченкa&nbsp;4-Б,</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="work col-sm-2">--}}
                {{--<p>График работы:</p>--}}
                {{--<div>--}}
                    {{--<p><span>с 09:00 до 18:00</span></p>--}}
                    {{--<p><span>Сб:</span> с 09.00 до 16.00,</p>--}}
                    {{--<p><span>Вс:</span> выходной</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="header-col contacts col-sm-6 col-lg-3">
                <div>
                    <p>
                        <span>{{config('app.phones.0')}}</span>
                        <span>{{config('app.phones.2')}}</span>
                    </p>
                    <p>
                        <span>{{config('app.phones.1')}}</span>
                        <span>{{config('app.phones.3')}}</span>
                    </p>
                </div>
            </div>
            <div class="header-col col-sm-1">
                <a href="#" class="btn btn-primary">Перезвонить?</a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default navbar-static-top first-nav">
        <div class="container">
            <div id="navbar" class="collapse navbar-collapse">
                <div class="col-md-10 col-md-offset-1">
                    <ul class="nav navbar-nav">
                    @foreach(config('app.pages') as $pageUrl=>$pageTitle)
                        <li {{($pageUrl== Request::path() ? 'class = "active"' : '')}}><a href="{{url($pageUrl)}}">{{$pageTitle}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
