<?php 

        include("./includes/agregarModal.php"); ?>
<div class="card">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <!--fbdbsfb  -->
                    <th scope="col">Codigo</th>
                    <th scope="col">Venta</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Fecha Venta</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($detalleVentas as $detalleVenta) { ?>
                    <tr>
                        <td><?php echo $detalleVenta->id; ?></td>
                        <td><?php echo $detalleVenta->venta->id; ?></td>
                        <td><?php echo $detalleVenta->producto->nombre; ?></td>
                        <td><?php echo $detalleVenta->fechaVenta; ?></td>
                        <td><?php echo $detalleVenta->cantidad; ?></td>
                        <td><?php echo $detalleVenta->precio; ?></td>
                        <td><?php echo $detalleVenta->subtotal; ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-secondary me-2" type="button" data-bs-toggle="modal" data-bs-target="#editarDetalleVenta<?php echo $detalleVenta->id; ?>">
                                    Editar
                                </button>
                                <!--Ventana Modal para Actualizar--->
                                <?php include("../../vista/detalleVentas/includes/editarModal.php") ?>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#eliminarDetalleVenta<?php echo $detalleVenta->id; ?>">Eliminar</button>
                                <!--Ventana Modal para la Alerta de Eliminar--->
                                <?php include("../../vista/detalleVentas/includes/eliminarModal.php") ?>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
