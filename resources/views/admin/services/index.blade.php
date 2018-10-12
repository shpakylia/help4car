@extends('layouts.admin')

@section('content')
    <div class="col-xs-12">
        <a class="btn btn-primary" href="{{ url('admin/services/create') }}">  <i class="fa fa-btn fa-plus"></i>Добавить Услугу</a>
    </div>
    <div class="col-xs-12">
        <!-- Services tree -->
        @if (isset($services) && count($services) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Услуги
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Имя</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td class="table-text"><a href="{{ url('admin/services/'.$service->id.'/edit') }}">{{ $service->title }}</a></td>

                                <!-- Service Delete Button -->
                                <td>
                                    {!! Form::open(['url'=> 'admin/services/' . $service->id, 'method'=>'DELETE']) !!}

                                        <button type="submit" onclick="if(!confirm('Тoчно удалить?')) return false;" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            <!-- display child service -->
                            @if($service->serviceCategory->count() > 0)
                                @include('partial.adminServicesTreeChild',['childServices' => $service->serviceCategory])

                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
