@extends('adminlte::page')

@section('content_header')

@stop
@section('content')
    <form action="{{ route('analisis.quimicastore') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="idAnalisis" id="idAnalisis" value="{{ $analisis->id }}">
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

        <label class="mt-2">Quimica Sanguinea</label>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Glucosa</span>
                    </div>
                    <input type="text" class="form-control" name="glucosa" id="glucosa" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Urea</span>
                    </div>
                    <input type="text" class="form-control" name="urea" id="urea" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Creatinina</span>
                    </div>
                    <input type="text" class="form-control" name="creatinina" id="creatinina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Ácido Úrico</span>
                    </div>
                    <input type="text" class="form-control" name="acidoUrico" id="acidoUrico" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <!-- Repite la misma estructura para los demás campos -->

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Colesterol</span>
                    </div>
                    <input type="text" class="form-control" name="colesterol" id="colesterol" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Triglicéridos</span>
                    </div>
                    <input type="text" class="form-control" name="trigliceridos" id="trigliceridos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <!-- Continúa con el resto de los campos -->

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Colesterol HDL</span>
                    </div>
                    <input type="text" class="form-control" name="colesterolHDL" id="colesterolHDL" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Colesterol LDL</span>
                    </div>
                    <input type="text" class="form-control" name="colesterolLDL" id="colesterolLDL" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <!-- Y así sucesivamente para todos los atributos -->

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Colesterol VLDL</span>
                    </div>
                    <input type="text" class="form-control" name="colesterolVLDL" id="colesterolVLDL" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Lípidos Totales</span>
                    </div>
                    <input type="text" class="form-control" name="lipidoTotales" id="lipidoTotales" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fosfolípidos</span>
                    </div>
                    <input type="text" class="form-control" name="fosfolipidos" id="fosfolipidos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Proteínas Totales</span>
                    </div>
                    <input type="text" class="form-control" name="proteinasTotales" id="proteinasTotales" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Albuminas</span>
                    </div>
                    <input type="text" class="form-control" name="albuminas" id="albuminas" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Globulina</span>
                    </div>
                    <input type="text" class="form-control" name="globulina" id="globulina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cloro</span>
                    </div>
                    <input type="text" class="form-control" name="cloro" id="cloro" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Sodio</span>
                    </div>
                    <input type="text" class="form-control" name="sodio" id="sodio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Potasio</span>
                    </div>
                    <input type="text" class="form-control" name="potasio" id="potasio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Calcio</span>
                    </div>
                    <input type="text" class="form-control" name="calcio" id="calcio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Calcio Iónico</span>
                    </div>
                    <input type="text" class="form-control" name="calcioIonico" id="calcioIonico" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Troponina</span>
                    </div>
                    <input type="text" class="form-control" name="troponina" id="troponina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Ferritina</span>
                    </div>
                    <input type="text" class="form-control" name="ferritina" id="ferritina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Transferrina</span>
                    </div>
                    <input type="text" class="form-control" name="transferrina" id="transferrina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fósforo</span>
                    </div>
                    <input type="text" class="form-control" name="fosforo" id="fosforo" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hierro</span>
                    </div>
                    <input type="text" class="form-control" name="hierro" id="hierro" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Litio</span>
                    </div>
                    <input type="text" class="form-control" name="litio" id="litio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Magnesio</span>
                    </div>
                    <input type="text" class="form-control" name="magnesio" id="magnesio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Amilasa</span>
                    </div>
                    <input type="text" class="form-control" name="amilasa" id="amilasa" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Lipasa</span>
                    </div>
                    <input type="text" class="form-control" name="lipasa" id="lipasa" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Transaminasa GOT</span>
                    </div>
                    <input type="text" class="form-control" name="transaminasaGOT" id="transaminasaGOT" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Transaminasa GPT</span>
                    </div>
                    <input type="text" class="form-control" name="transaminasaGPT" id="transaminasaGPT" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fosfatasa Alcalina</span>
                    </div>
                    <input type="text" class="form-control" name="fosfatasaAlcalina" id="fosfatasaAlcalina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fosfatasa Ácida Total</span>
                    </div>
                    <input type="text" class="form-control" name="fosfAcidaTotal" id="fosfAcidaTotal" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Fosfatasa Ácida Prostática</span>
                    </div>
                    <input type="text" class="form-control" name="fostAcidaProstatica" id="fostAcidaProstatica" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Creatin Fosfoquinasa CPK</span>
                    </div>
                    <input type="text" class="form-control" name="creatinFosfoKinasaCPK" id="creatinFosfoKinasaCPK" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Deshidrogenasa Láctica LDH</span>
                    </div>
                    <input type="text" class="form-control" name="deshidrogemasaLacticaLDH" id="deshidrogemasaLacticaLDH" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <!-- Aquí termina la última columna -->
        </div>
        <button class="btn btn-primary mt-2 mb-2" type="submit">Submit form</button>
    </form>
@endsection
