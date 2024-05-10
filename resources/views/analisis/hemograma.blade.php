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
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Bioqumico</span>
                    </div>
                    <select class="custom-select" id="idbioquimico" name="idbioquimico">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($bioquimico as $b)
                        <option value="{{$b->id}}">{{$b->nombre}}</option>
                        @endforeach
                    </select>
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
                    <input type="text" class="form-control" placeholder=""  name="globulosblanco" id="globulosblanco" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hematocrito</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="hematocrito" id="hematocrito" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Promielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="promielocito" id="promielocito" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Hemoglobina</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="hemoglobina" id="hemoglobina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Mielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="mielocito" id="mielocito" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">V.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="VCM" id="VCM" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Metamielocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="metamielocitos" id="metamielocitos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">H.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="HCM" id="HCM" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cayados</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="cayados" id=cayados"" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">C.H.C.M</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="CHCM" id="CHCM" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Segmentados</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="segmentados" id="segmentados" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">VSG 1 a h</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="VSG" id="VSG" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Linfocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="linfocitos" id="linfocitos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Plaquetas</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="plaquetas" id="plaquetas" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Monocitos</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="monocitos" id="monocitos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Recuento</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="recuento" id="recuento" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Eosinofilos</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="eosinofilos" id="eosinofilos" aria-describedby="inputGroupPrepend">
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
                    <input type="text" class="form-control" placeholder=""  name="blastos" id="blastos" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <label class="mt-2">Descripcion</label>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <textarea class="form-control"  name="descripcion" id="descripcion" placeholder=""></textarea>
                </div>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Grupo Sanguineo</span>
                    </div>
                    <input type="text" class="form-control"  name="gruposanguineo" id="gruposanguineo" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Factor Rh</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="factorrh" id="factorrh" aria-describedby="inputGroupPrepend">
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