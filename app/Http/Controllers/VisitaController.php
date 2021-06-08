<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function lista_categorias()
    {
        $lista_categoria=DB::select("select c.id_categoria, c.nombre_categoria from pro.tcategoria c");
        $arrayParametros= array(
            'lista_categoria'=>$lista_categoria
        );
        return $arrayParametros;
    }
    public function inicio_index()
    {
        $lista_categoria=DB::select("select c.id_categoria, c.nombre_categoria from pro.tcategoria c");
        $arrayParametros= array(
            'lista_categoria'=>$lista_categoria
        );
        return view('contenedor/visita/inicio',$arrayParametros);
    }
    public function contacto_index()
    {
        return view('contenedor/visita/contacto');
    }
    public function quienesomos_index()
    {
        return view('contenedor/visita/quienes_somos');
    }
    public function producto_visita()
    {
        $lista_productos= DB::select ("select 
                                        p.id_producto,
                                        c.nombre_categoria, 
                                        p.nombre_producto, 
                                        p.precio_venta, 
                                        p.descripcion,
                                        m.codigo_moneda,
                                        ip.foto
                                        from pro.tproducto p 
                                        join pro.tcategoria c on c.id_categoria=p.id_categoria
                                        join pro.tmoneda m on m.id_moneda=p.id_moneda
                                        join pro.timagen_producto ip on ip.id_producto=p.id_producto and ip.mostrar_catalogo=?",
                                        ["si"]);
        $arrayParametros = array(
                                'lista_producto' => $lista_productos
                                );
        return view('contenedor/visita/productos',$arrayParametros);
    }
    public function producto_detalle($id){

        $lista_productos= DB::select ("select 
                                        p.id_producto,
                                        c.nombre_categoria, 
                                        p.nombre_producto, 
                                        p.precio_venta, 
                                        p.descripcion,
                                        m.codigo_moneda,
                                        p.ficha_tecnica,
                                        p.accesorios
                                        from pro.tproducto p 
                                        join pro.tcategoria c on c.id_categoria=p.id_categoria
                                        join pro.tmoneda m on m.id_moneda=p.id_moneda
                                        where p.id_producto=?",
                                        [$id]);
        $lista_imagen_producto= DB::select ("select 
                                        ip.foto
                                        from pro.timagen_producto ip 
                                        where ip.id_producto=?",
                                        [$id]);
        $arrayParametros = array(
                                'lista_producto' => $lista_productos,
                                'lista_imagen_producto'=>$lista_imagen_producto
                                );
        return view ('contenedor/visita/producto_detalle',$arrayParametros);
    }
}
