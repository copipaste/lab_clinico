<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseStudent;
use App\Models\Solicitud;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();
        return $solicitudes; //return all data
    }

}
