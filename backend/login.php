<?php
require '../backend/config.php';
if (isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];

    //Comprobar campos

    if ($user_name == '') {
        $errMsg = 'Digite su usuario';
    }
    if ($pass == '') {
        $errMsg = 'Digite su contraseña';
    }

    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT *  FROM usuarios WHERE user_name = :user_name');
            $stmt->execute([
                ':user_name' => $user_name,
            ]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data == false) {
                $errMsg = "Usuario $user_name no encontrado.";
            } else {
                if ($pass == $data['Password']) {
                    $_SESSION['id'] = $data['ID_Usu'];
                    $_SESSION['name'] = $data['Nombre'];
                    $_SESSION['user_name'] = $data['User_Name'];
                    $_SESSION['email'] = $data['Correo'];
                    $_SESSION['pass'] = $data['Password'];
                    $_SESSION['rol'] = $data['ID_Rol'];

                    if ($data['ID_Rol'] == '1') {
                        header('location: ../frontend/admin/dashboard.php');
                    }else if($data['ID_Rol'] == '2'){
                        header('location: ../frontend/paciente/dashboard.php');
                    }else if($data['ID_Rol'] == '3'){
                        header('location: ../frontend/medico/dashboard.php');
                    }
                } else {
                    $errMsg = 'Contraseña incorrecta.';
                }
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}

?>
