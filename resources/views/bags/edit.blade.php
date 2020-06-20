@extends('layouts.app')

@section('content')

<style>
    img {
        width: 200px;
        height: 200px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
          <h4>Editar artículo</h4>
          @if(Session::has('success'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['route' => ['bags.update', $bolsa->id ], 'method' => 'put', 'files' => true]) !!}
                <div class="form-group">
                  {{ Form::label('nombre', 'Nombre') }}
                  {{ Form::text('nombre', $bolsa->nombre, ['class' => 'form-control', 'placeholder' =>'Ingresa el nombre del producto', 'id' => 'nombre']) }}
                </div>

                <div class="form-group">
                  {{ Form::label('descripcion', 'Descripción de la bolsa') }}
                  {!! Form::textarea('descripcion', $bolsa->descripcion, ['id' => 'descripcion', 'rows' => 4, 'class' => 'form-control', 'placeholder' => 'Ingresa una descripción']) !!}
                </div>

                <div class="form-group">
                  {{ Form::label('precioCompra', 'Precio de compra') }}
                  {{ Form::number('precioCompra', $bolsa->precioCompra, ['class' => 'form-control col-6', 'placeholder' =>'Ingresa el precio de compra', 'id' => 'precioCompra']) }}
                </div>

                <div class="form-group">
                  {{ Form::label('precioVenta', 'Precio de venta') }}
                  {{ Form::number('precioVenta', $bolsa->precioVenta, ['class' => 'form-control col-6', 'placeholder' =>'Ingresa el precio de venta', 'id' => 'precioVenta']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('imagen', 'Imagen del bolso') }}
                  {{ Form::file('imagen', ['class' => 'form-control col-6', 'id' => 'imagen'] ) }}
                </div>

                <img src="../../images/{{ $bolsa->imagen }}" alt="">
                {{ csrf_field() }}

                {{ Form::submit('Editar artículo' , ['class' => 'btn btn-success mt-5']) }}
                <a href="/bags" class="btn btn-warning mt-5">Volver</a>
              {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
