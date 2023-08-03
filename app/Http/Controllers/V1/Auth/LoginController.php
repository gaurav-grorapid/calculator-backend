<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function handle(Request $request)
    {   
        return $this->loginService->handle($request->all());

    }
}