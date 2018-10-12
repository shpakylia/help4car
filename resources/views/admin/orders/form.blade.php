<!-- Form input notice-->

<div class="form-group">
    {!! Form::label('notice', 'Примечания(поломка, ньюансы, замечания):') !!}
    {!! Form::textarea('notice', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input  parts_price-->

<div class="form-group">
    {!! Form::label('parts_price', 'Стоимость запчастей:') !!}
    {!! Form::number('parts_price', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input full_price-->

<div class="form-group">
    {!! Form::label('full_price', 'Общая стоимость(работа + запчасти):') !!}
    {!! Form::number('full_price', null, ['class'=> 'form-control']) !!}
</div>

<!-- Form SELECT status -->

<div class="form-group">
    {!! Form::label('status', 'Статус:') !!}
    {!! Form::select('status', array(
    'reserve'=> 'Забронировано',
    'open'=> 'В работе',
    'close'=> 'Выполнено',
    'cancel'=> 'Отменено',
    ), null, ['class'=> 'form-control']) !!}
</div>

<!-- Form input date-->

<div class="form-group">
    {!! Form::label('date', 'Дата:') !!}
    {!! Form::text('date', null, ['class'=> 'form-control']) !!}
</div>


    <!-- Form select service_list-->
<div class="form-group">
    {!! Form::label('service_list[]', 'Вид работы:') !!}
    {!! Form::select('service_list[]', $allServices, null, ['class'=> 'form-control', 'multiple']) !!}
</div>
@include('partial.adminVisitorForm')


<!-- Form submit-->

<div class="form-group">
    {!! Form::submit('Сохранить', ['class'=> 'btn btn-primary form-control']) !!}
</div>


