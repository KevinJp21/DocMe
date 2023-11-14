<div class="modal fade" id="addCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle">
                    Agendar cita
                </h3>
            </div>
            <div class="modal-body">
                <form action="../../backend/paciente/AgendarCitaBackend.php" method="POST">
                    <div class="row">
            <div class="col-6 mb-3">
                <label for="mes" class="form-label">Mes</label>
                <select class="form-select" aria-label="Default select example" name="mes" required>
                    <!-- Opciones para el mes (puedes personalizar según tus necesidades) -->
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <!-- Agrega las opciones para los demás meses -->
                </select>
            </div>

            <div class="col-6 mb-3">
                <label for="dia" class="form-label">Día</label>
                <select class="form-select" aria-label="Default select example" name="dia" required>
                    <!-- Opciones para el día (puedes personalizar según tus necesidades) -->
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-6 mb-3">
    <label for="tipoConsulta" class="form-label">Tipo de Consulta</label>
    <select class="form-select" aria-label="Default select example" name="tipoConsulta" required>
        <option selected>Seleccionar</option>
        <option value="Medicina general">Medicina general</option>
        <option value="Pediatria">Pediatria</option>
        <option value="Odontología">Odontología</option>
    </select>
<br>
<div class="col-12 mb-3">
                            <button id="buscarCitasBtn" type="submit" class="btn btn-primary">Buscar Citas Disponibles</button>
                        </div>
</div>

<div id="citasDisponiblesDiv"></div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Manejar clic en el botón "Buscar Citas Disponibles"
        $('#buscarCitasBtn').on('click', function(event) {
            // Prevenir el comportamiento predeterminado del formulario
            event.preventDefault();

            // Realizar la solicitud AJAX para obtener citas disponibles
            $.ajax({
                type: 'GET',
                url: "../../backend/paciente/AgendarCitaBackend.php",
                dataType: 'html',  // Cambia al tipo de datos que devuelve tu backend
                success: function(response) {
                    // Actualizar el contenido del div con las citas disponibles
                    $('#citasDisponiblesDiv').html(response);
                },
                error: function(error) {
                    console.error('Error al obtener citas disponibles:', error);
                }
            });
        });
    });
</script>

