@extends('adminlte::page')

@section('content_header')

@stop
@section('content')
    <form action="{{ route('analisis.hemogramastore') }}" method="POST" class="needs-validation" novalidate>
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
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Bioqumico</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Bioquimico"
                        aria-describedby="inputGroupPrepend" value="{{ $analisis->bioquimico->nombre }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Seguro</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Seguro"
                        aria-describedby="inputGroupPrepend" required>
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
                        aria-describedby="inputGroupPrepend" required>
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

        <label class="mt-2">Hemograma</label>
        <div class="form-row">
            <div class="col">
                <label class="mt-1 text-danger">Serie Roja</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Globulos Rojos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="globulosrojo" id="globulosrojo"
                        aria-describedby="inputGroupPrepend">

                </div>
            </div>
            <div class="col">
                <label class="mt-1 text-primary">Serie Blanca</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Globulos Blancos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hematocrito</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Promielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hemoglobina</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Mielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">V.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Metamielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">H.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cayados</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">C.H.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Segmentados</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">VSG 1 a h</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Lintocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Plaquetas</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Monocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Recuento</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Eosinofilos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">


                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Blastos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <label class="mt-2">Descripcion</label>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <textarea class="form-control" placeholder=""></textarea>
                </div>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Grupo Sanguineo</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Factor Rh</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
@endsection
