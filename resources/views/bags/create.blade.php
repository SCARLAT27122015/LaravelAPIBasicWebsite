@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
          
          @if(Session::has('success'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['url' => 'bags/', 'method' => 'post', 'files' => true]) !!}
                <div class="form-group">
                  {{ Form::label('nombre', 'Nombre') }}
                  {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' =>'Ingresa el nombre del producto', 'id' => 'nombre']) }}
                </div>

                <div class="form-group">
                  {{ Form::label('descripcion', 'Descripción de la bolsa') }}
                  {!! Form::textarea('descripcion', null, ['id' => 'descripcion', 'rows' => 4, 'class' => 'form-control', 'placeholder' => 'Ingresa una descripción']) !!}
                </div>

                <div class="form-group">
                  {{ Form::label('precioCompra', 'Precio de compra') }}
                  {{ Form::number('precioCompra', 0, ['class' => 'form-control col-6', 'placeholder' =>'Ingresa el precio de compra', 'id' => 'precioCompra']) }}
                </div>

                <div class="form-group">
                  {{ Form::label('precioVenta', 'Precio de venta') }}
                  {{ Form::number('precioVenta', 0, ['class' => 'form-control col-6', 'placeholder' =>'Ingresa el precio de venta', 'id' => 'precioVenta']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('imagen', 'Imagen del bolso') }}
                  {{ Form::file('imagen', ['class' => 'form-control col-6', 'id' => 'imagen'] ) }}
                </div>
                {{ csrf_field() }}

                {{ Form::submit('Registrar producto' , ['class' => 'btn btn-success mt-5']) }}
                <a href="/bags" class="btn btn-warning mt-5">Volver</a>
              {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
