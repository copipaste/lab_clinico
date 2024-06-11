<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Análisis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #eeeeee;
        }
        .header img {
            max-width: 800px; /* Ajusta el tamaño máximo aquí */
            width: 100%; /* Esto asegura que la imagen se ajuste al contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
        }
        .header h1 {
            margin: 10px 0 0;
            font-size: 28px;
            color: #333333;
        }
        .content {
            margin-top: 20px;
        }
        .content h2 {
            font-size: 22px;    
            color: #333333;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            color: #666666;
            line-height: 1.6;
            margin: 10px 0;
        }
        .content .results {
            background-color: #f9f9f9;
            border: 1px solid #eeeeee;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .content .results strong {
            display: inline-block;
            width: 500px;
            color: #333333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #999999;
            border-top: 2px solid #eeeeee;
            padding-top: 10px;
        }
        .footer a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.ibb.co/vscmqg7/lab-bg.jpg" alt="Logo de la Clínica"> 
            <h1>Resultados de Análisis</h1>
        </div>
        <div class="content">
            <h2>Resultados del paciente {{$paciente}}</h2>
            <p>
                Nos complace presentarle los resultados del análisis realizado en fecha {{$fecha}} al paciente {{$paciente}} . A continuación, se presentan los detalles:
            </p>
            <div class="results">
                <p><strong>  SERIE ROJA</strong></p>
                <p><strong>Glóbulos Rojos:</strong> {{$globulosRojos}}</p>
                <p><strong>Hematocrito:</strong> {{$hematocrito}}</p>
                <p><strong>Hemoglobina:</strong> {{$hemoglobina}}</p>
                <p><strong>Volumen Corpuscular Medio (VCM):</strong> {{$VCM}}</p>
                <p><strong>Hemoglobina Corpuscular Media (HCM):</strong> {{$HCM}}</p>
                <p><strong>Concentración de Hemoglobina Corpuscular Media (CHCM):</strong> {{$CHCM}}</p>
                <p><strong>VSG:</strong> {{$VSG}}</p>
                <p><strong>Recuento de Plaquetas:</strong> {{$plaquetas}}</p>
                <p><strong>Recuento:</strong> {{$recuento}}</p>

                <p><strong>  SERIE BLANCA</strong></p>
                <p><strong>Glóbulos Blancos:</strong> {{$globulosBlancos}}</p>
                <p><strong>Promielocitos:</strong> {{$promielocitos}}</p>
                <p><strong>Mielocitos:</strong> {{$mielocitos}}</p>
                <p><strong>Metamielocitos:</strong> {{$metamielocitos}}</p>
                <p><strong>Cayados:</strong> {{$cayados}}</p>
                <p><strong>Segmentados:</strong> {{$segmentados}}</p>
                <p><strong>Linfocitos:</strong> {{$linfocitos}}</p>
                <p><strong>Monocitos:</strong> {{$monocitos}}</p>
                <p><strong>Eosinófilos:</strong> {{$eosinofilos}}</p>
                {{-- <p><strong>Basófilos:</strong> {{$basofilos}}</p> --}}
                <p><strong>Grupo Sanguíneo:</strong> {{$grupoSanguineo}}</p>
                {{-- <p><strong>Factor RH:</strong> {{$factorRH}}</p> --}}
                <p><strong>VDRL:</strong> {{$VDRL}}</p>
                <p><strong>Baciloscopia:</strong> {{$baciloscopia}}</p>
                <p><strong>Coproparasitológico:</strong> {{$coproparasitologico}}</p>
                <p><strong>Método de Examen:</strong> {{$metodo}}</p>
                <p><strong>Resultado:</strong> {{$resultado}}</p>
            </div>
            <p>Si tiene alguna pregunta o necesita más información, no dude en contactarnos.</p>
            <p>Atentamente,<br>
            Analisis-lab<br>
            70960799<br>
            Analisis-lab@gmail.com</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Analisis-lab. Todos los derechos reservados.<br></p>
        </div>
    </div>
</body>
</html>
