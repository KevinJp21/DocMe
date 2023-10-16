<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/PHPMailer.php';
// Incluimos la configuración de la base de datos.
include_once '../backend/config.php';

// Función para enviar un correo electrónico a un usuario.
function sendEmail($to, $subject, $body) {
    // Creamos un objeto PHPMailer.
    $mail = new PHPMailer();

    // Configuramos el servidor SMTP.
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'teamdocme@outlook.com';
    $mail->Password = 'docme123';
    $mail->Port = 587;

    // Configuramos el remitente y el destinatario.
    $mail->setFrom('teamdocme@outlook.com', 'DocMe');
    $mail->addAddress($to);

    // Configuramos el asunto y el cuerpo del correo.
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Enviamos el correo.
    if (!$mail->send()) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        return false;
    }

    return true;
}

// Verificamos si el formulario ha sido enviado.
if (isset($_POST['recovery'])) {
    // Obtenemos el correo electrónico del usuario.
    $email = $_POST['email'];

    // Validamos el correo electrónico.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = 'El correo electrónico no es válido.';
    } else {
        // Verificamos si el usuario existe en la base de datos.
        $sql = 'SELECT * FROM usuarios WHERE correo = :email';
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($user = $stmt->fetch()) {
            // Generamos un token de recuperación de contraseña aleatorio.
            $token = md5(uniqid());
            // Guardamos el token en la sesión.
            $_SESSION['password_reset_token'] = $token;

            // Guardamos el token en la base de datos.
            $sql = 'UPDATE usuarios SET password_reset_token = :token WHERE correo = :email';
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user_name = $user['user'];

            // Enviamos un correo electrónico al usuario con el enlace de recuperación de contraseña.
            $subject = 'Recuperación de contraseña de DocMe';
            $body =
                'Hola ' .
                $user_name .
                ', Para recuperar tu contraseña de DocMe haz clic en el siguiente enlace:' .
                ' http://localhost/DocMe/frontend/change_pass.php?token=' .
                $token .
                ' Este enlace caducará en 24 horas. Si no has solicitado una recuperación de contraseña, ignora este correo electrónico.
    
Atentamente,
El equipo de DocMe.';
            $encrypted_mail = utf8_decode($body);
            $encrypted_subject = utf8_decode($subject);
            sendEmail($email, $encrypted_subject, $encrypted_mail);

            // Redirigimos al usuario a la página de inicio de sesión.
            header('Location: ../frontend/login.php');
        } else {
            $errMsg = 'El usuario no existe.';
        }
    }
}

?>
