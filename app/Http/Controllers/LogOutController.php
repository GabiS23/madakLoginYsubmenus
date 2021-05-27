<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LogOutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cerrar_sesion(Request $request){
       //Desconctamos al usuario
       Auth::logout();
       return view('contenedor/visita/inicio');
    }
    protected function guard()
    {
        return Auth::guard();
    }
    
}
