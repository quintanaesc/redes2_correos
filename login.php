<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establecer la conexión con la base de datos
    $host = 'localhost';
    $db = 'email_service';
    $user = 'username';
    $password = 'password';
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $password);
    // Preparar la consulta SQL
    $query = 'SELECT id_empleado FROM empleado WHERE nickname = :username AND pass = :password';
    $statement = $pdo->prepare($query);
    // Asignar los valores a los parámetros
    $username = $_POST['username'];
    $password = $_POST['password'];
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    // Ejecutar la consulta
    $statement->execute();
    // Verificar si se encontró algún registro
    $result = $statement->fetch();
    if (!$result) {
        echo '<script>alert("Usuario o contraseña incorrectos");</script>';
    } else {
        // Crear la cookie con el ID del empleado
       /*  $id_empleado = $result['id_empleado'];
        setcookie('id_empleado', $id_empleado, time() + 3600, '/'); */
        // Redirigir al usuario a la página index.html en la subcarpeta correo
        header('Location: correo/index.html');
        exit;
    }
}
?> 