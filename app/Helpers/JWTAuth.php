<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\users;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;

class JWTAuth{

    public $key;

    public function __construct()
    {
        $this->key ='mi key';
    }

    public function signup($email,$password,$getToken = null){
        $user = users::where([
            'email' => $email,
            'password' => $password
            ])->first();
            
            $signup = false;
            if(is_object($user)) {
                $signup = true;
            }
        if($signup) {
                $token = [
                    'sub' => $user->id, //id de usuario es sub en JWT
                    'email' => $user->email,
                    'name' => $user->username,
                    'iat' => time(), //momento de creacion
                    'exp' => time() + (7*24 * 60 * 60) //expira en una semana
                ];
                
                $jwt = JWT::encode($token,$this->key,'HS256');
                // $decoded = JWT::decode($jwt,$this->key,'HS256'); // error al decodear averiguar porq
                if(is_null($getToken)) {
                    $data = [
                        'message'=>[
                            'token'=>$jwt,
                            'message' => 'login correcto'
                        ],
                        'code'=>200,
                        'status'=>'success'
                    ];
                }
        }else{
            $data =[
                'message' => 'error al loguearse',
                'code' =>'400',
                'status' => 'error'
            ];
        }
        return $data;
    }

    public function checkToken($jwt,$getIdentity = false) {
        $auth = false;
        $jwt = str_replace('"','',$jwt); //limpia comillas del token
        try{
            $decoded = JWT::decode($jwt,$this->key,['HS256']);
        }catch(\UnexpectedValueException $e){
            $auth = false;
        }catch(\DomainException $e){
            $auth = false;
        }

        if(!empty($decoded) && is_object($decoded) && isset($decoded->sub)){
            $auth = true;
        } else {
            $auth = false;
        }
        if($getIdentity) {
            return $decoded;
        }
        return $auth;
    }

    public function refreshTokenIfExpired($token)
    {
        
    }
}

?>