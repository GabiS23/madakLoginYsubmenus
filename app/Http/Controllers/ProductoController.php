<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
class ProductoController extends Controller
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
   
    // public function proforma_index()
    // {
    //     return view('contenedor/admin/proforma');
    // }
    public function producto_index()
    {
        //$arduinos= arduino::all(); 
        $proforma= DB::select("select 
                                p.id_producto,
                                p.fecha,
                                p.cantidad::integer as stock,
                                p.nombre_producto,
                                cat.nombre_categoria,
                                --m.nombre_modelo,
                                mar.nombre_marca,
                                p.precio_venta,
                                mon.codigo_moneda,
                                1::integer cantidad_compra,
                                false as bandera_compra,
                                p.codigo_producto,
                                alm.nombre_almacen,
                                p.precio_mayor
                                from pro.tproducto p
                                join pro.tcategoria cat on cat.id_categoria=p.id_categoria
                                --join pro.tmodelo m on m.id_modelo=p.id_modelo
                                join pro.tmarca mar on mar.id_marca=p.id_marca
                                join pro.tmoneda mon on mon.id_moneda=p.id_moneda
                                join pro.talmacen alm on alm.id_almacen=p.id_almacen
                                join pro.tsucursal su on su.id_sucursal=alm.id_sucursal
                                where su.id_sucursal in (
                                    select us.id_sucursal
                                    from pro.tusuario_sucursal us
                                    join segu.users u on u.id=us.id_usuario
                                    where u.id=?)
                                order by p.id_producto asc
                                ",[auth()->id()]); 
        $arrayParametros = array(
                       'proforma' => $proforma

                       );
        return view ('contenedor/admin/producto',$arrayParametros);
    }
}
