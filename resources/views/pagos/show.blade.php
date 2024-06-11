@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PAGOS</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $pago->ordenes->paciente->nombre }}</p>
            <p><strong>Metodo de Pago:</strong> {{ $pago->metodoPago }}</p>
            <p><strong>Precio:</strong> {{ $pago->precio }}</p>
            <p><strong>Descuento:</strong> {{ $pago->descuento }}</p>
            <p><strong>Precio Total:</strong> {{ $pago->precioTotal }}</p>
            <p><strong>Fecha de registro de Pago:</strong> {{ $pago->created_at }}</p>

            {{-- <p><strong>Tipo de Seguro:</strong> {{ $paciente->tipoSeguro->descripcion ?? 'Sin seguro' }}</p> --}}
        </div>
    </div>

    <div class="form-group mt-2">
         
        <a href="{{ route('pagos.index') }}" class="btn btn-danger">Volver</a>
    </div>

@stop