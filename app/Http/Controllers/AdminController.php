<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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
    public function inicioAdmin_index()
    {
        return view('contenedor/admin/inicioAdmin');
    }
    public function inventario_index()
    {
        return view('contenedor/admin/inventario');
    }
    public function usuarios_index()
    {
        return view('contenedor/admin/usuarios');
    }
    
}
