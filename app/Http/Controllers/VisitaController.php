<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function inicio_index()
    {
        return view('contenedor/visita/inicio');
    }
    public function contacto_index()
    {
        return view('contenedor/visita/contacto');
    }
    public function quienesomos_index()
    {
        return view('contenedor/visita/quienes_somos');
    }
    public function producto_index()
    {
        return view('contenedor/visita/productos');
    }
    
}
