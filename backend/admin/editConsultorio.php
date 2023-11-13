</style>
<div class="modal fade" id="EditCon<?php echo $consultorio['ID_Con']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Editar consultorio
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cod" class="form-label">Codigo</label>
                                <input type="text" id="cod" name="cod" class="form-control"
                                    value="<?php echo $consultorio['Codigo']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="dispo" class="form-label">Disponibilidad</label>
                                <input type="text" id="dispo" name="dispo" class="form-control"
                                    value="<?php echo $consultorio['Disponibilidad']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="desc" class="form-label">Descripcion</label>
                                <input type="text" id="desc" name="desc" class="form-control"
                                    value="<?php echo $consultorio['Desc_Con']; ?>" require="">
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="EditCon">
                        <input type="hidden" name="id" value="<?php echo $consultorio['ID_Con']; ?>">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>