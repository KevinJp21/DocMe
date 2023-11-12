<?php 
session_start();
include '../../backend/admin/dashboard.php';
include '../../backend/admin/medicos.php';

if(isset($_SESSION['id'])) { 
    $userData = getUserData($_SESSION['id']);
    $name = $userData['nombre'];
    $last_name = $userData['apellido'];
    $user_name = $userData['user'];

    $stmt = $connect->prepare("SELECT * FROM usuarios WHERE 1");
    $stmt->execute();
    $listMed = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../frontend/css/windows_admin.css">
    <link rel="stylesheet" href="../css/medicos.css">
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
                <div class="rol">Administrador</div>
            </div>
        </div>

        <ul class="nav-links">
            <a class="panel" href="../admin/dashboard.php">
                <div>
                    <span>Panel de control</span>
                </div>
            </a>
            <li class="mt-4">
                <a href="../admin/citas.php">
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
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:#DEDEDE" viewBox="0 0 448 512">
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>

                    <span class="link_name">Pacientes</span>
                </a>
            </li>

            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:#DEDEDE" viewBox="0 0 448 512">
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                    </svg>

                    <span class="link_name">Médicos</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:#DEDEDE" viewBox="0 0 640 512">
                        <path
                            d="M192 48c0-26.5 21.5-48 48-48H400c26.5 0 48 21.5 48 48V512H368V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H192V48zM48 96H160V512H48c-26.5 0-48-21.5-48-48V320H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V224H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V144c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v48H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v64H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80V464c0 26.5-21.5 48-48 48H480V96H592zM312 64c-8.8 0-16 7.2-16 16v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V152h24c8.8 0 16-7.2 16-16V120c0-8.8-7.2-16-16-16H344V80c0-8.8-7.2-16-16-16H312z" />
                    </svg>

                    <span class="link_name">Areas medicas</span>
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
                        <path d="M17.3458 21.0234H20.0517" stroke="#DEDEDE" stroke-width="2"
                            stroke-miterlimit="10" />
                        <path d="M22.7575 21.0234H25.4633" stroke="#DEDEDE" stroke-width="2"
                            stroke-miterlimit="10" />
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
                <div class="btn-add-container col-12 pe-4 pt-4">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addMed" class="btn-add">Agregar médico</button>
                    
                </div>
                <div class="col-12 p-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Correo</th>
                                <th scope="col">usuario</th>
                                <th scope="col">Teléfono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i = 0;
                        foreach ($listMed as $medico) {?>
                            <tr>
                                <th scope="row"><?php echo $i = $i + 1; ?></th>
                                <td><?php echo $medico['id_user']; ?></td>
                                <td><?php echo $medico['nombre']; ?></td>
                                <td><?php echo $medico['apellido']; ?></td>
                                <td><?php echo $medico['identificacion']; ?></td>
                                <td><?php echo $medico['correo']; ?></td>
                                <td><?php echo $medico['user']; ?></td>
                                <td><?php echo $medico['tel']; ?></td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#editMed<?php echo $medico['id_user']; ?>"><i class="fa-solid fa-pen-to-square" name="btnEdit" value="btnEdit"></i></button>
                                </td>
                            </tr>
                            <?php include '../../backend/admin/editMed.php'; ?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer id="footer" class="mt-5">
                <div class="footer">
                    <p class="m-0">&copy; Copyright 2023 - Todos los derechos reservados | DocMe </p>
                </div>
            </footer>

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
</body>

</html>

<?php }else{
header('Location: ../login.php');
}?>
