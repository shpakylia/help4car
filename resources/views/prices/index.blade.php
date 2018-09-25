@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    @php
                        $i = 1
                    @endphp
                    @foreach($services as $service)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                                   {{$service->title}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$i}}" class="panel-collapse collapse {{ ($i == 1) ? 'in': '' }}">
                            @if($service->serviceCategory->count() > 0)
                                <div class="panel-body">
                                @foreach($service->serviceCategory as $serviceChild)
                                        <div class="row" style="border-bottom: 1px solid #f5f5f5">
                                            <div class="col-xs-7 col-xs-offset-1">
                                                <p>{{$serviceChild->title}}</p>
                                            </div>
                                            <div class="col-xs-4">
                                                <p>
                                                    @if(!empty($serviceChild->start_price) && !empty($serviceChild->end_price))
                                                        {{$serviceChild->start_price . " грн. -  " .$serviceChild->end_price ." грн." }}
                                                    @elseif($serviceChild->start_price == 0)
                                                        бесплатно
                                                    @else
                                                        <span class = 'font_less'>от</span> {{$serviceChild->start_price}} грн.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                        @php
                            $i++
                        @endphp
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection