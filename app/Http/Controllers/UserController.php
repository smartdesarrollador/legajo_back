<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use App\Models\Permiso;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Illuminate\Http\Response;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;
 // Asegúrate de incluir la librería JWT



class UserController extends Controller
{
    public function index()
    {
        try {
            // Consulta todos los usuarios
            $usuarios = User::all();

            // Retorna la lista de usuarios
            return response()->json($usuarios, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los usuarios', 'details' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function register(Request $request){
$user = User::where('email',$request['email'])->first();

if($user){
    $response['status'] = 0;
        $response['message'] = 'El Email ya existe';
        $response['code'] = 200;
}else{
$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $response['status'] = 1;
        $response['message'] = 'Usuario registrado exitosamente';
        $response['code'] = 200;
}

        
        return response()->json($response);
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');

         try{
                if(!JWTAuth::attempt($credentials)){
                    $response['status'] = 0;
                        $response['code'] = 401;
                        $response['data'] = null;
                        $response['message'] = 'El correo o la contraseña son incorrectos';
                        return response()->json($response);
                }
        }catch(JWTException $e){
            $response['data'] = null;
        $response['code'] = 500;
        $response['message'] = 'No se pudo crear el token';
        return response()->json($response);
        }

        $user = auth()->user();
        $usuario = User::find($user->id);
        /* $roles = $usuario->rol()->pluck('nombre')->toArray(); */
           $rol = $usuario->rol()->first(['nombre']);
           $nombreRol = $rol->nombre;
        
        $data['token'] = auth()->claims([
            'user_id' => $user->id,
            'email' => $user->email,
            'rol' => $nombreRol,
            /* 'rol' => $roles[0] */
        ])->attempt($credentials);

        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['message'] = 'Inicio de sesión exitosamente';

        return response()->json($response);

    }

    /* Metodos nuevos */


public function generateTemporaryToken(Request $request)
{
    // Validar que el request tenga el ID_USER necesario.
    $request->validate([
        'user_id' => 'required|integer|exists:users,id'
    ]);

    $user = User::find($request->user_id);

    // Asegurarse de que el usuario tiene permisos para acceder a la empresa.
    if (!$this->userHasAccessToCompany($user)) {
        return response()->json(['error' => 'No tiene permisos para acceder a esta empresa.'], 403);
    }

    // Obtener el rol del usuario
   $rol = $user->rol()->first(['nombre']);
   $nombreRol = $rol->nombre;

    // Generar un JWT usando las funciones de Tymon JWTAuth.
    // Añadimos el 'user_id', 'email', 'id_rol' y 'nombre_rol' del usuario al payload del token.
    $customClaims = [
        'user_id' => $user->id,
        'email' => $user->email,
        'rol' => $nombreRol,
        'exp' => now()->addMinutes(10)->timestamp // El token expira en 10 minutos.
    ];

    $token = JWTAuth::claims($customClaims)->fromUser($user);

    return response()->json(['token' => $token], 200);
}




private function userHasAccessToCompany($user)
{
    // Lógica para verificar si el usuario tiene acceso a la empresa.
    // Esto puede implicar verificar en la base de datos si el usuario es administrador
    // o está relacionado con la empresa de alguna manera.
    return true; // Implementar la lógica según las reglas de negocio.
}

public function validateToken(Request $request)
{
    $request->validate([
        'token' => 'required|string'
    ]);

    try {
        // Intenta decodificar el token y autenticar al usuario con JWTAuth.
        $user = JWTAuth::setToken($request->token)->authenticate();

        if (!$user) {
            return response()->json(['valid' => false], 401);
        }

        // Devolver los detalles del usuario necesarios para la sesión.
        return response()->json([
            'valid' => true,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                // Otros campos relevantes...
            ]
        ], 200);
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return response()->json(['valid' => false, 'error' => 'Token inválido'], 401);
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return response()->json(['valid' => false, 'error' => 'Token expirado'], 401);
    } catch (\Exception $e) {
        return response()->json(['valid' => false, 'error' => $e->getMessage()], 401);
    }
}



    

}
