<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseStudent;
use App\Models\Orden;
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
        $ordenes = Orden::where('idPaciente', $user->id)->with('tipoanalisis')->get();
        return $ordenes; //return all data with tiposanalisis
    }

}
