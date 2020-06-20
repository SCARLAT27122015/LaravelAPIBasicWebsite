@extends('layouts.main')
@section('content')
    
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="products">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Productos</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><b>Cantidad de bolsas: </b>{{ $totalBolsas }}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($bolsas as $bolsa)
                    <div class="col-lg-4 col-sm-6 mb-4 text-center bagContainerMainPage">
                        <div class="container-buy text-center">
                            <span class="fa-stack fa-1x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <div class="purchasing-process">
                                <h6 class="mt-3">Proceso de pago</h6>
                                <ol class="mt-3 mr-3">
                                    <li class="mt-3">Realiza tu depósito a la tarjeta <b>1111111111111111111</b></li>
                                    <li class="mt-3">Envía vía whatsapp al <b>2223518207</b> lo siguiente:
                                        <ul class="mt-3 text-left">
                                            <li>Nombre completo</li>
                                            <li>Dirección</li>
                                            <li>Foto o clave de los artículos comprados</li>
                                            <li>Imagen del comprobante de pago</li>
                                        </ul>
                                    </li>
                                    <li class="mt-3">En un rango de 5 días tu bolsa estará en la dirección proporcionada</li>
                                </ol>
                            </div>
                        </div>
                        <div class="portfolio-item">
                            <a id={{ $bolsa->id }} class="portfolio-link modalGetter" data-toggle="modal" href="#portfolioModal1"
                                >
                                @if ($bolsa->imagen != '')
                                    <h4> {{ $bolsa->nombre }}</h4>
                                    <img class="modalGetter img-fluid" src="images/{{ $bolsa->imagen }}" id="bolsa{{ $bolsa->id }}"/>
                                @else
                                    <h4> {{ $bolsa->nombre }}</h4>
                                @endif
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">
                                    <p><b>Precio de compra: </b>${{ $bolsa->precioCompra }}</p>
                                    <p><b>Precio de venta: </b>${{ $bolsa->precioVenta }}</p>
                                </div>
                                <div class="portfolio-caption-subheading text-muted">{{ $bolsa->descripcion }}</div>
                            </div>
                        </div>
                    </div>    
                @endforeach
                
            </div>
            {!! $bolsas->render() !!}
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sobre nosotros</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contáctanos</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                {!! Form::open(['url' => '/contactoProcess', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre') }}
                        {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' =>'Ingresa tu nombre completo', 'id' => 'nombre']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico') }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' =>'Ingresa tu correo electrónico', 'id' => 'email']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('direccion', 'Dirección de entrega') }}
                        {!! Form::textarea('direccion', null, ['id' => 'direccion', 'rows' => 4, 'class' => 'form-control', 'placeholder' => 'Ingresa la dirección de entrega']) !!}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('telefono', 'Número telefónico') }}
                        {{ Form::tel('telefono', null, ['class' => 'form-control', 'placeholder' =>'Ingresa tu número telefónico', 'id' => 'telefono']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('comentarios', 'Comentarios') }}
                        {!! Form::textarea('comentarios', null, ['id' => 'comentarios', 'rows' => 4, 'class' => 'form-control', 'placeholder' => 'Ingresa tus comentarios']) !!}
                    </div>

                    <!--<div class="form-group">
                        {{ Form::label('imagenVoucher', 'Imagen del voucher de compra (Opcional)') }}
                        {{ Form::file('imagenVoucher', ['class' => 'form-control col-6', 'id' => 'imagenVoucher']) }}
                    </div>-->
                    
                    {{ csrf_field() }}

                    {{ Form::submit('Insertar comentario' , ['class' => 'btn btn-primary mt-5']) }}
                    
                {!! Form::close() !!}
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img id="cross-image" src="{{ asset('/img/cross.jpg') }}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body" id="contentModalBolsa"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection