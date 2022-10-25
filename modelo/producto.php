<?php 
include("../../controlador/config.php");

class Producto {
    public $id;
    public $nombre;
    public $categoria;
    public $descripcion;
    public $almacen;    
    public $foto;
    public $precio;
    public $estado;

    function __construct($id, $nombre,$categoria, $descripcion , $almacen, $foto,  $precio, $estado ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->descripcion = $descripcion; 
        $this->almacen = $almacen;  
        $this->foto = $foto;
        $this->precio= $precio;
        $this->estado = $estado;   
    }

    public static function listar() {
        global $link;
        $productos = [];
        $consulta  = ("SELECT P.* ,C.nombre nombreCategoria, C.descripcion descripcionCategoria FROM mor_producto P INNER JOIN mor_categoria C ON P.idCategoria = C.idCategoria  ");
        $resultado = mysqli_query($link, $consulta);

        while ($valor = mysqli_fetch_assoc($resultado)){ 
            $categoria = new Categoria(
                $valor ['idCategoria'], 
                $valor['nombreCategoria'] , 
                $valor['descripcionCategoria']);
            $productos[] = new Producto(
                $valor['idProducto'], 
                $valor['nombre'], 
                $categoria ,
                $valor['descripcion'], 
                $valor['idAlmacen'], 
                $valor['foto'], 
                $valor['precio'],
                $valor['estado']);
        }

        return $productos;
    }

    public static function agregar($nombre,$categoria, $descripcion ,$almacen, $ruta, $precio, $estado){
        global $link; 
        $consulta = ("INSERT INTO mor_producto(
            nombre,
            idCategoria,
            descripcion,
            idAlmacen,
            foto,
            precio,
            estado
        )
        VALUES (
            '" . $nombre . "',
            '" . $categoria . "',
            '" . $descripcion . "',
            '" . $almacen . "',
            '" . $ruta . "',
            '" . $precio . "',
            " . $estado . "
        )");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }

    public static function editar($id,$nombre,$categoria, $descripcion , $almacen, $ruta, $precio, $estado) {
        global $link; 
        $consulta = ("UPDATE mor_producto
            SET
            nombre           = '" . $nombre . "',
            idCategoria      = '" . $categoria . "',
            descripcion      = '" . $descripcion .   "',
            idAlmacen        = '" . $almacen . "',
            foto             = '" . $ruta . "',
            precio           = '" . $precio . "',
            estado           = " . $estado . "
            WHERE idProducto = '" . $id . "'
        ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
    
    public static function eliminar($id) {
        global $link; 
        $consulta = ("DELETE FROM mor_producto WHERE idProducto= '" . $id . "' ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
}
?>
