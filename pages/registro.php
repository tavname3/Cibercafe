<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "cibercafe";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, apellidoP, apellidoM, correo, contraseña)
    VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$contraseña')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
