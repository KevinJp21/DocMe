<?php 
session_start();
include '../../backend/admin/dashboard.php';
include '../../backend/getUserData.php';
include '../../backend/config.php';

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
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../frontend/css/windows_admin.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="sidebar">
        <!--Sidebar elements-->
        <?php include('../tamplates/sideBar.php')?>
        <div class="content-area">
            <div class="container-fluid row">
                <div class="col-12 p-4">
                    <table class="table-striped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Correo</th>
                                <th scope="col">usuario</th>
                                <th scope="col">Teléfono</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i = 0;
                        foreach ($listMed as $paciente) {?>
                            <tr>
                                <th scope="row"><?php echo $i = $i + 1; ?></th>
                                <td><?php echo $paciente['id_user']; ?></td>
                                <td><?php echo $paciente['nombre']; ?></td>
                                <td><?php echo $paciente['apellido']; ?></td>
                                <td><?php echo $paciente['identificacion']; ?></td>
                                <td><?php echo $paciente['correo']; ?></td>
                                <td><?php echo $paciente['user']; ?></td>
                                <td><?php echo $paciente['tel']; ?></td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-edit" data-bs-target="#editPac<?php echo $paciente['id_user']; ?>"><i class="fa-solid fa-pen-to-square" name="btnEdit" value="btnEdit"></i></button>
                                </td>
                            </tr>
                            <?php include '../../backend/admin/editPaciente.php'; ?>
                            <?php }?>
                        </tbody>
                    </table>
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
