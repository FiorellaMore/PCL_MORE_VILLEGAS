<?php 
  include("../../controlador/config.php");
  
  class detalleVenta{
      public $id;
      public $venta;
      public $producto;
      public $fechaVenta;
      public $cantidad;
      public $precio;
      public $subtotal;

    function __construct($id, $venta, $producto, $fechaVenta, $cantidad, $precio, $subtotal) {
        $this->id = $id;
        $this->venta = $venta;
        $this->producto = $producto;
        $this->fechaVenta = $fechaVenta;
        $this->cantidad = $cantidad;
        $this->precio = $precio; 
        $this->subtotal = $subtotal;          
    }

    public static function listar() {
        global $link;
        $detalleVentas = [];
        $consulta  = ("SELECT dt.*, v.idVenta idVenta, v.idEmpleado idEmpleado, v.nombreCliente nombreCliente, v.total total, p.idCategoria idCategoria, p.idAlmacen idAlmacen, p.nombre nombreProducto, p.descripcion descripcionPro, p.foto foto, p.precio precioPro, p.estado estado, round(dt.cantidad * dt.precio) subtotal FROM mor_detalle_venta dt INNER JOIN mor_venta v ON dt.idVenta=V.idVenta INNER JOIN mor_producto p ON dt.idProducto=p.idProducto");
        $resultado = mysqli_query($link, $consulta);

        while ($valor = mysqli_fetch_assoc($resultado)){
            $producto = new Producto(
                $valor['idProducto'],
                $valor['nombreProducto'],
                $valor['idCategoria'],
                $valor['descripcionPro'],
                $valor['idAlmacen'],
                $valor['foto'],
                $valor['precioPro'],
                $valor['estado']
            );
            $venta= new Venta(
                $valor['idVenta'], 
                $valor['idEmpleado'],
                $valor['nombreCliente'], 
                $valor['total']
            );
            $detalleVentas[] = new detalleVenta(
                $valor['idDetalleVenta'],
                $venta,
                $producto,
                $valor['fechaVenta'],
                $valor['cantidad'],
                $valor['precio'],
                $valor['subtotal']
            );
        }
        return $detalleVentas;
    } 
    
    public static function agregar($venta, $producto, $fechaVenta, $cantidad, $precio, $subtotal){
        global $link; 
        $consulta = ("INSERT INTO mor_detalle_venta(
            idVenta,
            idProducto,
            fechaVenta,
            cantidad,
            precio,
            subtotal
      )
      VALUES (
          '".$venta. "',
          '".$producto. "',
          '".$fechaVenta. "',
          '".$cantidad. "',
          '".$precio. "',
          '".$subtotal. "'
      )");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
        
    }

    public static function editar($id,$venta, $producto, $fechaVenta, $cantidad, $precio, $subtotal) {
        global $link; 
        $consulta = ("UPDATE mor_detalle_venta
        SET 
        idVenta       ='" .$venta. "',
        idProducto    ='" .$producto. "',
        fechaVenta    ='" .$fechaVenta. "',
        cantidad      ='" .$cantidad. "',
        precio        ='" .$precio. "',
        subtotal      =" .$subtotal. "
        WHERE idDetalleVenta ='" .$id. "'
    ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
    
    public static function eliminar($id) {
        global $link; 
        $consulta = ("DELETE FROM mor_detalle_venta WHERE idDetalleVenta= '".$id . "' ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
  }
?>