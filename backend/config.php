<?php
// Definimos la base de datos.
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'docme1');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

function getUserData($userId) {
    global $connect;
    $stmt = $connect->prepare('SELECT nombre, apellido, user FROM usuarios WHERE id_user = :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch();
    $userData = $result;
    return $userData;
}

?>
