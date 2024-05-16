@extends('adminlte::page')

@section('title', 'Especialidades') {{-- Dar nombre a la pagina --}}

@section('content_header')
    <h1 class="m-0 text-dark">PAGOS</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class = "card">
        <div class = "card-body">
            <div class="modal-body">
                <form id="paymentForm" action="{{ route('session') }}" method="POST">
                    @csrf
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Seleccione los Tipos de Análisis</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tipos_analisis">Tipos de Análisis</label>
                                <select name="tipos_analisis[]" id="tipos_analisis" class="form-control"
                                    multiple="multiple">
                                    @foreach ($tiposAnalisis as $tipo)
                                        <option value="{{ $tipo->id }}" data-name="{{ $tipo->nombre }}"
                                            data-price="{{ $tipo->precio }}">{{ $tipo->nombre }} - {{ $tipo->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" id="addButton" class="btn btn-primary">Añadir</button>
                        </div>
                    </div>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Tipo de Análisis</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="analysisTableBody">
                                    <!-- Rows will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Total row -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Total:</label>
                                <input type="text" id="total" class="form-control" value="$0.00" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-success ">Proceder a Pagar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            const select = document.getElementById('tipos_analisis');
            const tableBody = document.getElementById('analysisTableBody');

            // Loop through selected options and add them to the table
            Array.from(select.selectedOptions).forEach(option => {
                const row = document.createElement('tr');
                const idCell = document.createElement('td');
                const nameCell = document.createElement('td');
                const priceCell = document.createElement('td');
                const actionCell = document.createElement('td');

                idCell.textContent = option.value; // Assuming the value is the analysis ID
                nameCell.textContent = option.dataset.name;
                priceCell.textContent = '$' + parseFloat(option.dataset.price).toFixed(2);

                // Agregar un campo oculto para enviar el precio asociado
                const idHiddenInput = document.createElement('input');
                idHiddenInput.type = 'hidden';
                idHiddenInput.name = 'analisis_id[]'; // Nombre del campo en el request
                idHiddenInput.value = option.value;

                // Create delete button
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.className = 'btn btn-danger btn-sm';
                deleteButton.addEventListener('click', function() {
                    row.remove();
                    // Add the option back to the select list
                    const newOption = document.createElement('option');
                    newOption.value = option.value;
                    newOption.textContent = option.textContent;
                    newOption.dataset.name = option.dataset.name;
                    newOption.dataset.price = option.dataset.price;
                    select.appendChild(newOption);
                    updateTotal();
                });

                actionCell.appendChild(deleteButton);

                row.appendChild(idCell);
                row.appendChild(nameCell);
                row.appendChild(priceCell);
                row.appendChild(idHiddenInput); // Agregar el campo oculto al row
                row.appendChild(actionCell);

                tableBody.appendChild(row);

                // Remove the selected option from the select list
                option.remove();
                updateTotal();
            });
        });
    </script>
@stop
