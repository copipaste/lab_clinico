@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PAGOS REALIZADOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach ($OrdenesPacientes as $OrdenesPaciente)
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Pago #{{ $loop->iteration }} -
                            {{ \Carbon\Carbon::parse($OrdenesPaciente->created_at)->format('d/m/Y') }}</h3>
                        <ul>
                            @foreach ($OrdenesPaciente->tipoanalisis as $tipoAnalisis)
                                <li>{{ $tipoAnalisis->nombre }}: {{ $tipoAnalisis->precio }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" download="Pago{{ $loop->iteration }}.pdf" class="small-box-footer">
                        Descargar PDF <i class="fas fa-file-pdf"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
