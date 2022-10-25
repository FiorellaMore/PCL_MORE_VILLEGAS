<!--ventana para Update--->
<div class="modal fade" id="editarDetalleVenta<?php echo $detalleVenta->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="editaDetalleVenta">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="../../controlador/detalleVenta/editar.php">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar detalle de venta</h5>
        <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" id="cont_modal">
        <input type="hidden" name="idDetalleVenta" value="<?php echo $detalleVenta->id; ?>">
          <div class="mb-3">
            <label for="editar-idVenta" class="col-form-label">Venta</label>
            <input readonly type="text" name="precio" class="form-control" value="<?php echo $venta->id . "--" . $venta->nombreCliente  ; ?>" required="true">
            <!--<select class="form-select" id="agregar-idVenta" name="idVenta" aria-label=".form-select-sm example">
              <?php
                  foreach ($ventas as $venta) {
                    $selected = $venta->id == $detalleVenta->venta->id ? "selected" : "";
                    echo "<option ". $selected . " value=" . $venta->id  . ">" .$venta->id . "--" . $venta->nombreCliente  . "</option>";
                      }
                  ?>
            </select>-->
          </div>
          <div class="mb-3">
            <label for="editar-idProducto" class="col-form-label">Producto</label>
            <select class="form-select" id="agregar-idProducto" name="idProducto" aria-label=".form-select-sm example">
              <?php
                  foreach ($productos as $producto) {
                    $selected = $producto->id == $detalleVenta->producto->id ? "selected" : "";
                    echo "<option ". $selected . " value=" . $producto->id  . ">" .$producto->nombre  . "</option>";
                      }
                  ?>
            </select>
          </div>
            <div class="col-md-12">
              <label for="name" class="col-form-label">Fecha de venta</label>
              <input type="date" class="form-control" name="fechaVenta" value="<?php echo $detalleVenta->fechaVenta; ?>"required='true' autofocus>
            </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="text" name="cantidad" class="form-control" value="<?php echo $detalleVenta->cantidad; ?>" required="true">
          </div>
          <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input readonly type="text" name="precio" class="form-control" value="<?php echo $detalleVenta->precio; ?>" required="true">
          </div>
          <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">Subtotal:</label>
            <input readonly type="text" name="subtotal" class="form-control" value="<?php echo $detalleVenta->subtotal; ?>" required="true">
          </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!---fin ventana Update --->