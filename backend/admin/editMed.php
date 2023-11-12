<style>
    .modal-backdrop.fade {
        width: 0% !important;
        height: 0% !important;
    }
</style>
<div class="modal fade" id="editMed<?php echo $medico['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Editar datos del médico
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?php echo $medico['nombre']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" id="lastName" name="lastName" class="form-control"
                                    value="<?php echo $medico['apellido']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="ID" class="form-label">Identificación</label>
                            <input type="text" id="ID" name="ID" class="form-control"
                                value="<?php echo $medico['identificacion']; ?>" require="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?php echo $medico['correo']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="userName" class="form-label">Usuario</label>
                            <input type="text" id="userName" name="userName" class="form-control"
                                value="<?php echo $medico['user']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input type="text" id="tel" name="tel" class="form-control"
                                value="<?php echo $medico['tel']; ?>" require="">
                        </div>

                        <input type="hidden" name="accion" value="edit">
                        <input type="hidden" name="id" value="<?php echo $medico['id_user']; ?>">
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
<?php
