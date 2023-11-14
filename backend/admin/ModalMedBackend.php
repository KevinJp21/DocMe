<?php
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'edit':
            edit();
            break;
        case 'add';
            add();
            break;
        case 'editPac';
            editPac();
            break;
        case 'addCon';
            addCon();
            break;
        case 'EditCon';
            editCon();
            break;
        case 'addEsp';
            addEsp();
            break;
        case 'EditEsp';
            editEsp();
            break;
        case 'addCita';
            addCita();
            break;
        case 'editCita';
            editCita();
            break;
    }
}
function add(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("INSERT INTO usuarios (Nombre, Apellido, Correo, Password, User_Name, FechaNac, Telefono, Identificacion) VALUES ('$name', '$lastName', '$email', '$pass', '$userName', '$fechaNac', '$tel', '$ID', 3)");
    $stmt->execute();

    $stmt2 = $connect->prepare("INSERT INTO medicos (ID_Usu, ID_Esp, ID_Con) VALUES (LAST_INSERT_ID(), '$Esp', '$Con')");
    $stmt2->execute();

    $result = $stmt;
    $result2 = $stmt2;


    if($result and $result2){
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function(){
                swal({
                    title: '¡Médico registrado correctamente!',
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

function edit(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE usuarios SET Nombre = '$name', Apellido = '$lastName', Correo = '$email' , User_Name = '$userName', FechaNac = '$fechaNac', Telefono = '$tel', Identificacion = '$ID' WHERE ID_Usu = '$id'");
    $stmt->execute();
    $result = $stmt;

    $stmt2 = $connect->prepare("UPDATE medicos SET ID_Esp = '$Esp', ID_Con = '$Con' WHERE ID_Usu = '$id'");
    $stmt2->execute();
    $result2 = $stmt2;

    if ($result and $result2) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizados correctamente!',
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

function editPac(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE usuarios SET Nombre = '$name', Apellido = '$lastName', Correo = '$email' , User_Name = '$userName', FechaNac = '$fechaNac', Telefono = '$tel', Identificacion = '$ID' WHERE ID_Usu = '$id'");
    $stmt->execute();
    $result = $stmt;

    if ($result) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizados correctamente!',
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

function editEsp(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE especialidad SET Codigo_Esp = '$cod', Descripcion = '$desc' WHERE ID_Esp = '$id'");
    $stmt->execute();
    $result = $stmt;

    if ($result) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizados correctamente!',
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

function addCon(){
    extract($_POST);
    require_once '../config.php';
    
    $stmt = $connect->prepare("INSERT INTO  consultorios(Codigo, Desc_Con, Disponibilidad) VALUES ('$cod', '$desc', '$dispo')");
    $stmt->execute();
    $result = $stmt;

    if($result){
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function(){
                swal({
                    title: '¡El consultorio se agregó correctamente!',
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

function editCon(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE consultorios SET Codigo = '$cod', Disponibilidad = '$dispo', Desc_Con = '$desc' WHERE ID_Con = '$id'");
    $stmt->execute();
    $result = $stmt;

    if ($result) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizados correctamente!',
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

function addEsp(){
    extract($_POST);
    require_once '../config.php';

    $stmt = $connect->prepare("INSERT INTO  especialidad (Codigo_Esp, Descripcion) VALUES ('$cod', '$desc')");
    $stmt->execute();
    $result = $stmt;

    if($result){
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function(){
                swal({
                    title: '¡La especialidad se agregó correctamente!',
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

function addCita(){
    extract($_POST);
    require_once '../config.php';

    $stmt = $connect->prepare("INSERT INTO  citas (Motivo) VALUES ('$reason')");
    $stmt->execute();
    $result = $stmt;

    if($result){
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function(){
                swal({
                    title: '¡La cita se agregó correctamente!',
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

function editCita(){
    extract($_POST);
    require_once '../config.php';
    $stmt = $connect->prepare("UPDATE Citas SET Motivo = '$reason' WHERE ID_Cita = '$id'");
    $stmt->execute();
    $result = $stmt;

    if ($result) {
        echo "
            <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function(){
                    swal({
                        title: '¡Datos actualizados correctamente!',
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
