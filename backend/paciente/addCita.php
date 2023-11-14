<div class="modal fade" id="addCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Agendar Cita
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" value=""
                                    require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" id="lastName" name="lastName" class="form-control" value=""
                                    require="">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="ID" class="form-label">Identificación</label>
                            <input type="text" id="ID" name="ID" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" id="email" name="email" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="pass" name="pass" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="userName" class="form-label">Usuario</label>
                            <input type="text" id="userName" name="userName" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="fechanac" class="form-label">Fecha de nacimiento</label>
                            <input type="date" id="fechaNac" name="fechaNac" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input type="text" id="tel" name="tel" class="form-control" value=""
                                require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="Esp" class="form-label">Especialidad</label>
                            <select class="form-select" aria-label="Default select example" name="Esp"
                                require="">
                                <option selected>Seleccionar</option>
                                <?php 
                                foreach ($listEsp as $especialidad) {?>
                                <option id="esp" value="<?php echo $especialidad['id_esp']; ?>"><?php echo $especialidad['descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="Con" class="form-label">Consultorio</label>
                            <select class="form-select" aria-label="Default select example" name="Con"
                                require="">
                                <option selected>Seleccionar</option>
                                <?php 
                                foreach ($listCon as $consultorio) {?>
                                <option value="<?php echo $consultorio['id_con']; ?>"><?php echo $consultorio['desc_con']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <input type="hidden" name="accion" value="add">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addMed').addEventListener('submit', function(event) {
        const nameInput = document.getElementById('name');
        const name = nameInput.value;

        const lastNameInput = document.getElementById('lastName');
        const lastName = lastNameInput.value;

        const IDInput = document.getElementById('ID');
        const ID = IDInput.value;

        const emailInput = document.getElementById('email');
        const email = emailInput.value;

        const userNameInput = document.getElementById('userName');
        const userName = userNameInput.value;

        const telInput = document.getElementById('tel');
        const tel = telInput.value;

        const espInput = document.getElementById('esp');
        const esp = espInput.value;


        if (!/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/.test(name)) {
            event.preventDefault(); //Evitar que el formulario se envie
            nameInput.classList.add('is-invalid'); //Agregar invalidacion
        } else {
            nameInput.classList.remove('is-invalid'); //Eliminar la invalidacion
        }

        if (!/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/.test(lastName)) {
            event.preventDefault();
            lastNameInput.classList.add('is-invalid'); 
        } else {
            lastNameInput.classList.remove('is-invalid')
        }

        if (!/^\d+$/.test(ID)) {
            event.preventDefault();
            IDInput.classList.add('is-invalid');
        } else {
            IDInput.classList.remove('is-invalid');
        }

        if (!/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/.test(email)) {
            event.preventDefault();
            emailInput.classList.add('is-invalid');
        } else {
            emailInput.classList.remove('is-invalid');
        }

        if (!/^(?=.*[A-Za-z])[A-Za-z0-9._-]+$/.test(userName)) {
            event.preventDefault();
            userNameInput.classList.add('is-invalid');
        } else {
            userNameInput.classList.remove('is-invalid');
        }

        if (!/^\d+$/.test(tel)) {
            event.preventDefault();
            telInput.classList.add('is-invalid');
        } else {
            telInput.classList.remove('is-invalid');
        }

    });
</script>

