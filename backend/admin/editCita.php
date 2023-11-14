<div class="modal fade" id="editCita<?php echo $citaNo['ID_Cita']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Editar cita
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="reason" class="form-label">Motivo</label>
                                <input type="text" id="reason" name="reason" class="form-control"
                                    value="<?php echo $citaNo['Motivo']?>" require="">
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="editCita">
                        <input type="hidden" name="id" value="<?php echo $citaNo['ID_Cita']; ?>">
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
