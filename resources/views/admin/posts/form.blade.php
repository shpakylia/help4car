<!-- Form input title-->

<div class="form-group">
{!! Form::label('title', 'Имя:') !!}
{!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input text-->

<div class="form-group">
{!! Form::label('text', 'Текст:') !!}
{!! Form::textarea('text', null, ['class'=> 'form-control']) !!}
</div>
<!-- Form select is_active-->

<div class="form-group">
{!! Form::label('is_active', 'Отображение на сайте:') !!}
{!! Form::select('is_active', array('1' => 'активна', '0'=> 'не активна'), null, ['class'=> 'form-control']) !!}
</div>

<!-- Form select page_id-->

<div class="form-group">
    {!! Form::label('page_id', 'Страница:') !!}
    {!! Form::select('page_id', $pages, null, ['class'=> 'form-control']) !!}
</div>

<!-- Form submit-->

<div class="form-group">
    {!! Form::submit('Сохранить', ['class'=> 'btn btn-primary form-control']) !!}
</div>


