@extends('layouts.app')

@section('content')

<style>
    .imageBag {
        width: 100%;
        height: auto;
        border-radius: 20px;
    }

    #flash {
        display:none;
    }
</style>


<div class="container">
    <div class="alert alert-success" role="alert" id="flash"></div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 mb-5 d-flex justify-content-around">
        <a href="/bags/create" class="btn btn-success">Añadir una bolsa</a>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        @if ($bolsas->count() == 0)
            <p>No hay bolsas por mostrar</p>
        @else
            @foreach ($bolsas as $bolsa)
                <div class="card mr-3 mt-5 col-3" id="card{{ $bolsa->id }}">
                    <div class="card-header text-center">
                        <h4>{{ $bolsa->nombre }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-4">{{ $bolsa->descripcion }}</p>
                        @if ($bolsa->imagen != '')
                            <img src="images/{{ $bolsa->imagen }}" alt="" class="imageBag" />
                        @else
                            <p class="mt-5">No hay imagen disponible</p>
                        @endif
                        
                    </div>
                    <div class="card-footer text-center">
                        <p><b>Precio compra:</b> ${{ $bolsa->precioCompra }}</p>
                        <p><b>Precio Venta:</b> ${{ $bolsa->precioVenta }}</p>
                        <div class="d-flex">
                            <button class="deleteBag btn-primary btn ml-5 mr-3" data-id="{{ $bolsa->id }}" data-token="{{ csrf_token() }}" >Borrar</button>
                            <a href="bags/{{ $bolsa->id }}/edit" class="editBag btn-success btn">Editar</a>
                        </div>
                    </div>
                </div>
            
            @endforeach
        @endif
        
    </div>
    {!! $bolsas->render() !!}
    
</div>
@endsection
