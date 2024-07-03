@extends('adminlte::page')

@section('content_header')

@stop
@section('content')
    <form action="{{ route('analisis.orinastore') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="idAnalisis" value="{{ $analisis->id }}">
        <label for="validationCustom01">Nro de Analisis: {{ $analisis->id }}</label>
        <div class="form-row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Nro Orden</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                        value="{{ $idOrden }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Bioquímico</span>
                    </div>
                    <select class="custom-select" id="idbioquimico" name="idbioquimico" required>
                        @foreach ($bioquimico as $b)
                            <option value="{{$b->id}}">{{$b->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Paciente</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Paciente"
                        aria-describedby="inputGroupPrepend" value="{{$nombrepaciente}}" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fecha</span>
                    </div>
                    <input type="date" class="form-control" id="validationCustom04" placeholder="State"
                        value="{{ date('Y-m-d') }}" required>
                </div>
            </div>
        </div>

        <label class="mt-2">Orina Completa</label>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Volumen</span>
                    </div>
                    <input type="text" class="form-control" name="volumen" id="volumen" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Color</span>
                    </div>
                    <input type="text" class="form-control" name="color" id="color" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Aspecto</span>
                    </div>
                    <input type="text" class="form-control" name="aspecto" id="aspecto" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Densidad</span>
                    </div>
                    <input type="text" class="form-control" name="densidad" id="densidad" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">pH</span>
                    </div>
                    <input type="text" class="form-control" name="ph" id="ph" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Olor</span>
                    </div>
                    <input type="text" class="form-control" name="olor" id="olor" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Proteínas</span>
                    </div>
                    <input type="text" class="form-control" name="proteinas" id="proteinas" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Glucosa</span>
                    </div>
                    <input type="text" class="form-control" name="glucosa" id="glucosa" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cetonas</span>
                    </div>
                    <input type="text" class="form-control" name="cetonas" id="cetonas" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Urobilinógeno</span>
                    </div>
                    <input type="text" class="form-control" name="urobilinogeno" id="urobilinogeno" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hemoglobina</span>
                    </div>
                    <input type="text" class="form-control" name="hemoglobina" id="hemoglobina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Nitritos</span>
                    </div>
                    <input type="text" class="form-control" name="nitritos" id="nitritos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Bilirrubina</span>
                    </div>
                    <input type="text" class="form-control" name="bilirrubina" id="bilirrubina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Sangre</span>
                    </div>
                    <input type="text" class="form-control" name="sangre" id="sangre" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Células Epiteliales</span>
                    </div>
                    <input type="text" class="form-control" name="celulasEpiteliales" id="celulasEpiteliales" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Eritrocitos</span>
                    </div>
                    <input type="text" class="form-control" name="eritrocitos" id="eritrocitos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Leucocitos</span>
                    </div>
                    <input type="text" class="form-control" name="leucocitos" id="leucocitos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Bacterias</span>
                    </div>
                    <input type="text" class="form-control" name="bacterias" id="bacterias" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Filamentos de Mucus</span>
                    </div>
                    <input type="text" class="form-control" name="filamentosDeMucus" id="filamentosDeMucus" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cristales Uratos Amorfes</span>
                    </div>
                    <input type="text" class="form-control" name="cristalesUratosAmorfes" id="cristalesUratosAmorfes" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cristales Oxalato de Calcio</span>
                    </div>
                    <input type="text" class="form-control" name="cristalesOxalatoDeCalcio" id="cristalesOxalatoDeCalcio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cristales Fosfatos Amorfos</span>
                    </div>
                    <input type="text" class="form-control" name="cristalesFosfatosAmorfos" id="cristalesFosfatosAmorfos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cristales de Ácido Úrico</span>
                    </div>
                    <input type="text" class="form-control" name="cristalesDeAcidoUrico" id="cristalesDeAcidoUrico" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cilindros Hialino</span>
                    </div>
                    <input type="text" class="form-control" name="cilindrosHialino" id="cilindrosHialino" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cilindros Granuloso</span>
                    </div>
                    <input type="text" class="form-control" name="cilindrosGranuloso" id="cilindrosGranuloso" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cilindros Leucocitario</span>
                    </div>
                    <input type="text" class="form-control" name="cilindrosLeucocitario" id="cilindrosLeucocitario" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Levaduras</span>
                    </div>
                    <input type="text" class="form-control" name="levaduras" id="levaduras" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fosfato Triple de Amonio y Magnesio</span>
                    </div>
                    <input type="text" class="form-control" name="fosfTripleDeAmonioYMagnesio" id="fosfTripleDeAmonioYMagnesio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>


        <button class="btn btn-primary mt-2 mb-2" type="submit">Submit form</button>
    </form>
@endsection
