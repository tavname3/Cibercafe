<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
    <link rel="stylesheet" href="css/registrophp.css">
</head>
<body>
    <div class="content">
        <img src="../img/database.png" height="80px" whidth="80px">
        <div class="top">
        <?php
        // Crear conexión
        $conn = mysqli_connect("localhost","root","","cibercafe");
        // Verificar conexión
        if(!$conn){
        echo "Error en el enlace al servidor de la base de datos <br>";
        } else {
        echo "La conexion se estableció de forma satisfactoria <br>";
        }
        ?>
    </div>
    <img class="img1" src="../img/comprobado.png" height="95px" width="95px">
    <div class="center">
        <?php
        // Verificar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $apellidoP = $_POST['apellidoP'];
            $apellidoM = $_POST['apellidoM'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña
            // Preparar la consulta SQL
            $sql = "INSERT INTO cliente (Nombre, Apellido_Paterno, Apellido_Materno, Correo, Telefono, Contraseña)
            VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$telefono', '$contraseña')";
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
    </div>
<br><br><br>
        <div class="left"><a href="../../Interpolo/home.html">Regresar al inicio</a></div>
        <div class="right"><a href="#">Consultar información</a></div>
    </div>
</body>
</html>
