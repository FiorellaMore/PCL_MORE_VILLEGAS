<?php

require '../../vendor/autoload.php';

include("../../controlador/config.php");
include("../../modelo/empleado.php");
include("../../modelo/venta.php");
include("../../modelo/usuario.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class VentaControlador{

    public static function listar() {

        $ventas     = Venta::listar();
        $empleados  = Empleado::listar();

        include("../../vista/ventas/includes/tabla.php");
    }

    public static function agregar() {
        $idEmpleado          = $_REQUEST['idEmpleado'];
        $nombreCliente       = $_REQUEST['nombreCliente'];
        $total 	             = $_REQUEST['total'];
        
        Venta::agregar($idEmpleado, $nombreCliente, $total);
        
        header("location:../../vista/ventas");
    }

    public static function editar() {

        $idVenta        = $_REQUEST['idVenta'];
        $idEmpleado     = $_REQUEST['idEmpleado'];
        $nombreCliente  = $_REQUEST['nombreCliente'];
        $total 	        = $_REQUEST['total'];
        
        Venta::editar($idVenta,$idEmpleado, $nombreCliente, $total);
        header("location:../../vista/ventas");
    }

    public static function eliminar() {

        $idVenta = $_REQUEST['idVenta'];

        Venta::eliminar($idVenta);
        
        header("location:../../vista/ventas");
    }


    public static function enviarEmail() {
        session_start();

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mvillegasfiorel@crece.uss.edu.pe';
            $mail->Password   = 'more1020';
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
        
            //Recipients
            $mail->setFrom('mvillegasfiorel@crece.uss.edu.pe', 'Fiorella Jhajaira More Villegas');
            $mail->addAddress($_POST['email_receptor']);
        
            //Content
            $mail->isHTML(true);
            $mail->Subject = $_POST['subject'];
            $mail->Body    = $_POST['sms'];
            $mail->AltBody = 'Nuevo Mensaje de pedido VIMO';
        
            $mail->send();
            header("location:../../vista/ventas/index.php");
        } catch (Exception $e) {
            header("location:../../vista/ventas/index.php");
        }
    }

}

?>