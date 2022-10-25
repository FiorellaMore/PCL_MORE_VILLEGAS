<!-- Modal para Agregar-->
<div class="modal fade" id="agregarVenta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form name="form-data" action="../../controlador/venta/agregar.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Venta</h5>
          <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
          <div>
            <label for="agregar-idEmpleado" class="col-form-label">Empleado</label>
            <select class="form-select" id="agregar-idEmpleado" name="idEmpleado" aria-label=".form-select-sm example" ">
              <option selected>Seleccionar empleado</option>
                <?php
                  foreach ($empleados as $empleado) {
                        echo "<option " . " value=" . $empleado->id  . ">" .$empleado->nombre  . "</option>";
                          }
              ?>
            </select>
          </div>
            <div class="col-md-12">
              <label for="name" class="form-label">Nombre del Cliente</label>
              <input type="text" class="form-control" name="nombreCliente" required='true' autofocus>
            </div>
            <div class="col-md-12">
              <label for="name" class="form-label">Total del Venta</label>
              <input type="text" class="form-control" name="total" required='true' autofocus>
            </div>
        </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary btn-block" id="btnEnviar">
            Aceptar
          </button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>