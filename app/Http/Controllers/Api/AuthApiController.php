<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthApiController extends ApiBaseController
{
    public $successStatus = 200;

    private $name;
    private $email;
    private $type;
    private $password;
    private $user;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|unique:clients|email|max:191',
            'name' => 'required|max:191|min:2',
            'type' => 'required|max:191',
            'password' => 'required|confirmed',
        ]);
        
        if ($validator->fails()) { 
            return response()->json(['errors'=>$validator->errors()], 401);            
        }

        if(Client::where('email', '=', $request->email)->exists())
        {
            return response()->json(['errors'=>'Клиент уже зарегистрирован'], 401);     
        }

        $this->name = $request->name;
        $this->email = $request->email;
        $this->type = $request->type;
        $this->password = $request->password;

        DB::transaction(function () {
            $this->user = Client::create([
                'uuid' => Str::uuid(),
                'name' => $this->name,
                'email' => $this->email,
                'type' => $this->type,
                'password' => Hash::make($this->password),
            ]);
        });

        if(!Client::where('email', '=', $request->email)->exists())
        {
            return response()->json(['errors'=>'Не удалось зарегистрировать клиента'], 401);     
        }

        Auth::login($this->user);     

        if (Auth::check()) {
            $tokenResult = $this->user->createToken(config('app.name'));
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            return $this->sendResponse([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ],
                'Authorization is successful');
        }
        
        return response()->json(['errors'=>'Не удалось авторизоваться'], 401);     
    }

    /** 
     * login api 
     * 
     * @return Response 
     */ 
    public function login(Request $request) { 

        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        if(!Client::where('email', '=', $request->email)->exists())
        {
            return response()->json(['errors'=>'Такого пользователя не существует'], 401); 
        }       

        $client = Client::where('email', '=', $request->email)->first('password');

        if(Hash::check($request->password, $client->password))
        {
            if (Auth::check()) {
                $tokenResult = $client->createToken(config('app.name'));
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();

                return $this->sendResponse([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString(),
                    'uid' => $client->uid,
                    'role' => $client->role
                ],
                    'Authorization is successful');
            }
        };
        return response()->json(['errors'=>'Авторизация не удалась'], 401); 
    }
    
}
