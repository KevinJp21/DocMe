<?php
session_start();
include '../../backend/dashboard.php';
include '../../backend/getUserData.php';
include '../../backend/config.php';

if (isset($_SESSION['id'])) {
        if ($_SESSION['rol'] == '3') {
            header('Location: ../medico/citas.php');
        }else if ($_SESSION['rol'] == '2') { 
            header('Location: ../paciente/citas.php');
        }
    $userData = getUserData($_SESSION['id']);
    $name = $userData['nombre'];
    $last_name = $userData['apellido'];
    $user_name = $userData['user_name'];
    $rol = $userData['rol'];

    $stmt = $connect->prepare("
    SELECT
    p.ID_Usu, 
    p.Nombre,
    p.Apellido,
    p.Identificacion,
    p.Correo,
    p.Telefono,
    ci.FechaCita,
    ci.Motivo,
    ci.Estado,
    m.Nombre AS NombreM,
    m.Apellido AS ApellidoM,
    esp.Descripcion,
    cons.Desc_Con
    
  FROM usuarios p
  INNER JOIN 
  citas ci
  ON p.ID_Usu = ci.ID_Paciente
  INNER JOIN medicos me
  ON ci.ID_Med = me.ID_Usu
  INNER JOIN usuarios m
  ON m.ID_Usu = me.ID_Usu
  INNER JOIN especialidad esp
  ON me.ID_Esp = esp.ID_Esp
  INNER JOIN consultorios cons
  ON me.ID_Con = cons.ID_Con
    ");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $connect->prepare("SELECT * FROM citas WHERE citas.Estado = 'No asignada'");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
        type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript">
    </script>
    <link rel="stylesheet" href="../../frontend/css/windows_admin.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <style>
        .sidebar .nav-links li:nth-child(2){
            background-color: #0f5268;
        }
    </style>
    

</head>

<body>
    <div class="sidebar">
        <!--Sidebar elements-->
        <?php include '../tamplates/sideBar.php'; ?>

        <div class="content-area">
            <div class="container-fluid row">
                <div class="btn-add-container col-12 ps-4 pt-4">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addCita" class="btn-add">Agregar
                        Cita</button>
                    <?php include '../../backend/admin/addCita.php'; ?>
                </div>
                <div class="col-12 p-4">
                    <span class="fs-3" style="color: aliceblue">Citas agendadas</span>
                    <table class="table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha cita</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Medico</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Consultorio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i = 0;
                        foreach ($result as $cita) {
                            ?>
                            <tr>
                                <td scope="row"><?php echo $i = $i + 1; ?></td>
                                <td><?php echo $cita['Nombre']; ?></td>
                                <td><?php echo $cita['Apellido']; ?></td>
                                <td><?php echo $cita['Identificacion']; ?></td>
                                <td><?php echo $cita['Correo']; ?></td>
                                <td><?php echo $cita['Telefono']; ?></td>
                                <td><?php echo $cita['FechaCita']; ?></td>
                                <td><?php echo $cita['Motivo']; ?></td>
                                <td><?php echo $cita['Estado']; ?></td>
                                <td><?php echo $cita['NombreM']; ?> <?php echo $cita['ApellidoM']; ?></td>
                                <td><?php echo $cita['Descripcion']; ?></td>
                                <td><?php echo $cita['Desc_Con']; ?></td>
                            </tr>
                            <?php include '../../backend/admin/editMed.php'; ?>
                            <?php }?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <span class="fs-3" style="color: aliceblue">Citas no asignadas</span>
                    <table class="table-striped" style="width: 100%; text-align: center" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Estado</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i = 0;
                        foreach ($result2 as $citaNo) {
                            ?>
                            <tr>
                                <td scope="row"><?php echo $i = $i + 1; ?></td>
                                <td><?php echo $citaNo['ID_Cita']; ?></td>
                                <td><?php echo $citaNo['Motivo']; ?></td>
                                <td><?php echo $citaNo['Estado']; ?></td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-edit"
                                        data-bs-target="#editCita<?php echo $citaNo['ID_Cita']; ?>"><i
                                            class="fa-solid fa-pen-to-square" name="btnEdit"
                                            value="btnEdit"></i></button>
                                </td>
                            </tr>
                            <?php include '../../backend/admin/editCita.php'; ?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                

            </div>
            <!--Footer elements-->
            <?php include '../tamplates/footer.php'; ?>
        </div>

    </div>



    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src="https://kit.fontawesome.com/ab205d1cfa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        var table = document.querySelector("#table");
        var dataTable = new DataTable(table);
    </script>
</body>

</html>

<?php }else{
header('Location: ../login.php');
}?>
