<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establecer la conexión con la base de datos
    $host = 'localhost';
    $db = 'email_service';
    $user = 'root';
    $password = '';
    try {
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<script>alert("Conexión fallida");</script>';
        die();
    }
    // Verificar que las contraseñas coinciden
    if ($_POST['password'] !== $_POST['pass_confirm']) {
        echo '<script>alert("Las contraseñas no coinciden");</script>';
        die();
    }
    // Preparar la consulta SQL
    $insert = 'INSERT INTO empleado (nickname, cuenta, pass) VALUES (:username, :account, :password)';
    $statement = $pdo->prepare($insert);
    // Asignar los valores a los parámetros
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account = $_POST['account'] . '@fino.com';
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':account', $account);
    // Ejecutar la insert
    $statement->execute();
    // Redirigir al usuario a la página index.html en la subcarpeta correo
    header('Location: login.html');
    
}

?> 