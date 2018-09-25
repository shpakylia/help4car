@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Редактирование страницы {{ $page['title_ru'] }}
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action="{{ url('admin/page/'.$page->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{method_field('PATCH')}}

                    <div class="form-group">
                        <label for="alias" class="col-sm-3 control-label">Алиас(url)</label>

                        <div class="col-sm-6">
                            <input type="text" disabled name="alias" id="alias" class="form-control" value="{{ $page->alias }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title_ru" class="col-sm-3 control-label">Имя ru:</label>

                        <div class="col-sm-6">
                            <input type="text" name="title_ru" id="title_ru" class="form-control" value="{{ $page->title_ru }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title_uk" class="col-sm-3 control-label">Имя uk:</label>

                        <div class="col-sm-6">
                            <input type="text" name="title_uk" id="title_uk" class="form-control" value="{{ $page->title_uk }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text_ru" class="col-sm-3 control-label">Текст ru:</label>

                        <div class="col-sm-6">
                            <textarea name="text_ru" id="text_ru" class="form-control">{{ $page->text_ru }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text_uk" class="col-sm-3 control-label">Текст uk:</label>

                        <div class="col-sm-6">
                            <textarea name="text_uk" id="text_uk" class="form-control">{{ $page->text_uk }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seo_title_ru" class="col-sm-3 control-label">Seo title ru:</label>

                        <div class="col-sm-6">
                            <input type="text" name="seo_title_ru" id="seo_title_ru" class="form-control" value="{{$page->seo_title_ru }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seo_title_uk" class="col-sm-3 control-label">Seo title uk:</label>

                        <div class="col-sm-6">
                            <input type="text" name="seo_title_uk" id="seo_title_uk" class="form-control" value="{{ $page->seo_title_uk }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seo_description_ru" class="col-sm-3 control-label">Seo описание ru:</label>

                        <div class="col-sm-6">
                            <input type="text" name="seo_description_ru" id="seo_description_ru" class="form-control" value="{{ $page->seo_description_ru }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seo_description_uk" class="col-sm-3 control-label">Seo описание uk:</label>

                        <div class="col-sm-6">
                            <input type="text" name="seo_description_uk" id="seo_descriptione_uk" class="form-control" value="{{ $page->seo_descriptione_uk }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="order" class="col-sm-3 control-label">Порядок сортировки:</label>

                        <div class="col-sm-6">
                            <input type="number" name="order" id="order" class="form-control" value="{{ $page->order }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="order" class="col-sm-3 control-label">Отображение на сайте:</label>

                        <div class="col-sm-6">
                            <select name="is_active" id="is_active">
                                <option value="1" {{ $page->is_active == '1' ? "selected" : ''  }} >отображать</option>
                                <option value="0" {{ $page->is_active == '0' ? "selected" : ''  }}>скрыта</option>
                            </select>
                        </div>
                    </div>

                    <!-- edit Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </div>
                        <div class=" col-sm-4">
                            <a href="{{ url('admin/pages') }}" class="btn-danger btn"> Отмена </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
