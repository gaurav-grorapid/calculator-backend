<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;


class LoginService
{
 
    public function handle($data)
    {
        $user = User::findByEmail($data["email"]);
        Log::info($user);
        if (isset($user)) {
            if ($user->password == $data["password"]) {
                // $token = auth()->attempt($data);
                // return $this->respondWithToken($token);
                return response()->json($user,200);
            } else {
                return Response::json(["error" => "Password not matched"], 401);
            }
        } else {
            return Response::json(["error" => "User Not found"], 401);
        }
    }

    // public function respondWithToken($token)
    // {
    //     return response()->json([
    //         "access_token" => $token,
    //         'token_type'=>'bearer',
    //         'expires_in' => auth('api')->factory()->getTTL()*60
    //     ]);
    // }
}