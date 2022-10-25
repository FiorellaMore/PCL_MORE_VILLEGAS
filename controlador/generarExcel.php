<?php

    require 'config.php';
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};

    $consulta = "SELECT idUsuario, idEmpleado, idRol, nombre, password, userName, email FROM mor_usuario";
    $resultado = $mysqli->query($consulta);

    $excel = new Spreadsheet();
    $excel->getProperties()->setCreator("Fiorella Jhajaira More Villegas")->setTitle("Reportes de Usuarios");

    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva->setTitle("Usuarios");

    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A1', 'Codigo');
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B1', 'Empleado');
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C1', 'Rol');
    $hojaActiva->getColumnDimension('D')->setWidth(10);
    $hojaActiva->setCellValue('D1', 'Nombre');
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E1', 'Contraseña');
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F1', 'Usuario');
    $hojaActiva->getColumnDimension('G')->setWidth(20);
    $hojaActiva->setCellValue('G1', 'Email');

    $fila =2;
    
    while($usuario = $resultado->fetch_assoc()){
        $hojaActiva->setCellValue('A'.$fila, $usuario['idUsuario']);
        $hojaActiva->setCellValue('B'.$fila, $usuario['idEmpleado']);
        $hojaActiva->setCellValue('C'.$fila, $usuario['idRol']);
        $hojaActiva->setCellValue('D'.$fila, $usuario['nombre']);
        $hojaActiva->setCellValue('E'.$fila, $usuario['password']);
        $hojaActiva->setCellValue('F'.$fila, $usuario['userName']);
        $hojaActiva->setCellValue('G'.$fila, $usuario['email']);
        $fila++;
    } 
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=iso-8859-1');
    header('Content-Disposition: attachment; filename="datos-usuarios.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;