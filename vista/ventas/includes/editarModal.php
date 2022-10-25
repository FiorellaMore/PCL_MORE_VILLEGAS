<!--ventana para Update--->
<div class="modal fade" id="editarVenta<?php echo $venta->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="editaVenta">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="../../controlador/venta/editar.php">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Venta</h5>
        <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" id="cont_modal">
        <input type="hidden" name="idVenta" value="<?php echo $venta->id; ?>">
          <div class="mb-3">
            <label for="editar-idEmpleado" class="col-form-label">Empleado</label>
            <select class="form-select" id="agregar-idEmpleado" name="idEmpleado" aria-label=".form-select-sm example">
              <?php
                  foreach ($empleados as $empleado) {
                    $selected = $empleado->id == $venta->empleado->id ? "selected" : "";
                    echo "<option ". $selected . " value=" . $empleado->id  . ">" .$empleado->nombre  . "</option>";
                      }
                  ?>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del Cliente:</label>
            <input type="text" name="nombreCliente" class="form-control" value="<?php echo $venta->nombreCliente; ?>" required="true">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Total de la venta:</label>
            <input readonly type="text" name="total" class="form-control" value="<?php echo $venta->total; ?>" required="true">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->