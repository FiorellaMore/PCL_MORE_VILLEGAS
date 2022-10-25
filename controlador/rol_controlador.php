<?php

include("../../controlador/config.php");
include("../../modelo/rol.php");

class RolControlador {

    public static function listar() {
        $roles = Rol::listar(); 

        include("../../vista/roles/includes/tabla.php");
    }

    public static function agregar() {
        $nombre = $_REQUEST['nombre'];

        Rol::agregar($nombre);

        header("location:../../vista/roles");
    }

    public static function editar() {
        $idRol  = $_REQUEST['idRol'];
        $nombre = $_REQUEST['nombre'];

        Rol::editar($idRol, $nombre);

        header("location:../../vista/roles");
    }

    public static function eliminar() {
        $idRol = $_REQUEST['idRol'];

        Rol::eliminar($idRol);
        
        header("location:../../vista/roles");
    }
}
?>
