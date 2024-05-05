@extends('adminlte::page')

@section('content_header')

@stop
@section('content')
    <form action="{{ route('analisis.hormonastore') }}" method="POST" class="needs-validation" novalidate>
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
                <label class="mt-1 text-danger">Analisis</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">TSH</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="TSH" id="TSH"
                        aria-describedby="inputGroupPrepend">

                </div>
            </div>
            <div class="col">
                <label class="mt-1 text-primary">Analisis</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">T3</span>
                    </div>
                    <input type="text" class="form-control"  name="T3" id="T3" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">T4</span>
                    </div>
                    <input type="text" class="form-control"  name="T4" id="T4" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">TSHNeonatal</span>
                    </div>
                    <input type="text" class="form-control"  name="TSHNeonatal" id="TSHNeonatal" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">T4Libre</span>
                    </div>
                    <input type="text" class="form-control"  name="T4Libre" id="T4Libre" placeholder="" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Progesterona</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="progesterona" id="progesterona" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Prolactina</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="prolactina" id="prolactina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">estradiol</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="estradiol" id="estradiol" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cortisol8am</span>
                    </div>
                    <input type="text" class="form-control" placeholder="cortisol8am"  name="cortisol8am" id="cosrtisol8am" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Cortisol16pm</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="cortisol16pm" id="cortisol16pm" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">LH</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="LH" id="LH" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">FSH</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="FSH" id="FSH" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Testosterona</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="testosterona" id=""testosterona aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">TestoteronaTotal</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="testoteronatotal" id="testoteronatotal" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">TestosteronaLibre</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="testosteronalibre" id="testosteronalibre" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">HDeCrecimiento</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="hdecrecimiento" id="hdecrecimiento" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">HDeCrecimientoPostEjercicio</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="hdecrecimientopostejercicio" id="hdecrecimientopostejercicio" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Insulina</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="insulina" id="insulina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">AcAntiTPO</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="acantitpo" id="acantitpo" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">DHEA</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="dhea" id="dhea" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">DHEAS</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="dheas" id="dheas" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">tph</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="tph" id="tph" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">17OHPPRG</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="170hprg" id="170hpprg" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">AntiCCP</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="anticcp" id="anticcp" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Gastrina</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="gastrina" id="gastrina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Aldosterona</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="aldosterona" id="aldosterona" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">HParatiroidea</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="hparatiroidea" id="hparatiroidea" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">antAntiriroglobulinaTG</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="antantiriroglobulinatg" id="antantirurogglobulinatg" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">AcVanilMandelico</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="acvanilmandelico" id="acvanilmandelico" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">IGFISomatomedina</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="igfisomatomedina" id="igfisomatomedina" aria-describedby="inputGroupPrepend">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">IGFBP3</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="igfbp3" id="igfbp3" aria-describedby="inputGroupPrepend">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">InsulinaPostPand</span>
                    </div>
                    <input type="text" class="form-control" placeholder=""  name="insulinapostpand" id="insulinapostpand" aria-describedby="inputGroupPrepend">
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


        <button class="btn btn-primary mt-2 mb-2" type="submit">Submit form</button>
    </form>
@endsection
