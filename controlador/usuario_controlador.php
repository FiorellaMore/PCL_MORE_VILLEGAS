<?php

include("../../controlador/config.php");
include("../../modelo/empleado.php");
include("../../modelo/usuario.php");
include("../../modelo/rol.php");

class UsuarioControlador {

    public static function listar() {
        $usuarios = Usuario::listar(); 
        $roles = Rol::listar();
        $empleados = Empleado::listar();

        include("../../vista/usuarios/includes/listar_vista.php");
    }

    public static function agregar() {
        $nombre     = $_REQUEST['nombre'];
        $password   = $_REQUEST['password'];
        $username   = $_REQUEST['username'];
        $email      = $_REQUEST['email'];
        $idRol      = $_REQUEST['idRol'];
        $idEmpleado = $_REQUEST['idEmpleado'];

        Usuario::agregar($nombre, $password , $username , $email, $idRol, $idEmpleado);
        
        header("location:../../vista/usuarios");
    }

    public static function editar() {
        $id         = $_REQUEST['idUsuario'];
        $nombre     = $_REQUEST['nombre'];
        $password   = $_REQUEST['password'];
        $username   = $_REQUEST['username'];
        $email      = $_REQUEST['email'];
        $idRol      = $_REQUEST['idRol'];
        $idEmpleado = $_REQUEST['idEmpleado'];

        Usuario::editar($id, $nombre, $password , $username , $email, $idRol , $idEmpleado);

        header("location:../../vista/usuarios");
    }

    public static function eliminar() {
        $id = $_REQUEST['idUsuario'];

        Usuario::eliminar($id);
        
        header("location:../../vista/usuarios");
    }
}
?>
