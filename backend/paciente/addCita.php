<div class="modal fade" id="addCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Agendar cita
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/admin/ModalMedBackend.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?php echo $userData['nombre']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellido</label>
                                <input type="text" id="lastName" name="lastName" class="form-control"
                                    value="<?php echo $userData['apellido']; ?>" require="">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="ID" class="form-label">Identificación</label>
                            <input type="text" id="ID" name="ID" class="form-control"
                                value="<?php echo $userData['identificacion']; ?>" require="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?php echo $userData['correo']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tel" class="form-label">Teléfono</label>
                            <input type="text" id="tel" name="tel" class="form-control"
                                value="<?php echo $userData['telefono']; ?>" require="">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="fechaCita" class="form-label">Fecha Cita</label>
                            <select id="fechaCita" name="fechaCita" class="form-control">
                                <?php
                                date_default_timezone_set('America/Bogota');
                                
                                $ahora = date('H');
                                $hoy = date('Y-m-d H:i');
                                
                                $opcion = "<optgroup label=\"Hora actual\">";
                                $opcion .= "<option value=\"{$hoy}\">{$hoy}</option>";
                                $opcion .= '</optgroup>';
                                
                                for ($i = 0; $i < 7; $i++) {
                                    $fecha = date('Y-m-d', strtotime($hoy . " +{$i} days"));
                                    for ($hora = 6; $hora <= 20; $hora++) {
                                        if ($i === 0 && $hora < $ahora) {
                                            $hora = $hora + 1;
                                            continue;
                                        }
                                
                                        $opcion .= "<option value=\"{$fecha}T{$hora}:00\">{$fecha} - {$hora}:00</option>";
                                    }
                                }
                                
                                echo $opcion;
                                
                                ?>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <?php
                            
                            $stmt2 = $connect->prepare('SELECT Motivo FROM citas');
                            $stmt2->execute();
                            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <label for="reason" class="form-label">Motivo de la cita</label>
                            <select class="form-select" aria-label="Default select example" name="reason"
                                require="">
                                <option selected>Seleccionar</option>
                                <?php 
                                foreach ($result2 as $reason) {?>
                                <option value="<?php echo $reason['Motivo']; ?>"><?php echo $reason['Motivo']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <?php
                            
                            $stmt3 = $connect->prepare("SELECT * FROM usuarios, medicos, especialidad, consultorios WHERE usuarios.id_usu = medicos.id_usu AND medicos.ID_Esp = especialidad.ID_Esp AND medicos.ID_Con = consultorios.ID_Con");
                            $stmt3->execute();
                            $listMed = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <label for="med" class="form-label">Medico</label>
                            <select class="form-select" aria-label="Default select example" name="med"
                                require="" id="med">
                                <option selected>Seleccionar</option>
                                <?php 
                                foreach ($listMed as $medico) {?>
                                <option value="<?php echo $medico['ID_Usu']; ?>"><?php echo $medico['Nombre']; ?> <?php echo $medico['Apellido']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="esp" class="form-label">Especialidad</label>
                            
                            <input type="esp" id="esp" name="esp" class="form-control"
                                value="" required="" disabled>

                        </div>

                        <div class="col-12">
                            <label for="con" class="form-label">Consultorio</label>
                            
                            <input type="con" id="con" name="con" class="form-control"
                                value="" required="" disabled>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {//Hacer el mismo script con cita
        $('#med').change(function() {
            var idMed = $(this).val();
            if (idMed) {
                $.ajax({
                    url: '../../backend/paciente/getEspecialidad.php',
                    type: 'POST',
                    data: { idMed: idMed },
                    success: function(data) {
                        $('#esp').val(data);
                    }
                });
            } else {
                $('#esp').val('');
            }
        });
    });

    $(document).ready(function() {//Continuar con el tipo de cita
        $('#med').change(function() {
            var idMed = $(this).val();
            if (idMed) {
                $.ajax({
                    url: '../../backend/paciente/getConsultorio.php',
                    type: 'POST',
                    data: { idMed: idMed },
                    success: function(data) {
                        $('#con').val(data);
                    }
                });
            } else {
                $('#con').val('');
            }
        });
    });
</script>

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
