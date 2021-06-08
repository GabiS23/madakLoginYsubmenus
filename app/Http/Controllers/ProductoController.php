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
    public function producto_index()
    {
        //$arduinos= arduino::all(); 
        $lista_producto= DB::select("select 
                                p.id_producto,
                                p.fecha,
                                p.cantidad::integer as stock,
                                p.nombre_producto,
                                cat.nombre_categoria,
                                --m.nombre_modelo,
                                mar.nombre_marca,
                                p.descripcion,
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
                        'lista_producto' => $lista_producto
                       );
        return view ('contenedor/admin/producto',$arrayParametros);
    }
    public function form_nuevo()
    {
        $lista_errores = array();
        $lista_marca=DB::select("select m.id_marca, m.nombre_marca from pro.tmarca m");
        $lista_categoria=DB::select("select c.id_categoria, c.nombre_categoria from pro.tcategoria c");
        $lista_departamento=DB::select("select d.id_departamento, d.nombre_departamento from pro.tdepartamento d");
        $lista_sucursal=DB::select("select s.id_sucursal, s.nombre_sucursal from pro.tsucursal s");
        $lista_moneda=DB::select("select id_moneda, codigo_moneda from pro.tmoneda");
        $lista_almacen=DB::select("select a.id_almacen, a.nombre_almacen from pro.talmacen a");
        $lista_gestion=DB::select("select g.id_gestion, g.nombre_gestion from pro.tgestion g");

        $arrayParametros = array(
            'lista_marca'=>$lista_marca,
            'lista_categoria'=>$lista_categoria,
            'lista_departamento'=>$lista_departamento,
            'lista_sucursal'=>$lista_sucursal,
            'lista_moneda'=>$lista_moneda,
            'lista_almacen'=>$lista_almacen,
            'lista_gestion'=>$lista_gestion,
            'lista_errores'=>$lista_errores,

            'id_gestion'=>0,
            'codigo_producto'=>"",
            'nombre_producto'=>"",
            'descripcion'=>"",
            'id_sucursal'=>0,
            'id_moneda'=>0,
            'precio_venta'=>"",
            'precio_mayor'=>"",
            'cantidad'=>"",
            'id_marca'=>0,
            'id_categoria'=>0,
            'id_departamento'=>0,
            'fecha'=>"",
            'precio_compra'=>"",
            'id_almacen'=>0,
            'validacion_correcta'=>0,
            'ficha_tecnica'=>"",
            'accesorios'=>""
           );

        return view('contenedor/admin/form_nuevo',$arrayParametros);
        
    }
    public function form_editar()
    {
        return view('contenedor/admin/form_editar');
    }
    public function nuevo_producto(Request $request)
    {
        $validar_productos=$this->validacion_producto($request);
        $validacion_correcta=0;
        
        $lista_marca=DB::select("select m.id_marca, m.nombre_marca from pro.tmarca m");
        $lista_categoria=DB::select("select c.id_categoria, c.nombre_categoria from pro.tcategoria c");
        $lista_departamento=DB::select("select d.id_departamento, d.nombre_departamento from pro.tdepartamento d");
        $lista_sucursal=DB::select("select s.id_sucursal, s.nombre_sucursal from pro.tsucursal s");
        $lista_almacen=DB::select("select a.id_almacen, a.nombre_almacen from pro.talmacen a");
        $lista_gestion=DB::select("select g.id_gestion, g.nombre_gestion from pro.tgestion g");
        $lista_moneda=DB::select("select id_moneda, codigo_moneda from pro.tmoneda");

        if(count($validar_productos)==0){
            $lista_errores = array();
            $validacion_correcta=1;
            $agregar_producto=DB::insert("insert into pro.tproducto(
                                    codigo_producto, 
                                    precio_compra,
                                    precio_venta, 
                                    cantidad, 
                                    fecha, 
                                    hora, 
                                    id_usuario, 
                                    nombre_producto, 
                                    precio_mayor,
                                    descripcion, 
                                    id_almacen, 
                                    id_marca, 
                                    id_categoria, 
                                    id_moneda,
                                    id_gestion,
                                    ficha_tecnica,
                                    accesorios)
                                    values (?, ?::numeric, ?::numeric, ?, now()::date, now()::time, ?, ?, ?::numeric, ?, ?, ?, ?, ?, ?,?,?)",
                                    [$request->codigo_producto,$request->precio_compra,$request->precio_venta,$request->cantidad,
                                    auth()->id(),$request->nombre_producto,$request->precio_mayor,
                                    $request->descripcion,$request->id_almacen,$request->id_marca,$request->id_categoria,$request->id_moneda,$request->id_gestion,$request->ficha_tecnica,$request->accesorios]);
            // dd($request->id_marca.'-'.$request->id_categoria.'-'.$request->id_sucursal);
            $arrayParametros = array(
            'lista_marca'=>$lista_marca,
            'lista_categoria'=>$lista_categoria,
            'lista_departamento'=>$lista_departamento,
            'lista_sucursal'=>$lista_sucursal,
            'lista_moneda'=>$lista_moneda,
            'lista_almacen'=>$lista_almacen,
            'lista_gestion'=>$lista_gestion,
            'lista_errores'=>$lista_errores,

            'id_gestion'=>0,
            'codigo_producto'=>"",
            'nombre_producto'=>"",
            'descripcion'=>"",
            'id_sucursal'=>0,
            'id_moneda'=>0,
            'precio_venta'=>"",
            'precio_mayor'=>"",
            'cantidad'=>"",
            'id_marca'=>0,
            'id_categoria'=>0,
            'id_departamento'=>0,
            'precio_compra'=>"",
            'id_almacen'=>0,
            'ficha_tecnica'=>"",
            'accesorios'=>"",
            'validacion_correcta'=>$validacion_correcta
           ); 
        }
        else{
            $arrayParametros = array(
                'lista_marca'=>$lista_marca,
                'lista_categoria'=>$lista_categoria,
                'lista_departamento'=>$lista_departamento,
                'lista_sucursal'=>$lista_sucursal,
                'lista_almacen'=>$lista_almacen,
                'lista_gestion'=>$lista_gestion,
                'lista_moneda'=>$lista_moneda,
                'lista_errores'=>$validar_productos,
    
                'id_gestion'=>$request->id_gestion,
                //para que en las vistas no se pierda lo que selleno en el formulario se debe utilizar el request con el nombre del atributo el request captura los imputs de las vistas
                'codigo_producto'=>$request->codigo_producto,
                'nombre_producto'=>$request->nombre_producto,
                'descripcion'=>$request->descripcion,
                'id_sucursal'=>$request->id_sucursal,
                'id_moneda'=>$request->id_moneda,
                'precio_venta'=>$request->precio_venta,
                'precio_mayor'=>$request->precio_mayor,
                'cantidad'=>$request->cantidad,
                'id_marca'=>$request->id_marca,
                'id_categoria'=>$request->id_categoria,
                'id_departamento'=>$request->id_departamento,
                'precio_compra'=>$request->precio_compra,
                'id_almacen'=>$request->id_almacen,
                'ficha_tecnica'=>$request->ficha_tecnica,
                'accesorios'=>$request->accesorios,
                'validacion_correcta'=>$validacion_correcta
                //controlar dos rutas form_nuevo y agregar_producto
               );
            
        }
        return view('contenedor/admin/form_nuevo',$arrayParametros);
    }
    public function insertar_imagen($request){
        
        $image = $request->file('foto'); //capturamos el imput imagen
        $nombre_imagen=$image->getClientOriginalName();  //recupeamos el nombre y extencion de la imagen
        $image->move('imagenes/productos', $image->getClientOriginalName());  //movemos el archivo a una ruta
        // dd($nombre_imagen);
        // $nombre_tabla->imagen = image->getClientOriginalName();
        return $nombre_imagen;
    }
    public function validacion_producto(Request $request){
        //en el request estan todos los imputs de la vista
        $lista_errores = array();
        if($request->id_gestion==0){
            array_push($lista_errores, "Debe seleccionar una gestion");
        }
        if($request->codigo_producto==""){
            array_push($lista_errores, "Debe introducir el codigo de producto");
        }
        if($request->nombre_producto==""){
            array_push($lista_errores, "Debe introducir el nombre de producto");
        }
        if($request->id_departamento==0){
            array_push($lista_errores, "Debe seleccionar un departamento");
        }
        if($request->precio_compra==""){
            array_push($lista_errores, "Debe introducir el precio de compra");
        }
        if($request->id_almacen==0){
            array_push($lista_errores, "Debe seleccionar un almacen");
        }
        if($request->cantidad==""){
            array_push($lista_errores, "Debe introducir una cantidad");
        }
        if($request->id_marca==0){
            array_push($lista_errores, "Debe seleccionar una marca");
        }
        if($request->id_categoria==0){
            array_push($lista_errores, "Debe seleccionar una categoria");
        }
        if($request->id_sucursal==0){
            array_push($lista_errores, "Debe seleccionar una sucursal");
        }
        if($request->id_moneda==0){
            array_push($lista_errores, "Debe seleccionar el tipo de moneda");
        }
        if($request->precio_venta==""){
            array_push($lista_errores, "Debe introducir el precio venta por menor");
        }
        if($request->precio_mayor==""){
            array_push($lista_errores, "Debe introducir el precio venta por mayor");
        }
        // dd(count($lista_errores));
        $codigo_duplicado=DB::select("select 
                                    COUNT(codigo_producto)as cantidad_codigo 
                                    from pro.tproducto
                                    where codigo_producto = ?",
                                    [$request->codigo_producto]);
        // dd($codigo_duplicado[0]->cantidad_codigo);
        if(($codigo_duplicado[0]->cantidad_codigo)>0){
            array_push($lista_errores, "Codigo de producto ya registrado");
        };  
        $nombre_duplicado=DB::select("select 
                                    COUNT(nombre_producto)as cantidad_producto 
                                    from pro.tproducto
                                    where nombre_producto = ?",
                                    [$request->nombre_producto]);
        if(($nombre_duplicado[0]->cantidad_producto)>0){
            array_push($lista_errores, "Nombre de producto ya registrado");
        }; 
   
        return $lista_errores;
    }
    public function cargar_sucursal(Request $request){
        //request son parametros que recibe de la vista
        // return $request['dato']['id_departamento'];
        $lista_sucursal=DB::select("select s.id_sucursal, s.nombre_sucursal from pro.tsucursal s where id_departamento=?::integer",
        [$request['dato']['id_departamento']]);
        $arrayParametros = array(
            'lista_sucursal'=>$lista_sucursal
        );
        return  $arrayParametros;
    }
    public function cargar_almacen(Request $request){
        // return $request['dato']['id_sucursal'];
        $lista_almacen=DB::select("select a.id_almacen, a.nombre_almacen from pro.talmacen a where id_sucursal=?::integer",
        [$request['dato']['id_sucursal']]);
        $arrayParametros = array(
            'lista_almacen'=>$lista_almacen
        );
        return  $arrayParametros;
    }
    public function eliminar_producto(Request $request){
        //el dd no funciona en ajax
        // return ($request->dato["id_producto"]);
        $cantidad_producto=DB::select("select count(*) as cantidad_proformas from pro.tproforma
                                        where id_producto=?",
                                        [$request->dato["id_producto"]]);
        if(($cantidad_producto[0]->cantidad_proformas)>0){
            return "Error!! El producto tiene proformas generadas";
        }
        else{
        DB::delete("delete from pro.tproducto
                    WHERE id_producto=?",
                    [$request->dato["id_producto"]]);
        return "";
        }
    }
    public function imagen_producto($id){
        $lista_imagen= DB::select("select 
                                    id_imagen_producto, 
                                    mostrar_catalogo, 
                                    foto, 
                                    id_producto
                                    FROM pro.timagen_producto 
                                    where id_producto=?",[$id]);
        $arrayParametros = array(
                                'lista_imagen' => $lista_imagen,
                                'id_producto'=>$id
                                );
        return view('contenedor/admin/imagen_producto',$arrayParametros);
    }
    public function nuevo_imagen_producto(Request $request){
        //la insercion de imagenes
        $lista_errores=array();
        $imagen_duplicada=DB::select("select 
                                    COUNT(*)as cantidad_imagen 
                                    from pro.timagen_producto
                                    where foto = ?",
                                    [$request->file('foto')->getClientOriginalName()]);
        if(($imagen_duplicada[0]->cantidad_imagen)>0){
            array_push($lista_errores, "Imagen ya registrada");
        }else{
            $insertar_imagen=$this->insertar_imagen($request);

            DB::insert("insert into pro.timagen_producto(mostrar_catalogo, 
                    foto, 
                    id_producto)values (?,?,?)",
                    [$request->mostrar_catalogo,$request->file('foto')->getClientOriginalName(),$request->id_producto]);
        }  
        
         return redirect()->route('imagen_producto', ['id' => $request->id_producto]);
        //return view('contenedor/admin/imagen_producto',$arrayParametros);
    }
}
