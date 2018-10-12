@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- New Post link -->
        <div class="col-xs-12">
            <a class="btn btn-primary" href="{{ url('admin/posts/create') }}">  <i class="fa fa-btn fa-plus"></i>Добавить статью</a>
        </div>
        <div class="col-xs-12">
            <!-- Current Posts -->
            @if (isset($posts) && count($posts) > 0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Заголовок</th>
                            <th>Для страницы</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="table-text"><a href="{{ url('admin/posts/'.$post->id."/edit") }}">{{ $post->title }}</a></td>
                                    <td class="table-text">{{ $post->page->title }}</td>

                                    <!-- Post Delete Button -->
                                    <td>
                                        <form action="{{url('admin/posts/' . $post->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" onclick="if(!confirm('Тoчно удалить?')) return false;"  class="btn btn-danger">
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
