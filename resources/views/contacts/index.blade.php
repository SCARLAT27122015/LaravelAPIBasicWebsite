@extends('layouts/app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Lista de comentarios</h2>
        <table class="table">
            <tr class="text-center">
                <th>Nombre</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Comentarios</th>
            </tr>
            @foreach ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->nombre }}</td>
                    <td>{{ $contacto->email }}</td>
                    <td>{{ $contacto->direccion }}</td>
                    <td>{{ $contacto->telefono }}</td>
                    <td>{{ $contacto->comentarios }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection