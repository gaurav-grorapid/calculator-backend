<?php

namespace App\Http\Controllers\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\RegisterService;

class RegisterController extends Controller
{

    public function __construct(RegisterService $registerService){
        $this->registerService = $registerService;
    }
    /**
     * Handle a registration attempt.
     *
     * @api POST /api/register 
     * @see {}
     */

     
    public function handle(Request $request){
        Log::info("hello world");
        $this->validate($request,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        Log::info("23");
        $user = $this->registerService->createUser($request->all());

        return response()->json($user,201);
        
    }
}
