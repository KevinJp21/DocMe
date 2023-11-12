<div class="modal fade" id="editPac<?php echo $paciente['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Editar datos del paciente
                </h3>
            </div>
            <div class="modal-body">
            <?php
                if(isset($errMsg)){
                    echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
                }
            ?>
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?php echo $paciente['nombre']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" id="lastName" name="lastName" class="form-control"
                                    value="<?php echo $paciente['apellido']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="ID" class="form-label">Identificación</label>
                            <input type="text" id="ID" name="ID" class="form-control"
                                value="<?php echo $paciente['identificacion']; ?>" require="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?php echo $paciente['correo']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="userName" class="form-label">Usuario</label>
                            <input type="text" id="userName" name="userName" class="form-control"
                                value="<?php echo $paciente['user']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input type="text" id="tel" name="tel" class="form-control"
                                value="<?php echo $paciente['tel']; ?>" require="">
                        </div>

                        <input type="hidden" name="accion" value="edit">
                        <input type="hidden" name="id" value="<?php echo $paciente['id_user']; ?>">
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
