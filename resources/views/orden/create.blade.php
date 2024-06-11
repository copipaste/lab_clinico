@extends('adminlte::page')

@section('content_header')
@php
  use App\Models\Paciente;
  $Tpaciente=Paciente::All();
@endphp
@stop
@section('content')
@if (!$paciente)

    <form action="{{ route('orden.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <label for="validationCustom01">Analisis Clinico | Orden</label>
        <div class="form-row">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Paciente</span>
                </div>
                <select class="custom-select" id="pacientes" name="pacientes">
                    <option value="nada">Seleccione...</option>
                    @foreach ($Tpaciente as $pacientes)
                    <option value="{{$pacientes->id}}">{{$pacientes->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">CI</span>
                    </div>
                    <input type="number" class="form-control" placeholder="" name="ci" id="ci"
                        aria-describedby="inputGroupPrepend readonly">
                </div>
            </div>
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Paciente</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                        aria-describedby="inputGroupPrepend readonly">
                </div>
            </div>

        </div>
        <div class="form-row mt-2">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Sexo</span>
                    </div>
                    <select class="custom-select" id="sexo" name="sexo">
                        <option selected disabled>Seleccione...</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Correo</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="correo" id="correo"
                        aria-describedby="inputGroupPrepend readonly">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Celular</span>
                    </div>
                    <input type="number" class="form-control" placeholder="" name="celular" id="celular"
                        aria-describedby="inputGroupPrepend readonly">
                </div>
            </div>

        </div>

        <div class="form-row mt-2">

            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fecha Nacimiento</span>
                    </div>
                    <input type="date" class="form-control" placeholder="" name="fechanacimiento" id="fechanacimiento"
                        aria-describedby="inputGroupPrepend readonly">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Tipo de Seguro</span>
                    </div>
                    <select class="custom-select" id="tiposeguro" name="tiposeguro">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($seguros as $seguro)
                        <option value="{{$seguro->id}}">{{$seguro->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="form-row mt-2">
            <div class="col">
                <span>Tipo de Análisis - Hemograma Completo</span>
                <div class="input-group">
                    <br>
                    <div>

                        <input class="form-check-input" type="checkbox" value="{{ 1 }}" id="tipoAnalisis{{ 1 }}" name="tipoAnalisisIds[]">
                        <label class="form-check-label" for="tipoAnalisis{{ 1 }}">
                            Hemograma
                        </label>
                        <label class="form-check-label" for="tipoAnalisis{{ 1 }}">
                            | Precio: 50 bs.
                        </label>


                        @php
                        $attributesHemograma = $hemogramacompleto->first()->getAttributes();
                        $keysToExclude = ['id']; // Atributos a excluir
                        $attributesHemograma = array_diff_key($attributesHemograma);
                        $attributesHemograma = array_slice($attributesHemograma, 1, -5, true);
                    @endphp

                    @foreach ($attributesHemograma as $attribute => $value)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" >
                                <label class="form-check-label" >
                                    | {{ ucfirst($attribute) }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col">
                <span>Tipo de Análisis - Hormonas</span>
                <div class="input-group">
                    <br>
                    <div>


                            <input class="form-check-input" type="checkbox" value="{{ 2 }}" id="tipoAnalisis{{ 2 }}" name="tipoAnalisisIds[]">
                            <label class="form-check-label" for="tipoAnalisis{{ 2}}">
                                Hormona
                            </label>
                            <label class="form-check-label" for="tipoAnalisis{{ 2}}">
                                | Precio: 100 bs.
                            </label>

                            @php
                            $attributesHormonas = $hormonas->first()->getAttributes();
                            $keysToExcludeHormonas = ['id']; // Atributos a excluir
                            $attributesHormonas = array_diff_key($attributesHormonas);
                            $attributesHormonas = array_slice($attributesHormonas, 1, -5, true);
                        @endphp


@foreach ($attributesHormonas as $attributeHormona => $valueHormona)                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" >
                                    <label class="form-check-label" >
                                        | {{ ucfirst($attributeHormona) }}
                                    </label>
                                </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-adminlte bg-white text-dark border mt-2" type="submit">Registrar</button>
    </form>
@else
<form action="{{ route('orden.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <label for="validationCustom01">Analisis Clinico | Orden</label>
    <div class="form-row">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Paciente</span>
                </div>
                <select class="custom-select" id="pacientes" name="pacientes">
                    <option value="nada">Seleccione...</option>
                    @foreach ($Tpaciente as $pacientes)
                    <option value="{{$pacientes->id}}">{{$pacientes->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
    <div class="form-row">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">CI</span>
                </div>
                <input type="number" class="form-control" placeholder="" name="ci" id="ci"
                    aria-describedby="inputGroupPrepend readonly" value="{{ $paciente->ci }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Paciente</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $user->name }}">
            </div>
        </div>

    </div>
    <div class="form-row mt-2">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Sexo</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $paciente->sexo }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Correo</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $paciente->correo }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Celular</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $paciente->telefono }}">
            </div>
        </div>

    </div>

    <div class="form-row mt-2">

        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Fecha Nacimiento</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $paciente->fechaNacimiento }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Tipo de Seguro</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="paciente" id="paciente"
                aria-describedby="inputGroupPrepend  readonly" value="{{ $seguropaciente->descripcion }}">
            </div>
        </div>

    </div>
    <div class="form-row mt-2">
        <div class="col">
            <span>Tipo de Análisis - Hemograma Completo</span>
            <div class="input-group">
                <br>
                <div>

                    <input class="form-check-input" type="checkbox" value="{{ 1 }}" id="tipoAnalisis{{ 1 }}" name="tipoAnalisisIds[]">
                    <label class="form-check-label" for="tipoAnalisis{{ 1 }}">
                        Hemograma
                    </label>
                    <label class="form-check-label" for="tipoAnalisis{{ 1 }}">
                        | Precio: 50 bs.
                    </label>


                    @php
                    $attributesHemograma = $hemogramacompleto->first()->getAttributes();
                    $keysToExclude = ['id']; // Atributos a excluir
                    $attributesHemograma = array_diff_key($attributesHemograma);
                    $attributesHemograma = array_slice($attributesHemograma, 1, -5, true);
                @endphp

                @foreach ($attributesHemograma as $attribute => $value)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" >
                            <label class="form-check-label" >
                                | {{ ucfirst($attribute) }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col">
            <span>Tipo de Análisis - Hormonas</span>
            <div class="input-group">
                <br>
                <div>


                        <input class="form-check-input" type="checkbox" value="{{ 2 }}" id="tipoAnalisis{{ 2 }}" name="tipoAnalisisIds[]">
                        <label class="form-check-label" for="tipoAnalisis{{ 2}}">
                            Hormona
                        </label>
                        <label class="form-check-label" for="tipoAnalisis{{ 2}}">
                            | Precio: 100 bs.
                        </label>

                        @php
                        $attributesHormonas = $hormonas->first()->getAttributes();
                        $keysToExcludeHormonas = ['id']; // Atributos a excluir
                        $attributesHormonas = array_diff_key($attributesHormonas);
                        $attributesHormonas = array_slice($attributesHormonas, 1, -5, true);
                    @endphp


@foreach ($attributesHormonas as $attributeHormona => $valueHormona)                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" >
                                <label class="form-check-label" >
                                    | {{ ucfirst($attributeHormona) }}
                                </label>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-adminlte bg-white text-dark border mt-2" type="submit">Registrar</button>
</form>
@endif
@endsection
