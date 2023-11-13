<?php 
session_start();
include '../../backend/config.php';
include '../../backend/admin/dashboard.php';
include '../../backend/getUserData.php';
if(isset($_SESSION['id'])) { 
    $userData = getUserData($_SESSION['id']);
    $name = $userData['nombre'];
    $last_name = $userData['apellido'];
    $user_name = $userData['user_name'];
    $rol = $userData['rol'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../frontend/css/windows_admin.css">
</head>

<body>


    <div class="sidebar">
      <!--Sidebar elements-->
      <?php include('../tamplates/sideBar.php')?>

        <div class="content-area">
            <div class="greeting">
                <span class="fs-5">Bienvenido(a), <?php echo $user_name; ?></span>
            </div>
            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="card">
                        <div class="card-body pb-0">
                            <h2 class="mb-2">0</h2>
                            <p>Pacientes</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card">
                        <div class="card-body pb-0">
                            <h2 class="mb-2">0</h2>
                            <p>Medicos</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card">
                        <div class="card-body pb-0">
                            <h2 class="mb-2">0</h2>
                            <p>Consultorios</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card">
                        <div class="card-body pb-0">
                            <h2 class="mb-2">0</h2>
                            <p>Especialidades</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">ultimos pacientes</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex">

                                <div class="flex-1 pt-1 ml-2">
                                    <h6 class="fw-bold mb-1">1042421512</h6>
                                    <small class="text-muted">Miguel Ortíz</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-header">
                                <div class="card-title">ultimas citas</div>
                            </div>
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <div class="flex-1 p-3 pb-0 ml-2">
                                            <h6 class="fw-bold mb-1 user-name">Miguel Ortiz</h6>
                                            <small class="text-muted status">2023/10/08 14:45</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer elements-->
            <?php include('../tamplates/footer.php')?>

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
