<!-- Modal para Agregar-->
<div class="modal fade" id="agregarDetalleVenta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form name="form-data"action="../../controlador/detalleVenta/agregar.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar detalle de Venta</h5>
          <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
          <div>
            <label for="agregar-idVenta" class="col-form-label">Venta</label>
            <select class="form-select" id="agregar-idVenta" name="idVenta" aria-label=".form-select-sm example" ">
              <option selected>Seleccionar Venta</option>
                <?php
                  foreach ($ventas as $venta) {
                        echo "<option " . " value=" . $venta->id  . ">" .$venta->id . "--" . $venta->nombreCliente  . "</option>";
                          }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="agregar-idProducto" class="col-form-label">Producto</label>
            <select class="form-select" id="agregar-idProducto" name="idProducto" aria-label=".form-select-sm example" ">
            <option selected>Seleccionar Producto</option>
              <?php
                foreach ($productos as $producto) {
                  echo "<option " . " value=" . $producto->id  . ">" .$producto->nombre . "</option>";
                }
              ?>
            </select>
          </div>
            <div class="col-md-12">
              <label for="name" class="form-label">Fecha de venta</label>
              <input type="date" class="form-control" name="fechaVenta" required='true' autofocus>
            </div>
            <div class="row">
            <div class="col-md-6">
              <label for="name" class="form-label">Cantidad </label>
              <input type="number" class="form-control" name="cantidad" required='true' autofocus>
            </div>
            <div class="col-md-6">
              <label for="name" class="form-label">Precio </label>
              <input type="number" class="form-control" name="precio" required='true' autofocus>
            </div>
            <div class="col-md-6">
              <label for="name" class="form-label">SubTotal </label>
              <input type="number" class="form-control" name="subtotal" required='true' autofocus>
              </div>
        </div>
      </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-info btn-block" id="btnEnviar">
            Aceptar
          </button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>