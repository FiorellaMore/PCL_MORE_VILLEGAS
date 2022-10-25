<?php

include("../../controlador/config.php");
include("../../modelo/empleado.php");
include("../../modelo/usuario.php");

class EmpleadoControlador {

    public static function listar() {
        $empleados = Empleado::listar(); 

        include("../../vista/empleados/includes/listar_vista.php");
    }

    public static function agregar() {
        $nombre          = $_REQUEST['nombre'];
        $apellidoMaterno = $_REQUEST['apellidoMaterno'];
        $apellidoPaterno = $_REQUEST['apellidoPaterno'];
        $telefono        = $_REQUEST['telefono'];
        $fechaNac        = $_REQUEST['fechaNac'];
        $direccion       = $_REQUEST['direccion'];
        
        Empleado::agregar($nombre, $apellidoMaterno , $apellidoPaterno , $telefono, $fechaNac , $direccion );
        
        header("location:../../vista/empleados");
    }

    public static function editar() {
        $id              = $_REQUEST['idEmpleado'];
        $nombre          = $_REQUEST['nombre'];
        $apellidoMaterno = $_REQUEST['apellidoMaterno'];
        $apellidoPaterno = $_REQUEST['apellidoPaterno'];
        $telefono        = $_REQUEST['telefono'];
        $fechaNac        = $_REQUEST['fechaNac'];
        $direccion       = $_REQUEST['direccion'];
        
        Empleado::editar($id, $nombre, $apellidoMaterno , $apellidoPaterno , $telefono, $fechaNac , $direccion );

        header("location:../../vista/empleados");
    }

    public static function eliminar() {
        $id = $_REQUEST['idEmpleado'];

        Empleado::eliminar($id);
        
        header("location:../../vista/empleados");
    }
}
?>