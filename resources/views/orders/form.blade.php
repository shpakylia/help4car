<!-- Form input name -->

<div class="form-group">
    {!! Html::decode( Form::label('name', 'Ваше имя<span class="text-danger">*</span>:')) !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Html::decode(Form::label('phone', 'Ваш телефон<span class="text-danger">*</span>:')) !!}
    {!! Form::text('phone', null, ['class'=> 'form-control', 'placeholder'=> '0636666666']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Form::label('email', 'Ваш email:') !!}
    {!! Form::input('email', 'email', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input -->

<div class="form-group">
    {!! Html::decode(Form::label('notice', 'Дополнительная иформация(опишите авто и проблему)<span class="text-danger">*</span>:')) !!}
    {!! Form::textarea('notice', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input-->

{!! Form::submit('Записаться', ['class'=> 'btn btn-primary btn-block btn-lg']) !!}
