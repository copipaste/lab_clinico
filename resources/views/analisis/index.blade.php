@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Analisis</h1>
@stop



@section('content')



{{-- modal --}}
<div class="form-group align-items-end">
        {{-- ---Custom modal-- --}}
        <x-adminlte-button label="Registrar" class="bg-white" title="Registrar"
        data-toggle="modal" data-target="#modalpromocion" />

        <x-adminlte-modal id="modalpromocion" title="Registrar" size="lg" theme="dark" v-centered static-backdrop scrollable>
            <form action="" method="POST">
                        @method('POST')
                        @csrf
                                <x-adminlte-input name="fecha" type="date" label="Fecha" />
                                <x-adminlte-input name="idOrden" type="text" label="Nro Orden" />
                                <x-adminlte-input name="idBioquimico" type="text" label="Bioquimico" />
                                <x-adminlte-button  class="float-left mt-3" type="submit" label="Aceptar" theme="dark" />
                                <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="light" label="Cancelar" data-dismiss="modal" />
                                <x-slot name="footerSlot" >
                                </x-slot>
            </form>
        </x-adminlte-modal>
</div>
{{-- modal --}}


<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>
            @foreach ($analisis as $o)
                <tr>

                    <td>{{$o->id}}</td>
                    <td>{{ $o->orden->tipoAnalisis->nombre }}
                    <td>{{$o->fecha}}</td>
                    <td>{{$o->idOrden}}</td>
                    <td>{{$o->idBioquimico}}</td>
                        <td width="15px">
                            <div class="d-flex">

                                {{-- esto es para el de editar membresía --}}
                                <a href="{{route('analisis.show', $o->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="EDITAR">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR" data-toggle="modal" data-target="#modalCustom{{ $o->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </div>
                        </td>

                        <x-adminlte-modal id="modalCustom{{ $o->id }}" title="Eliminar" size="sm" theme="warning" icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
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
            @endforeach

        </x-adminlte-datatable>

    </div>
</div>
@stop

@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css')}}">

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


