</style>
<div class="modal fade" id="EditEsp<?php echo $especialidad['ID_Esp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Editar especialidad
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="cod" class="form-label">Codigo</label>
                                <input type="text" id="cod" name="cod" class="form-control"
                                    value="<?php echo $especialidad['Codigo_Esp']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="desc" class="form-label">Descripcion</label>
                                <input type="text" id="desc" name="desc" class="form-control"
                                    value="<?php echo $especialidad['Descripcion']; ?>" require="">
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="EditEsp">
                        <input type="hidden" name="id" value="<?php echo $especialidad['ID_Esp']; ?>">
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