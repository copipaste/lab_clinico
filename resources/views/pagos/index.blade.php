@extends('adminlte::page')

@section('content_header')
<h1 class="m-0 text-dark">pagos</h1>
@stop



@section('content')


<div class="card">
    <div class="card-header">
        <form action="{{ route('pagos.indexCustom') }}" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Filtro por Fecha -->
                    <div class="form-group">

                        <label>Seleccionar Rango de Fechas:</label>
                        @php
                        $config = [
                            "locale" => ["format" => "YYYY-MM-DD HH:mm"],
                        ];
                        @endphp

                        <x-adminlte-date-range name="drPlaceholder" :config="$config" placeholder="Seleccionar rango de fechas..."
                            class="input-equal">

                        </x-adminlte-date-range>
                        @push('js')<script>
                            $(() => $("#drPlaceholder").val(''))
                        </script>@endpush
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Filtro por Tipo de Datos -->
                    <div class="form-group">
                        <label>Seleccionar Tipo de Datos:</label>
                        @php
                        $config = [
                        "placeholder" => "Seleccionar múltiples opciones...",
                        ];
                        @endphp
                        <x-adminlte-select2 id="sel2Category" name="sel2Category[]" :config="$config" multiple
                            class="input-equal">
                            <option>paciente</option>
                            <option>metodoPago</option>
                            <option>precio</option>
                            <option>descuento</option>
                            <option>precioTotal</option>
                            <option>created_at</option>

                        </x-adminlte-select2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" id="filter-button">Filtrar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>
            @foreach($pagos as $pago)
            <tr>
                @if(in_array('Paciente', $heads))<td>{{ $pago->ordenes->paciente->nombre }}</td>@endif
                @if(in_array('Método de Pago', $heads))<td>{{ $pago->metodoPago }}</td>@endif
                @if(in_array('Precio', $heads))<td>{{ $pago->precio }}</td>@endif
                @if(in_array('Descuento', $heads))<td>{{ $pago->descuento }}</td>@endif
                @if(in_array('Precio Total', $heads))<td>{{ $pago->precioTotal }}</td>@endif
                @if(in_array('Fecha', $heads))<td>{{ $pago->created_at }}</td>@endif

                <td width="15px">
                    <div class="d-flex">

 

                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR"
                            data-toggle="modal" data-target="#modalCustom{{ $pago->id }}">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <a href="{{ route('pagos.show', $pago) }}"
                            class="btn btn-xs btn-default text-teal mx-1 shadow" title="DETALLES">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>

                    </div>
                </td>

                <x-adminlte-modal id="modalCustom{{ $pago->id }}" title="Eliminar" size="sm" theme="warning"
                    icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                    <div style="height: 50px;">¿Está seguro de eliminar el pago?</div>
                    <x-slot name="footerSlot">
                        <form action="{{-- route('pagos.destroy', $pago) --}}" method="POST">
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
@section('plugins.DateRangePicker', true)
@section('plugins.Select2', true)
@section('css')
<link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css')}}">

<style>
    .input-equal .select2-selection {
        height: calc(2.875rem + 2px) !important;
        /* Ajusta esto según el tamaño de tu input de fecha */
    }

    .input-equal .input-group {
        height: calc(2.875rem + 2px) !important;
        /* Ajusta esto según el tamaño de tu input de fecha */
    }
</style>

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