
   <!--main-->
    <div class="contener-formulario-compra">

        <form class="row g-3 needs-validation" action="index.php?modulo=formulario_compra" novalidate>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="validationCustom01" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="validationCustom02" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">Medio de Pago</label>
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Seleccione</option>
                <option>Mercado Pago</option>
                <option value="">Trajeta de credito</option>
                <option value="">Trajeta de debito</option>
                
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Codigo Postal</label>
              <input type="text" class="form-control" id="validationCustom05" required>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Aceptar los términos y condiciones
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Aceptar</button>
            </div>
          </form>

