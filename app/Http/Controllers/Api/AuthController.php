<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bioquimico;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Notice;
use App\Models\NoticeFile;
use App\Models\Paciente;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        $user = array(); //this will return a set of user and doctor data
        $user = Auth::user();
        $paciente = Paciente::find($user->id);
        $bioquimico = Bioquimico::find($user->id);
        if ($paciente !== null) {
            $user['ci'] = $paciente->ci;
            $user['nombre'] = $paciente->nombre;
            $user['fechaNacimiento'] = $paciente->fechaNacimiento;
            $user['sexo'] = $paciente->sexo;
            $user['telefono'] = $paciente->telefono;
            $user['tipo'] = 'Paciente';

        } else {
            if ($bioquimico !== null) {
                $user['ci'] = $bioquimico->ci;
                $user['direccion'] = $bioquimico->direccion;
                $user['nombre'] = $bioquimico->nombre;
                $user['fechaNacimiento'] = $bioquimico->fechaNacimiento;
                $user['sexo'] = $bioquimico->sexo;
                $user['telefono'] = $bioquimico->telefono;
                $user['tipo'] = 'Bioquimico';
            } else {
                $user['tipo'] = 'Otro';
            }
        }

        return $user; //return all data
    }
    
    public function login(Request $reqeust)
    {
        //validate incoming inputs
        $reqeust->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //check matching user
        $user = User::where('email', $reqeust->email)->first();

        //check password
        if(!$user || ! Hash::check($reqeust->password, $user->password)){
            throw ValidationException::withMessages([
                'email'=>['The provided credentials are incorrect'],
            ]);
        }

        //then return generated token
        return $user->createToken($reqeust->email)->plainTextToken;
    }
    


    public function user()
    {
        return response(auth()->user(), 200);
    }


    // Función para desconectar al usuario
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'Logged out'], 200);
    }

    public function checkStatus(Request $request)
    {
        return response(['user' => $request->user()], 200);
    }
}
