@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Analisis</h1>
@stop



@section('content')



    {{-- modal --}}
    <div class="form-group align-items-end">
        {{-- ---Custom modal-- --}}
        <x-adminlte-button label="Registrar" class="bg-white mb-2" title="Registrar" data-toggle="modal"
            data-target="#modalpromocion" />
            <a href="{{ route('hormona.index') }}" class="btn btn-adminlte ml-4 bg-white text-dark border mb-2" title="Registrar">Hormonas</a>
            <a href="{{ route('hemograma.index') }}" class="btn btn-adminlte bg-white text-dark border mb-2" title="Registrar">Hemogramas</a>




        <x-adminlte-modal id="modalpromocion" title="Registrar" size="lg" theme="dark" v-centered static-backdrop
            scrollable>
            <form action="{{ route('analisis.store') }}" method="POST">
                @method('POST')
                @csrf
                <x-adminlte-input name="fecha" type="date" label="Fecha" />
                <x-adminlte-input name="idOrden" type="text" label="Nro Orden" />
                <x-adminlte-input name="idBioquimico" type="text" label="Bioquimico" />
                <x-adminlte-button class="float-left mt-3" type="submit" label="Aceptar" theme="dark" />
                <x-adminlte-button class="btn btn-primary float-right mt-3" theme="light" label="Cancelar"
                    data-dismiss="modal" />
                <x-slot name="footerSlot">
                </x-slot>
            </form>
        </x-adminlte-modal>
    </div>
    {{-- modal --}}


    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>
                @foreach ($analisis as $o)
                    @php
                        $hemogramaExistente = App\Models\HemogramaCompleto::where('idAnalisis', $o->id)->exists();
                    @endphp
                    <tr>
                        <td>{{ $o->idOrden }}</td>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->descripcion }}</td>
                        {{-- <td>{{ $o->bioquimico->nombre }}</td> --}}
                        <td>{{ $o->estado }}</td>
                        {{-- <td>{{ $o->orden->tipoAnalisis->nombre }}</td> --}}

                        <td width="15px">

                            <div class="d-flex">

                                @if ($o->descripcion == 'Hemograma')
                                    @if (!$hemogramaExistente)
                                        <a href="{{ route('analisis.hemograma', $o->id) }}"
                                            class="btn btn-xs btn-default text-primary mx-1 shadow" title="Registrar">
                                            <i class="fa fa-lg fa-fw fa-plus"></i>
                                        </a>
                                    @endif
                                @endif
                                @if ($o->descripcion == 'Hormona')
                                    @if (!$hemogramaExistente)
                                        <a href="{{ route('analisis.hormona', $o->id) }}"
                                            class="btn btn-xs btn-default text-primary mx-1 shadow" title="Registrar">
                                            <i class="fa fa-lg fa-fw fa-plus"></i>
                                        </a>
                                    @endif
                                @endif
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR"
                                    data-toggle="modal" data-target="#modalCustom{{ $o->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </div>
                        </td>

                        <x-adminlte-modal id="modalCustom{{ $o->id }}" title="Eliminar" size="sm"
                            theme="warning" icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                            <div style="height: 50px;">¿Está seguro de eliminar el seguro?</div>
                            <x-slot name="footerSlot">
                                <form action="{{ route('analisis.destroy', $o->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="dark" />
                                </form>

                                <x-adminlte-button theme="light" label="Cancelar" data-dismiss="modal" />
                            </x-slot>
                        </x-adminlte-modal>

                    </tr>
                    {{-- <x-adminlte-input id="nombreanalisis_debug" name="nombreanalisis_debug" type="text" value="{{ $o->orden->tipoAnalisis->nombre }}"/> --}}
                @endforeach

            </x-adminlte-datatable>

        </div>
    </div>
@stop

@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                });
            @endif

            @if (session('deleted'))
                Toast.fire({
                    icon: 'info',
                    title: '{{ session('deleted') }}'
                });
            @endif


        });
    </script>
@stop
