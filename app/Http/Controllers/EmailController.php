<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMessageMailable;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    

    public function sendEmail($datos, $email,$tipoAnalisis){

    
        $data = [
            'subject' => 'Resultados Analisis',
            'content' => 'Estos son los resultados de los analisis de jhoel debray',
            'paciente' => 'Jhoel Debray Quispe Ticona',
            'fecha' => '2021-10-10',
            'globulosRojos' => $datos['globulosRojos'],
            'hematocrito' => $datos['hematocrito'],
            'hemoglobina' => $datos['hemoglobina'],
            'VCM' => $datos['VCM'],
            'HCM' => $datos['HCM'],
            'CHCM' => $datos['CHCM'],
            'VSG' => $datos['VSG'],
            'plaquetas' => $datos['plaquetas'],
            'recuento' => $datos['recuento'],
            'globulosBlancos' => $datos['globulosBlancos'],
            'promielocitos' => $datos['promielocitos'],
            'mielocitos' => $datos['mielocitos'],
            'metamielocitos' => $datos['metamielocitos'],
            'cayados' => $datos['cayados'],
            'segmentados' => $datos['segmentados'],
            'linfocitos' => $datos['linfocitos'],
            'monocitos' => $datos['monocitos'],
            'eosinofilos' => $datos['eosinofilos'],
            'basofilos' => $datos['basofilos'],
            'grupoSanguineo' => $datos['grupoSanguineo'],
            'factorRH' => $datos['factorRH'],
            'VDRL' => $datos['VDRL'],
            'baciloscopia' => $datos['baciloscopia'],
            'coproparasitologico' => $datos['coproparasitologico'],
            'metodo' => $datos['metodo'],
            'resultado' => $datos['resultado'],

        ];
    
        Mail::to(users:$email)->send(new SendMessageMailable($data));
        return;
    }
}
