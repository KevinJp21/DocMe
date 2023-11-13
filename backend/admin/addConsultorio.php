</style>
<div class="modal fade" id="addCon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Agregar consultorio
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cod" class="form-label">Codigo</label>
                                <input type="text" id="cod" name="cod" class="form-control"
                                    value="" require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="dispo" class="form-label">Disponibilidad</label>
                                <input type="text" id="dispo" name="dispo" class="form-control"
                                    value="" require="">
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="addCon">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php