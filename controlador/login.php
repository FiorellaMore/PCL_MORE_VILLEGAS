<?php
    require 'config.php';
    session_start();

    $username =$_POST['username'];
    $password = $_POST['password'];
    $q = "SELECT u.userName userName, u.password password from mor_usuario u where userName = '$username' and  password = '$password'";

    $consulta = mysqli_query($link,$q);
    $valor = mysqli_fetch_assoc($consulta);

    if ( $valor['userName'] === 'administrador'){
        $_SESSION['username']= $username;

        header("location: ../vista/usuarios");

    }else{ 
    if ( $valor['userName'] === 'vendedor'){
        $_SESSION['username']= $username;

        header("location: ../vista/ventas");

    }else{
        if ( $valor['userName'] === 'almacen'){
            $_SESSION['username']= $username;
    
            header("location: ../vista/categorias");
    
        }else{
            ?>
        <script languaje="javascript">
            location.href = "../index.php";
            alert("El nombre de usuario o la contraseña es incorrecta!");
        </script>
        <?php
    
    
        }
    }
    }

?>