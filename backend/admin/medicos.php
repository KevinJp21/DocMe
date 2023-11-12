<?php
require '../../backend/config.php';

if (isset($_POST['btnAdd'])) {
    $errMsg = '';

    // Obtener los datos del formulario
    $name = $_POST['txtName'];
    $last_name = $_POST['txtLastName'];
    $ID = $_POST['txtId'];
    $pass = $_POST['txtPass'];
    $email = $_POST['txtEmail'];
    $user_name = $_POST['txtUser'];
    $phone_num = $_POST['txtCel'];

    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/', $name)) {
        $errMsg = 'Ingrese un nombre valido.';
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/', $last_name)) {
        $errMsg = 'Ingrese un apellido valido.';
    } elseif (!preg_match('/^\d+$/', $ID)) {
        $errMsg = 'Ingrese una identificacion valida.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = 'Ingrese un correo valido.';
    } elseif (!preg_match('/^(?=.*[A-Za-z])[A-Za-z0-9]+$/', $user_name)) {
        $errMsg = 'Ingrese un nombre de usuario valido: se admiten caracteres y numeros pero no solo numeros.';
    } elseif (!preg_match('/^\d+$/', $phone_num)) {
        $errMsg = 'Ingrese un numero de celular valido.';
    } else {
        $check_id = "SELECT * FROM usuarios
        WHERE identificacion = :ID";
        $stmt1 = $connect->prepare($check_id);
        $stmt1->bindParam(':ID', $ID);
        $stmt1->execute();
        $result1 = $stmt1->fetch();

        $check_em = "SELECT * FROM usuarios
        WHERE correo = :email";
        $stmt2 = $connect->prepare($check_em);
        $stmt2->bindParam(':email', $email);
        $stmt2->execute();
        $result2 = $stmt2->fetch();

        $check_user = "SELECT * FROM usuarios
        WHERE user = :user_name";
        $stmt3 = $connect->prepare($check_user);
        $stmt3->bindParam(':user_name', $user_name);
        $stmt3->execute();
        $result3 = $stmt3->fetch();

        if ($result1) {
            $errMsg = 'La identificación ya está registrada a una cuenta.';
        } elseif ($result2) {
            $errMsg = 'El correo ya está registrado a una cuenta.';
        } elseif ($result3) {
            $errMsg = 'Existe una cuenta con ese nombre de usuario.';
        } else {
            try {
                $sql = 'INSERT INTO  usuarios(nombre, apellido, identificacion, correo, password, user, tel) VALUES (:name, :last_name, :ID, :email, :pass, :user_name, :phone_num)';

                $stmt = $connect->prepare($sql);

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':last_name', $last_name);
                $stmt->bindParam(':ID', $ID);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':user_name', $user_name);
                $stmt->bindParam(':phone_num', $phone_num);
                $stmt->execute();

                function clear_form_cache() {
                    $fields = array_keys($_POST);//Limpiar los campos del formulario de registro
                
                    foreach ($fields as $field) {
                        unset($_POST[$field]);
                    }
                }

                if (!$errMsg) {
                    clear_form_cache();
                    header('Location: ../admin/medicos.php');
                    exit();
                }
            } catch (PDOException $e) {
                echo 'Error de SQL: ' . $e->getMessage();
            }
        }
    }
}
?>
