<!-- Form input -->

<div class="form-group">
{!! Form::label('alias', 'Алиас(url):') !!}
{!! Form::text('alias', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
{!! Form::label('title', 'Имя:') !!}
{!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>
<!-- Form input -->

<div class="form-group">
{!! Form::label('text', 'Текст:') !!}
{!! Form::textarea('text', null, ['class'=> 'form-control']) !!}
</div>
<!-- Form input -->

<div class="form-group">
{!! Form::label('seo_title', 'Seo title:') !!}
{!! Form::text('seo_title', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
{!! Form::label('seo_description', 'Seo описание:') !!}
{!! Form::text('seo_description', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
{!! Form::label('order', 'Порядок сортировки:') !!}
{!! Form::text('order', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
{!! Form::label('is_active', 'Отображение на сайте:') !!}
{!! Form::select('is_active', array('1' => 'активна', '0'=> 'не активна'), null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input-->

<div class="form-group">
    {!! Form::submit('Сохранить', ['class'=> 'btn btn-primary form-control']) !!}
</div>


