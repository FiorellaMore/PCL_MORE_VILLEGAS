<?php 

        include("./includes/agregarModal.php"); ?>
<div class="card">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <!--fbdbsfb  -->
                    <th scope="col">Codigo</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($ventas as $venta) { ?>
                    <tr>
                        <td><?php echo $venta->id; ?></td>
                        <td><?php echo $venta->empleado->nombre; ?></td>
                        <td><?php echo $venta->nombreCliente; ?></td>
                        <td><?php echo $venta->total; ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-secondary me-2" type="button" data-bs-toggle="modal" data-bs-target="#editarVenta<?php echo $venta->id; ?>">
                                    Editar
                                </button>
                                <!--Ventana Modal para Actualizar--->
                                <?php include("../../vista/ventas/includes/editarModal.php") ?>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#eliminarVenta<?php echo $venta->id; ?>">Eliminar</button>
                                <!--Ventana Modal para la Alerta de Eliminar--->
                                <?php include("../../vista/ventas/includes/eliminarModal.php") ?>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
</div>
</div>
