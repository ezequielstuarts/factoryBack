<?php

namespace App\Http\Controllers;

use App\Helpers\BasicValidator;
use App\Helpers\JWTAuth;
use App\Models\User;
use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    
    public function register(Request $request){
        
        $json = $request->input('json',null);

        $params_array = json_decode($json,true);
        try{

            BasicValidator::isValueNull($params_array['username']);
            BasicValidator::isValueNull($params_array['email']);
            BasicValidator::isValueNull($params_array['password']);
            //guardar usuario
            $userExists = users::where([
                'email' => $params_array['email']
            ])->first();
            /*
            Se verifica si ya existe un usario registrado con el email recibido
            */
            if(!is_null($userExists)){
                throw new Exception('Un usuario con ese email ya se encuentra registrado','400');
            }
            /*
            Se crea el usuario nuevo y se almacena
            */
            $user = new users();
            $user->username = $params_array['username'];
            $user->email = $params_array['email'];
            $user->password = $params_array['password'];
            $user->status = 'DEFAULT';
            $user->erased = 0;
        
            $user->save();

            $response = [
                'status' => 'success',
                'code'  => '200',
                'message' => 'Se almaceno correctamente el usuario'
            ];

        }catch(Exception $e){
           $response = [
               'status' => 'error',
               'message' => $e->getMessage(),
               'code' => $e->getCode()
           ];
        }
        /*
        Se verifica que el codigo no sea 0 ya que no es un codigo HTTP valido
        */
        if($response['code'] == 0){
            $response['code'] = 400;
        }

        return response()->json($response,$response['code']);
    }

    public function login(Request $request){
        $jwtAuth = new JWTAuth();
        //datos recibidos
        $json = $request->input('json',null);
        
        $params_array = json_decode($json,true);

        BasicValidator::isValueNull($params_array['email']);
        BasicValidator::isValueNull($params_array['password']);
        // $email = 'admin@admin.com';
        // $password = 'admin';
        try{
            $signup = $jwtAuth->signup($params_array['email'],$params_array['password']);
            // var_dump($signup);die;
        }catch(Exception $e){
            $response = [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ];
        }
        return response()->json($signup,200);
    }

    public function update(Request $request){
        $token = $request->header('Authorization');
        $jwtAuth = new JWTAuth();
        $checkToken = $jwtAuth->checkToken($token);
        if($checkToken) {
            return User::all();
        } else {
            echo '<h1>El token es incorrecto</h1>';
        }
        die();
    }
}
