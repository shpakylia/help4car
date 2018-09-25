@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- New Task link -->
        <div class="col-xs-12">
            <a class="btn btn-primary" href="{{ url('admin/page') }}">  <i class="fa fa-btn fa-plus"></i>Добавить страницу</a>
        </div>
        <div class="col-xs-12">
            <!-- Current Pages -->
            @if (isset($pages) && count($pages) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текщие страницы
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Имя</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td class="table-text"><a href="{{ url('admin/page/'.$page->id) }}">{{ $page->title_ru }}</a></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{url('admin/page/' . $page->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" onclick="if(!confirm('Тoчно удалить?')) return false;" id="is_delete delete-page-{{ $page->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
