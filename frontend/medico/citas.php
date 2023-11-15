<?php
session_start();
include '../../backend/dashboard.php';
include '../../backend/getUserData.php';
include '../../backend/config.php';

if (isset($_SESSION['id'])) {
        if ($_SESSION['rol'] == '1') {//validar que el usuario administrado no pueda acceder paginas de rol paciente
            header('Location: ../admin/citas.php');
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
</head>

<body>
    <div class="sidebar">
        <div class="logo-datails">
            <img src="../../img/logo_docme.png" alt="">
            <section class="home-section">
                <div class="home-content">
                    <i class='bx bx-menu'></i>
                </div>
            </section>
        </div>
        <div class="profile-details">
            <div class="profile-content">
                <img src="../../img/profile.png" alt="profile">
            </div>

            <div class="name-user">
                <div class="profile_name"><span><?php echo $name; ?></span> <span><?php echo $last_name; ?></span></div>
                <div class="rol"><?php echo $userData['rol']; ?></div>
            </div>
        </div>

        <ul class="nav-links">
            <a class="panel" href="../paciente/dashboard.php">
                <div>
                    <span class="fs-5">Inicio</span>
                </div>
            </a>
            <li class="mt-4">
                <a href="../paciente/citas.php">
                    <svg width="30" height="32" viewBox="0 0 30 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.6008 2.47083V30.875H1.39917V2.54166H8.95167V3.95833C8.95583 4.67481 9.27578 5.36089 9.84202 5.86753C10.4083 6.37416 11.1751 6.66044 11.9758 6.66416H18.0242C18.8249 6.66044 19.5917 6.37416 20.158 5.86753C20.7242 5.36089 21.0442 4.67481 21.0483 3.95833V2.54166L28.6008 2.47083Z"
                            stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M10.4717 13.2942H19.5283" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M15 9.24255V17.3459" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M5.9275 25.4634H24.0725" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M5.9275 20.0516H24.0725" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path
                            d="M21.0483 1.125V3.83083C21.0442 4.54732 20.7242 5.2334 20.158 5.74003C19.5917 6.24667 18.8249 6.53295 18.0242 6.53667H11.9758C11.1751 6.53295 10.4083 6.24667 9.84202 5.74003C9.27578 5.2334 8.95583 4.54732 8.95167 3.83083V1.125H21.0483Z"
                            stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                    <span class="link_name">Citas</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.125 10.2142L30.875 10.2142V3.45667L1.125 3.45667V10.2142Z" stroke="#DEDEDE"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                        <path d="M24.1175 0.736694V6.14836" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M7.8825 0.736694V6.14836" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M30.875 16.9717V10.2142H1.125V31.8467H30.875V22.3692V16.9717Z" stroke="#DEDEDE"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                        <path d="M11.9483 15.6117H14.6542" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M17.3458 15.6117H20.0517" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M22.7575 15.6117H25.4633" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M11.9483 21.0234H14.6542" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M6.53667 21.0234H9.2425" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M17.3458 21.0234H20.0517" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M22.7575 21.0234H25.4633" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M11.9483 26.435H14.6542" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M6.53667 26.435H9.2425" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                        <path d="M17.3458 26.435H20.0517" stroke="#DEDEDE" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                    <span class="link_name">Horarios</span>
                </a>
            </li>

            <li class="mt-auto">
                <a href="?logout">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Cerrar sesíon</span>
                </a>
            </li>
        </ul>

        <div class="content-area">
            <div class="container-fluid row">
                <div class="btn-add-container col-12 ps-4 pt-4">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addCita" class="btn-add">Agendar
                        Cita</button>
                    <?php include '../../backend/paciente/addCita.php'; ?>
                </div>
                <div class="col-12 p-4">
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
                                <th>Editar</th>
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
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-edit"
                                        data-bs-target="#editMed<?php echo $cita['ID_Usu']; ?>"><i
                                            class="fa-solid fa-pen-to-square" name="btnEdit"
                                            value="btnEdit"></i></button>
                                </td>
                            </tr>
                            <?php include '../../backend/admin/editMed.php'; ?>
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
