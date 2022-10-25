<?php 
  include("../../controlador/config.php");
  
  class Venta{
      public $id;
      public $empleado;
      public $nombreCliente;
      public $total;

    function __construct($id, $empleado, $nombreCliente, $total) {
        $this->id = $id;
        $this->empleado = $empleado;
        $this->nombreCliente = $nombreCliente;
        $this->total = $total;       
    }

    public static function listar() {
        global $link;
        $ventas = [];
        $consulta  = ("SELECT v.*, E.nombre nombreEmpleado, E.apellidoMaterno apellidoMaternoEmpleado, E.apellidoPaterno apellidoPatenoEmpleado, E.telefono telefonoEmpleado, E.fechaNac fechaNacEmpleado, E.direccion direccionEmpleado FROM mor_venta v INNER JOIN mor_empleado E ON v.idEmpleado=E.idEmpleado");
        $resultado = mysqli_query($link, $consulta);

        while ($valor = mysqli_fetch_assoc($resultado)){ 
            $empleado = new Empleado(
                $valor['idEmpleado'],
                $valor['nombreEmpleado'],
                $valor['apellidoMaternoEmpleado'],
                $valor['apellidoPatenoEmpleado'],
                $valor['telefonoEmpleado'],
                $valor['fechaNacEmpleado'],
                $valor['direccionEmpleado']
            );
            $ventas[]= new Venta(
                $valor['idVenta'], 
                $empleado,
                $valor['nombreCliente'], 
                $valor['total']
            );
        }
        return $ventas;
    } 
    
    public static function agregar($empleado, $nombreCliente, $total){
        global $link; 
        $consulta = ("INSERT INTO mor_venta(
            idEmpleado,
            nombreCliente,
            total
      )
      VALUES (
          '".$empleado. "',
          '".$nombreCliente. "',
          '".$total. "'
      )");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }

    public static function editar($id,$idEmpleado, $nombreCliente, $total) {
        global $link; 
        $consulta = ("UPDATE mor_venta 
        SET 
        idEmpleado       ='" .$idEmpleado. "',
        nombreCliente    ='" .$nombreCliente. "',
        total            =" .$total. "
        WHERE idVenta    ='" .$id. "'
    ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
    
    public static function eliminar($id) {
        global $link; 
        $consulta = ("DELETE FROM mor_venta WHERE idVenta= '".$id . "' ");
        $resultado = mysqli_query($link, $consulta);
        return $resultado;
    }
  }
?>