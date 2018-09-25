<!-- Form input -->
<div class="form-group">
    {!! Form::label('title', 'Название услуги:') !!}
    {!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Form::label('parent_id', 'Родительская категория:') !!}
    {!! Form::select('parent_id',$parentsSelect , null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Form::label('start_price', 'Минимальная стоимость:') !!}
    {!! Form::number('start_price', null, ['class'=> 'form-control']) !!}
</div>
<!-- Form input -->

<div class="form-group">
    {!! Form::label('end_price', 'Максимальная стоимость:') !!}
    {!! Form::number('end_price', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Form::label('notice', 'Дополнительная информация:') !!}
    {!! Form::textarea('notice', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('img', 'Картинка:') !!}
    {!! Form::file('img') !!}
</div>

<!-- Form input-->

<div class="form-group">
    {!! Form::submit($submitText, ['class'=> 'btn btn-primary form-control']) !!}
</div>