<?php

include("config.php");
include("../../modelo/producto.php");
include("../../modelo/categoria.php");

class ProductoControlador {

    public static function listar() {
        $productos = Producto::listar(); 
        $categorias = Categoria::listar();
        
        include("../../vista/productos/includes/tabla.php");
    }

    public static function agregar() {
        $nombre      = $_REQUEST['nombre'];
        $idCategoria = $_REQUEST['idCategoria'];
        $descripcion = $_REQUEST['descripcion'];
        $precio      = $_REQUEST['precio'];
        $estado      = $_REQUEST['estado'];
        
        $nombre_imagen=$_FILES['foto']['name'];
        $temporal=$_FILES['foto']['tmp_name'];
        $carpeta='../../img';
        $ruta=$carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        Producto::agregar(
            $nombre,
            $idCategoria,
            $descripcion,
            1,
            $ruta, 
            $precio,
            $estado
        );

        header("location:../../vista/productos");
    }

    public static function editar() {
        $idProducto  = $_REQUEST['idProducto'];
        $nombre      = $_REQUEST['nombre'];
        $idCategoria = $_REQUEST['idCategoria'];
        $descripcion = $_REQUEST['descripcion'];
        $precio      = $_REQUEST['precio'];
        $estado      = $_REQUEST['estado'];
        
        $nombre_imagen=$_FILES['foto']['name'];

        if($nombre_imagen ==''){
            $productos = Producto::listar();
            foreach($productos as $producto){
                if ($producto->id == $idProducto) {
                $ruta = $producto->foto;
                }
            }
        }
        else{
            $temporal=$_FILES['foto']['tmp_name'];
            $carpeta='../../img';
            $ruta=$carpeta.'/'.$nombre_imagen;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }
        Producto::editar(
            $idProducto, 
            $nombre,
            $idCategoria,
            $descripcion, 
            1,
            $ruta,
            $precio,
            $estado
        );

        header("location:../../vista/productos");
    }

    public static function eliminar() {
        $idProducto = $_REQUEST['idProducto'];

        Producto::eliminar($idProducto);
        
        header("location:../../vista/productos");
    }
}
?>
