<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "more_villegas";

$link = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($link,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($link, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
$mysqli = new mysqli($servidor,$usuario,$password,$basededatos);
