@extends('adminlte::page')

@section('content_header')

@stop
@section('content')
    <div class="form-row">
        <div class="col-md-4">
            <div class="mt-2"><strong>Nro Orden:</strong> {{ $hemograma->analisis->orden->nroOrden }}</div>
        </div>
        <div class="col-md-4">
            <div class="mt-2"><strong>Paciente:</strong> {{ $hemograma->analisis->orden->paciente->nombre }}</div>
        </div>
        <div class="col-md-4">
            @php
                // Calcular la edad a partir de la fecha de nacimiento
                $fechaNacimiento = \Carbon\Carbon::parse($hemograma->analisis->orden->paciente->fechaNacimiento);
                $edad = $fechaNacimiento->age;
            @endphp
            <div class="mt-2"><strong>Edad:</strong> {{ $edad }} años</div>
        </div>


        {{-- <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Bioquímico</span>
                </div>
                <select class="custom-select" id="idbioquimico" name="idbioquimico" required>
                    <option value="{{ $hemograma->analisis->bioquimico->id }}">
                        {{ $hemograma->analisis->bioquimico->nombre }}</option>
                    @foreach ($bioquimico as $b)
                        @if ($hemograma->analisis->bioquimico->id != $b->id)
                            <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div> --}}
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <div class="mt-2"><strong>Bioquimico:</strong> {{ $hemograma->analisis->bioquimico->nombre }}</div>
        </div>
        <div class="col-md-4">
            <div class="mt-2"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($hemograma->created_at)->format('d/m/Y') }}</div>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <label class="mt-4">Hemograma Completo</label>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="mt-1 text-danger"><strong>Serie Roja</strong></div>
        </div>
        <div class="col-md-6">
            <div class="mt-2 text-danger"><strong>Valores de Referencia</strong></div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class=""><strong>Globulos Rojos:</strong> {{ $hemograma->globulosRojos }}</div>
        </div>
        <div class="col-md-6">
            <div class=""><strong>Hombre: </strong> 4.5 - 5.5 millones mm3</div>
            <div class=""><strong>Mujer: </strong> 3.9 - 5.0 millones mm3</div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class=""><strong>Hematocrito:</strong> {{ $hemograma->hematocrito }}</div>
        </div>
        <div class="col-md-6">
            <div class=""><strong>Hombre: </strong> 40 - 48% </div>
            <div class=""><strong>Mujer: </strong> 37 - 44% </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class=""><strong>Vol. Corpus Medio:</strong> {{ $hemograma->VCM }}</div>
        </div>
        <div class="col-md-6">
            <div class=""><strong>Fermotolitro: </strong>80-97</div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class=""><strong>Hemog. Corpus Media:</strong> {{ $hemograma->HCM }}</div>
        </div>
        <div class="col-md-6">
            <div class=""><strong>Picograma: </strong>26-33</div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class=""><strong>Conc. Hemog. Corps Media:</strong> {{ $hemograma->CHCM }}</div>
        </div>
        <div class="col-md-6">
            <div class=""><strong>de: </strong>33-35 gr/dl</div>
        </div>
    </div>

@endsection
