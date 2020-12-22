<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Parser;

class UserController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);
        $user = User::create($request->except(['password_confirmation']));

        $personalAccessToken = $user->createToken('MyApp');
        $tokenData = [
            'access_token' => $personalAccessToken->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
        ];

        return response()->json($tokenData);
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            $personalAccessToken = $user->createToken('Password Token');
            $tokenData = [
                'access_token' => $personalAccessToken->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString()
            ];
            return response()->json($tokenData);
        }
        else{
            return response()->json(['error'=>'El usuario y la contraseña son incorrectos'], 401);
        }
    }
    public function logout(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();

        $response = 'You have been logged out';
        return response()->json($response, 200);
     }
    public function details(Request $request)
    {
        $user = Auth::user();
        //$newUser = User::with(['city' => function($query)])->
        return response()->json( $user, 200);
    }
}
