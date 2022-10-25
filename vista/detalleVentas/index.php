<?php include("../../controlador/validacion_sesion.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Venta</title>
    <?php include('../includes/head.php') ?>
</head>

<body>

    <div class="app position-relative">
        <div class="app-content">
            <?php include('../includes/navbarVend.php') ?>
            <div class="container px-4 ">
                <div class="py-4 bd-highlight row">
                    <div class="title-proveedores py-2">
                        <h2>Detalle de ventas</h2>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#agregarDetalleVenta">Agregar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <?php include("../../controlador/detalleVenta/listar.php"); ?>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</html>