<!-- Form input -->
<div class="panel panel-default">
    <div class="panel-heading">
        Клиент:
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::hidden('visitor_id', null) !!}
        </div>
        <!-- Form input -->

        <div class="form-group">
            {!! Form::label('visitor[name]', 'Имя клиента:') !!}
            {!! Form::text('visitor[name]', null, ['class'=> 'form-control']) !!}
        </div>

        <!-- Form input -->

        <div class="form-group">
            {!! Form::label('visitor[phone]', 'Телефон:') !!}
            {!! Form::text('visitor[phone]', null, ['class'=> 'form-control']) !!}
        </div>
        <!-- Form input -->

        <div class="form-group">
            {!! Form::label('visitor[email]', 'Email:') !!}
            {!! Form::input('email','visitor[email]', null, ['class'=> 'form-control']) !!}
        </div>

        <!-- Form input -->
        <div class="form-group">
            {!! Form::label('visitor[gender]', 'Пол:') !!}
            {!! Form::select('visitor[gender]', array('man'=> 'мужчина', 'woman'=> 'женщина' ), null, ['class'=> 'form-control']) !!}
        </div>

        <!-- Form input -->

        <div class="form-group">
            {!! Form::label('visitor[notice]', 'Доп. инфо об клиенте:') !!}
            {!! Form::textarea('visitor[notice]', null, ['class'=> 'form-control']) !!}
        </div>
        <!-- Form input -->
        <div class="form-group">
            {!! Form::label('brand_id', 'Брэнд авто:') !!}
            {!! Form::select('brand_id', $brands, null, ['class'=> 'form-control']) !!}
        </div>
        <!-- Form input -->
        <div class="form-group">
            {!! Form::label('visitor[modal_id]', 'Модель авто:') !!}
            {!! Form::select('visitor[modal_id]', $modals, null, ['class'=> 'form-control modal_id']) !!}
        </div>
    </div>
</div>
