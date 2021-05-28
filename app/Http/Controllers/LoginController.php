<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // $this->middleware('auth'); if si esta logeado 

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        $arrayParametros = array(
            'error' => 'no'
            );
        return view('contenedor/login/iniciar_sesion',$arrayParametros);
    }
    public function iniciar_sesion(Request $request)
    {
        // dd($request->input('email'));
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $arrayParametros = array(
                'error' => 'no'
                );
            return view('contenedor/admin/inicioAdmin',$arrayParametros);
        }else{
            $arrayParametros = array(
                'error' => 'si'
                );
            return view('contenedor/login/iniciar_sesion',$arrayParametros); 
        }
    }
}
