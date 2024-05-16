<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Analisis;
use App\Models\CourseStudent;
use App\Models\NotaVenta;
use App\Models\Orden;
use App\Models\ordenAnalisis;
use App\Models\Paciente;
use App\Models\Solicitud;
use App\Models\TipoAnalisis;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    public function index()
    {/*
        $user = Auth::user();
        $ordenes = Orden::where('idPaciente', $user->id)->get();
        foreach ($ordenes as $orden) {
            $tiposanalisis = $orden->tipoanalisis;
            $orden['tiposanalisis'] = $tiposanalisis;
        };
        return $ordenes; //return all data
*/
        $user = Auth::user();
        $paciente = Paciente::where('idUser', $user->id)->first();
        $ordenes = Orden::where('idPaciente', $paciente->id)->with('tipoanalisis')->get();
        return $ordenes; //return all data with tiposanalisis
    }

    public function registerOrder(Request $request)
    {

        $user = Auth::user();
        $paciente = Paciente::where('idUser', $user->id)->first();
        $notaventa1 = NotaVenta::create([
            'metodoPago' => 'antes IF DATA',
            'precio' => count($request->all()),
            'descuento' => 0,
            'precioTotal' => 0,
        ]);
        try {
            $datos = $request->all();
            if (count($datos) > 0) {

                // Obtener los datos JSON enviados desde Flutter
                //$jsonData = $request->input('data');

                // Decodificar el JSON a un array asociativo de PHP
                //$analysisTypes = json_decode($jsonData, true);

                $orden = new Orden();
                $orden->idPaciente = $paciente->id;
                $orden->estado = 'Muestra sin entregar';
                $orden->idNotaVenta = null;
                $orden->nroOrden = null;
                $orden->save();

                // Después de guardar la orden, obtén el ID asignado
                $idOrden = $orden->id;
                // Asigna el número de orden con 'OR' concatenado con el ID
                $orden->nroOrden = 'OR' . $idOrden;
                $orden->save();

                $montoTotal = 0;
                // Procesar los tipos de análisis recibidos
                foreach ($datos as $analysisType) {
                    $montoTotal = $montoTotal + floatval($analysisType['precio']);
                    ordenAnalisis::create([
                        'orden_id' => $orden->id,
                        'tipo_analisis_id' => intval($analysisType['id']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $analisis = new Analisis();
                    $analisis->estado = 'Pendiente';
                    $analisis->descripcion =  $analysisType['nombre']; // Acceder al nombre del tipo de análisis
                    $analisis->idOrden = $idOrden;
                    $analisis->save();
                }

                // Crear la nota de venta
                $notaventa = NotaVenta::create([
                    'metodoPago' => 'Paypal',
                    'precio' => $montoTotal,
                    'descuento' => 0,
                    'precioTotal' => $montoTotal,
                ]);

                $orden->idNotaVenta = $notaventa->id;
                $orden->save();
            }
            $ordenes = Orden::where('idPaciente', $paciente->id)->with('tipoanalisis')->get();
            return response()->json($ordenes, 201);
        } catch (\Exception $e) {
            // Registrar el error
            //\Log::error('Error en el registro: ' . $e->getMessage());

            // Devolver una respuesta de error
            return response()->json(['error' => 'Error en el registro de orden.'], 500);
        }
    }
}
