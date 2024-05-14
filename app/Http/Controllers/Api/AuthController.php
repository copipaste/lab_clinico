<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bioquimico;
use App\Models\CourseStudent;
use App\Models\CourseSubject;
use App\Models\Historial;
use App\Models\Notice;
use App\Models\NoticeFile;
use App\Models\Paciente;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function index()
    {
        $user = array(); //this will return a set of user and doctor data
        $useraux = Auth::user();
        $user['id'] = $useraux->id;
        $user['name'] = $useraux->name;
        $user['email'] = $useraux->email;
        //$paciente = Paciente::find($user->id);
        $paciente = Paciente::where('idUser', $useraux->id)->first();
        //$bioquimico = Bioquimico::where('idUser', $useraux->id)->first();
        //$bioquimico = Bioquimico::find($user->id);
        if ($paciente !== null) {
            $user['ci'] = $paciente->ci;
            $user['nombre'] = $paciente->nombre;
            $user['fechaNacimiento'] = $paciente->fechaNacimiento;
            $user['sexo'] = $paciente->sexo;
            $user['telefono'] = $paciente->telefono;
            $user['tipo'] = 'Paciente';
        } else {
            $user['tipo'] = 'Otro';
        }

        /*
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
        */

        return $user; //return all data
    }


    /*
    public function index()
    {
        $user = array();
        $user = Auth::user();

        // Buscar el paciente asociado al usuario
        $paciente = Paciente::where('idUser', $user->id)->first();
        // Buscar el bioquímico asociado al usuario
        $bioquimico = Bioquimico::where('idUser', $user->id)->first();

        // Verificar si el usuario es un paciente
        if ($paciente !== null) {
            $user['ci'] = $paciente->ci;
            $user['nombre'] = $paciente->nombre;
            $user['fechaNacimiento'] = $paciente->fechaNacimiento;
            $user['sexo'] = $paciente->sexo;
            $user['telefono'] = $paciente->telefono;
            $user['tipo'] = 'Paciente';
        }
        // Verificar si el usuario es un bioquímico
        else if ($bioquimico !== null) {
            $user['ci'] = $bioquimico->ci;
            $user['direccion'] = $bioquimico->direccion;
            $user['nombre'] = $bioquimico->nombre;
            $user['fechaNacimiento'] = $bioquimico->fechaNacimiento;
            $user['sexo'] = $bioquimico->sexo;
            $user['telefono'] = $bioquimico->telefono;
            $user['tipo'] = 'Bioquimico';
        }
        // Si el usuario no es ni paciente ni bioquímico
        else {
            $user['tipo'] = 'Otro';
        }

        return response()->json($user); // Devolver todos los datos como JSON
    }

    */

    public function login(Request $request)
    {
        //validate incoming inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //check matching user
        $user = User::where('email', $request->email)->first();

        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }

        //then return generated token
        return $user->createToken($request->email)->plainTextToken;
    }

    public function register(Request $request)
    {
        try {
            // Validar los datos entrantes
            $validatedData = $request->validate([
                'email' => 'required',
                'password' => 'required',
                'ci' => 'required',
                'nombre' => 'required',
                'fechaNacimiento' => 'required|date',
                'sexo' => 'required',
                'telefono' => 'required',
            ]);

            // Crear el usuario
            $user = User::create([
                'name' => $request->nombre,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])->assignRole('Paciente');

            // Crear el historial
            $historial = Historial::create([
                'nroHistoria' => $request->ci,
                'fechaRegistro' => date('Y-m-d'),
                'antecedentesPatologicos' => 'Ninguno',
            ]);

            // Crear el paciente
            $paciente = Paciente::create([
                'ci' => $request->ci,
                'nombre' => $request->nombre,
                'fechaNacimiento' => $request->fechaNacimiento,
                'sexo' => $request->sexo,
                'telefono' => $request->telefono,
                //'correo' => null,
                //'idTipoSeguro' => null,
                'idHistorial' => $historial->id,
                'idUser' => $user->id,
            ]);

            return response()->json($user, 201);
        } catch (\Exception $e) {
            // Registrar el error
            //\Log::error('Error en el registro: ' . $e->getMessage());

            // Devolver una respuesta de error
            return response()->json(['error' => 'Error en el registro de usuario.'], 500);
        }
    }


    // Verifica si ya existe un paciente con el CI ingresado en el formulario de registro
    public function existsci(Request $request)
    {
        //validate incoming inputs
        $request->validate([
            'ci' => 'required',
        ]);

        //busca al paciente con determinado ci
        $user = Paciente::where('ci', $request->ci)->first();

        //verifica si existe el usuario con ci mandado en request
        if (!$user) {
            throw ValidationException::withMessages([
                'ci' => ['No existe un paciente con el ci enviado'],
            ]);
        }

        //retorna el paciente
        return $user;
    }

    // Verifica si ya existe un paciente con el email ingresado en el formulario de registro
    public function existsemail(Request $request)
    {
        //validate incoming inputs
        $request->validate([
            'email' => 'required',
        ]);

        //busca al paciente con determinado email
        $user = User::where('email', $request->email)->first();

        //verifica si existe el usuario con email mandado en request
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['No existe un paciente con el email enviado'],
            ]);
        }

        //retorna el paciente
        return $user;
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
