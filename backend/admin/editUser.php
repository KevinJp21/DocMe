<?php
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'edit':
            edit();
            break;
    }
}

function edit()
{
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE usuarios SET nombre = '$name', apellido = '$lastName', identificacion = '$ID', correo = '$email', user = '$userName', tel = '$tel' WHERE id_user = '$id'");
    $stmt->execute();
    $result = $stmt;

    if ($result) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizado correctamente!',
                        icon: 'success',
                        button: 'OK',
                      }).then(() => {
                            location.assign('../../index.php');
                    });
                });
            </script>
            ";
    } else {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Algo salio mal!',
                        icon: 'error',
                        button: 'OK',
                      }).then(() => {
                        location.assign('../../index.phpp');
                    });
                });
            </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>

    <style>
        body {
            background: #164757;
        }

        .swal-title {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

</body>

</html>
