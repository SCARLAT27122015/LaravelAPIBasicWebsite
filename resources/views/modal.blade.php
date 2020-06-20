<!-- Project Details Go Here-->
<h2 class="text-uppercase">{{ $bolsa->nombre }}</h2>

<img class="img-fluid d-block mx-auto" src="/images/{{ $bolsa->imagen }}" alt="" />

<p>{{ $bolsa->descripcion }}</p>

<ul class="list-inline">
    <li><b>Precio Compra:</b> ${{ $bolsa->precioCompra }}</li>
    <li><b>Precio Venta:</b> ${{ $bolsa->precioVenta }}</li>
</ul>
<button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Cerrar</button>