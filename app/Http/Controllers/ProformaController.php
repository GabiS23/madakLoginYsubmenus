<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Auth;
class ProformaController extends Controller
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
   
    // public function proforma_index()
    // {
    //     return view('contenedor/admin/proforma');
    // }
    public function proforma_index(){
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
                                // dd($proforma);
         $ultimos_clientes =DB::select("select dp.id_detalle_proforma,c.nombre_completo,c.ci,dp.fecha,dp.nro_proforma 
                                from pro.tcliente c 
                                join pro.tdetalle_proforma dp on dp.id_cliente=c.id_cliente
                                order by dp.nro_proforma desc");
        $usuario_rol=DB::select("select r.nombre_rol from segu.users u 
        join segu.trol r on r.id_rol=u.id_rol
        where u.id=?
        ",[auth()->id()]);
        // dd($usuario_rol[0]->nombre_rol);
        $arrayParametros = array(
                       'id_detalle_proforma' => 0,
                       'proforma' => $proforma,
                       'ultimos_clientes' =>$ultimos_clientes,
                       'rol'=>$usuario_rol[0]->nombre_rol
                       );
        return view ('contenedor/admin/proforma',$arrayParametros);
    }
    public function producto_busqueda(Request $request){
        //$arduinos= arduino::all();
       // return 'llega al controlador '.$request->nombre;
        if($request->nombre){
            $proforma= DB::select("select 
                                    p.id_producto,
                                    p.fecha,
                                    p.cantidad::integer as stock,
                                    p.nombre_producto,
                                    cat.nombre_categoria,
                                    --m.nombre_modelo,
                                    mar.nombre_marca,
                                    p.precio_venta,
                                'pre_'||p.id_producto as precio_get,
                                'cant_'||p.id_producto as cantidad_get,
                                'check_'||p.id_producto as checkcompra_get,
                                'prema_'||p.id_producto as precio_mayor_get,
                                    mon.codigo_moneda,
                                    p.codigo_producto,
                                    alm.nombre_almacen,
                                    p.precio_mayor
                                    from pro.tproducto p
                                    join pro.tcategoria cat on cat.id_categoria=p.id_categoria
                                    --join pro.tmodelo m on m.id_modelo=p.id_modelo
                                    join pro.tmarca mar on mar.id_marca=p.id_marca
                                    join pro.tmoneda mon on mon.id_moneda=p.id_moneda
                                    join pro.talmacen alm on alm.id_almacen=p.id_almacen
                                    where upper(p.nombre_producto) like upper(?)
                                    order by p.id_producto asc
                                    ",["%".$request->nombre."%"]);
        }
        else{
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
                                    p.codigo_producto,
                                    alm.nombre_almacen,
                                    p.precio_mayor
                                    from pro.tproducto p
                                    join pro.tcategoria cat on cat.id_categoria=p.id_categoria
                                    --join pro.tmodelo m on m.id_modelo=p.id_modelo
                                    join pro.tmarca mar on mar.id_marca=p.id_marca
                                    join pro.tmoneda mon on mon.id_moneda=p.id_moneda
                                    join pro.talmacen alm on alm.id_almacen=p.id_almacen
                                    order by p.id_producto asc
                                    ");
        }


        //dd(compact('proforma'));
        return compact('proforma');
    }
    public function guardar_proforma(Request $request){
        

        //dd($request->tipo_precio);

        DB::beginTransaction();
        $proforma= DB::select("select 
                                p.id_producto,
                                p.fecha,
                                p.cantidad::integer as stock,
                                p.nombre_producto,
                                cat.nombre_categoria,
                                --m.nombre_modelo,
                                mar.nombre_marca,
                                p.precio_venta,
                                'pre_'||p.id_producto as precio_get,
                                'prema_'||p.id_producto as precio_mayor_get,
                                'cant_'||p.id_producto as cantidad_get,
                                'check_'||p.id_producto as checkcompra_get,
                                mon.codigo_moneda,
                                mon.id_moneda,
                                p.codigo_producto,
                                alm.nombre_almacen,
                                p.precio_mayor
                                from pro.tproducto p
                                join pro.tcategoria cat on cat.id_categoria=p.id_categoria
                                --join pro.tmodelo m on m.id_modelo=p.id_modelo
                                join pro.tmarca mar on mar.id_marca=p.id_marca
                                join pro.tmoneda mon on mon.id_moneda=p.id_moneda
                                join pro.talmacen alm on alm.id_almacen=p.id_almacen
                                order by p.id_producto asc
                                ");
         $ultimos_clientes =DB::select("select dp.id_detalle_proforma,c.nombre_completo,c.ci,dp.fecha,dp.nro_proforma 
                                from pro.tcliente c 
                                join pro.tdetalle_proforma dp on dp.id_cliente=c.id_cliente
                                order by dp.nro_proforma desc
                                limit 3");
        $parametros=DB::select("
                                with NumProforma as(
                                select p.nro_proforma 
                                from pro.tdetalle_proforma p 
                                order by p.nro_proforma desc limit 1
                                )
                                select 
                                COALESCE( sum(nro_proforma),0)+1 as nro_proforma,
                                now()::date as fecha_actual,
                                (select g.id_gestion from pro.tgestion g where g.nombre_gestion::INTEGER = EXTRACT(year from now()::date)) as id_gestion,
                                ( EXTRACT(HOUR FROM  now())||':'|| EXTRACT(MINUTE FROM  now())||':'|| EXTRACT(SECOND FROM  now()))::TIME AS hora
                                from NumProforma p
                                ");

        //dd($nro_proforma[0]->nro_proforma);

        $existe_cliente=DB::select("select c.id_cliente as id_cliente from pro.tcliente c where trim(c.ci)=?",[$request->ci]);
        
        if($existe_cliente){

             $id_cliente=DB::select("select c.id_cliente from pro.tcliente c where trim(c.ci)=?",[$request->ci]);
        }   
        else{
            DB::insert("
            insert into pro.tcliente   
            (nombre_completo,ci,celular_telefono,direccion_cliente)
            values(?,?,?,?);
            ",
            [$request->nombre_completo,$request->ci,$request->celular_telefono,$request->direccion_cliente] );
            $id_cliente=DB::select("select max(id_cliente)::integer as id_cliente from pro.tcliente");
            DB::commit();
        }

        $bandera=0;
        $id_detalle_proforma;
        $id_detalle=0;
        foreach ($proforma as $p) {
            if($request->input($p->checkcompra_get)){
                    $bandera++;
                    if($bandera==1){
                            DB::insert("
                            insert into pro.tdetalle_proforma   
                            (id_cliente,id_gestion,fecha,hora,nro_proforma,id_moneda,tipo_precio,id_usuario)
                            values(?,?,?,?,?,?,?,?);",
                            [$id_cliente[0]->id_cliente,$parametros[0]->id_gestion,$parametros[0]->fecha_actual,$parametros[0]->hora,$parametros[0]->nro_proforma,1,$request->tipo_precio,Auth::user()->id] );
                            DB::commit();
                            $id_detalle_proforma=DB::select("select max(id_detalle_proforma)::integer as id_detalle_proforma from pro.tdetalle_proforma");
                            $id_detalle=$id_detalle_proforma[0]->id_detalle_proforma;
                    }

                    $precio_venta=0;
                    if($request->tipo_precio=='mayor'){
                        $precio_venta=$request->input($p->precio_mayor_get);
                    }
                    if($request->tipo_precio=='menor'){
                        $precio_venta=$request->input($p->precio_get);
                    }

                    DB::insert("
                    insert into pro.tproforma   
                    (id_producto,precio_venta,cantidad,id_detalle_proforma)
                    values(?,?,?,?);
                    ",
                    [$p->id_producto,$precio_venta,$request->input($p->cantidad_get),$id_detalle_proforma[0]->id_detalle_proforma ] );
                    DB::commit();
            }   
        }
        $arrayParametros = array(
               'id_detalle_proforma' => $id_detalle,
               'proforma' => $proforma,
               'ultimos_clientes' => $ultimos_clientes
               );

        return redirect()->route('proforma_index' ,$arrayParametros);
    }
    public function pdfproforma (Request $request){

        //dd($request->codigo_moneda);

        if($request->codigo_moneda=='BS'){
            $cabecera= DB::select("select dp.id_detalle_proforma,dp.nro_proforma,dp.fecha,emp.rubro,emp.direccion,emp.telefono,emp.celular,emp.direccion_general,
                c.nombre_completo,c.celular_telefono,emp.ruta_logo,c.direccion_cliente,'BS' as codigo_moneda
                from pro.tdetalle_proforma dp
                join pro.tcliente c on c.id_cliente=dp.id_cliente
                left join pro.tsucursal emp on emp.id_sucursal=1
                where dp.id_detalle_proforma=?",[$request->id_detalle_proforma]);

            $detalle= DB::select("with moneda as(
                                    SELECT 
                                    m.id_moneda,
                                    m.codigo_moneda,
                                    m.moneda,
                                    vm.fecha ,
                                    vm.compra,
                                    vm.venta
                                    FROM pro.tmoneda m
                                    JOIN PRO.tvalor_moneda vm on vm.id_moneda=m.id_moneda
                                    where m.codigo_moneda='USD')
                select 
                dp.id_detalle_proforma,p.cantidad,mar.nombre_marca,
                (case when m.codigo_moneda='USD' THEN (p.precio_venta*m2.venta)  ELSE p.precio_venta END)::numeric as precio_venta,
                (case when m.codigo_moneda='USD' THEN (p.precio_venta*m2.venta) * p.cantidad ELSE (p.precio_venta * p.cantidad) END)::numeric as total,
                pr.nombre_producto 
                from pro.tproforma p
                join pro.tproducto pr on pr.id_producto=p.id_producto
                join pro.tcategoria cat on cat.id_categoria=pr.id_categoria
                --join pro.tmodelo mode on mode.id_modelo=pr.id_modelo
                join pro.tmarca mar on mar.id_marca=pr.id_marca
                join pro.tdetalle_proforma dp on dp.id_detalle_proforma=p.id_detalle_proforma

                join pro.tmoneda m on m.id_moneda=pr.id_moneda
                left join pro.tvalor_moneda m2 on m2.fecha=pr.fecha
                where dp.id_detalle_proforma=?",[$request->id_detalle_proforma]);
        }else{//USD
            $cabecera= DB::select("select dp.id_detalle_proforma,dp.nro_proforma,dp.fecha,emp.rubro,emp.direccion,emp.telefono,emp.celular,emp.direccion_general,
                c.nombre_completo,c.celular_telefono,emp.ruta_logo,c.direccion_cliente,'USD' as codigo_moneda
                from pro.tdetalle_proforma dp
                join pro.tcliente c on c.id_cliente=dp.id_cliente
                left join pro.tsucursal emp on emp.id_sucursal=1
                where dp.id_detalle_proforma=?",[$request->id_detalle_proforma]);

            $detalle= DB::select("with moneda as(
                                    SELECT 
                                    m.id_moneda,
                                    m.codigo_moneda,
                                    m.moneda,
                                    vm.fecha ,
                                    vm.compra,
                                    vm.venta
                                    FROM pro.tmoneda m
                                    JOIN PRO.tvalor_moneda vm on vm.id_moneda=m.id_moneda
                                    where m.codigo_moneda='USD')
                select 
                  dp.id_detalle_proforma,p.cantidad,mar.nombre_marca,
                  (case when m.codigo_moneda='USD' THEN p.precio_venta ELSE (p.precio_venta/m2.venta) END)::numeric as precio_venta,
                  (case when m.codigo_moneda='USD' THEN p.precio_venta* p.cantidad ELSE((p.precio_venta/m2.venta) * p.cantidad) END)::numeric as total,
                  pr.nombre_producto 
                  from pro.tproforma p
                  join pro.tproducto pr on pr.id_producto=p.id_producto
                  join pro.tcategoria cat on cat.id_categoria=pr.id_categoria
                  --join pro.tmodelo mode on mode.id_modelo=pr.id_modelo
                  join pro.tmarca mar on mar.id_marca=pr.id_marca
                  join pro.tdetalle_proforma dp on dp.id_detalle_proforma=p.id_detalle_proforma
                  join pro.tmoneda m on m.id_moneda=pr.id_moneda
                  left join moneda m2 on m2.fecha=pr.fecha
                  where dp.id_detalle_proforma=?",[$request->id_detalle_proforma]);
        }

         $ultimos_clientes =DB::select("select dp.id_detalle_proforma,c.nombre_completo,c.ci,dp.fecha,dp.nro_proforma 
                                from pro.tcliente c 
                                join pro.tdetalle_proforma dp on dp.id_cliente=c.id_cliente
                                where c.id_cliente=29 
                                order by dp.nro_proforma desc
                                limit 3");

        $arrayParametros = array(
                           'nro_proforma'=>$cabecera[0]->nro_proforma,
                           'fecha'=>$cabecera[0]->fecha,
                           'rubro'=>$cabecera[0]->rubro,
                           'direccion'=>$cabecera[0]->direccion,
                           'telefono'=>$cabecera[0]->telefono,
                           'celular'=>$cabecera[0]->celular,
                           'direccion_general'=>$cabecera[0]->direccion_general,
                           'nombre_completo'=>$cabecera[0]->nombre_completo,
                           'celular_telefono'=>$cabecera[0]->celular_telefono,
                           'ruta_logo'=>$cabecera[0]->ruta_logo,
                           'ruta_logo'=>$cabecera[0]->ruta_logo,
                           'direccion_cliente'=>$cabecera[0]->direccion_cliente,
                           'codigo_moneda'=>$cabecera[0]->codigo_moneda,

                           'detalle'=>$detalle
                           );
        if($request->id_detalle_proforma!=0){
            view()->share($arrayParametros);
            if($request->has('download')){
                $pdf = PDF::loadView('contenedor/admin/reportes/pdfproforma');

                //return $pdf->download('proforma.pdf'); --Descargar el archivo 
                return $pdf->stream('proforma.pdf'); //se visualiza el archivo 
            }

            return view('contenedor/admin/reportes/pdfproforma');
        }
        else{
            $arrayParametros = array(
                           'id_detalle_proforma' => 0,
                           'ultimos_clientes' => $ultimos_clientes
                           );
            return view ('contenedor/admin/reportes/pdfproforma',compact('cabecera'),compact('detalle')); 
        }
        
    }
    function cliente_busqueda(Request $request){
        // return $request->dato['ci'];
        if($request->dato['ci']){
            $clientes =DB::select(" select 
                                    c.ci,
                                    c.nombre_completo,
                                    c.celular_telefono,
                                    c.direccion_cliente
                                    from pro.tcliente c 
                                    where c.ci like upper(?)
                                    order by c.ci asc",["%".$request->dato['ci']."%"]);
        }else{
            $clientes =DB::select(" select 
                                    c.ci,
                                    c.nombre_completo,
                                    c.celular_telefono,
                                    c.direccion_cliente
                                    from pro.tcliente c 
                                    order by c.ci asc limit 0");
        }
        return compact('clientes');
    }
}
