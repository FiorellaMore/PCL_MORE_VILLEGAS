<?php


include("../../controlador/config.php");
include("../../modelo/producto.php");
include("../../modelo/empleado.php");
include("../../modelo/venta.php");
include("../../modelo/detalleVenta.php");
include("../../modelo/categoria.php");


class detalleVentaControlador{

    public static function listar() {

        $ventas         = Venta::listar();
        $detalleVentas  = detalleVenta::listar();
        $categorias     = Categoria::listar();
        $empleados      = Empleado::listar();
        $productos      = Producto::listar();

        include("../../vista/detalleVentas/includes/tabla.php");
    }

    public static function agregar() {
        $idVenta             = $_REQUEST['idVenta'];
        $idProducto 	     = $_REQUEST['idProducto'];
        $fechaVenta          = $_REQUEST['fechaVenta'];
        $cantidad            = $_REQUEST['cantidad'];
        $precio              = $_REQUEST['precio'];
        $subtotal 	         = $_REQUEST['subtotal'];
        
        detalleVenta::agregar($idVenta, $idProducto, $fechaVenta, $cantidad,$precio, $subtotal);
        
        header("location:../../vista/detalleVentas");
    }

    public static function editar() {

        $idDetalleVenta      = $_REQUEST['idDetalleVenta'];
        $idVenta             = $_REQUEST['idVenta'];
        $idProducto 	     = $_REQUEST['idProducto'];
        $fechaVenta          = $_REQUEST['fechaVenta'];
        $cantidad            = $_REQUEST['cantidad'];
        $precio              = $_REQUEST['precio'];
        $subtotal 	         = $_REQUEST['subtotal'];
        
        detalleVenta::editar($idDetalleVenta, $idVenta, $idProducto, $fechaVenta, $cantidad, $precio, $subtotal);
        header("location:../../vista/detalleVentas");
    }

    public static function eliminar() {

        $idDetalleVenta = $_REQUEST['idDetalleVenta'];

        detalleVenta::eliminar($idDetalleVenta);
        
        header("location:../../vista/detalleVentas");
    }



}

?>