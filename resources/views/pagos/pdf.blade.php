<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orden de Pago</title>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: 20px auto;
            padding: 0 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        /* Otros estilos según el diseño deseado */
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Orden de Pago #{{ $orden->id }}</h1>
            <p>Fecha de Creación: {{ $orden->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="content">
            <h3>Detalles de la Orden:</h3>
            <p><strong>Paciente:</strong> {{ $orden->paciente->nombre }}</p>
            <p><strong>Estado:</strong> {{ $orden->estado }}</p>
            <h3>Tipos de Análisis:</h3>
            <ul>
                @foreach ($orden->tipoanalisis as $tipoAnalisis)
                    <li>{{ $tipoAnalisis->nombre }} - {{ $tipoAnalisis->precio }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
