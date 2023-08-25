<?php
session_start();

if (isset($_POST['submit'])) {
    require_once("modelo/conexionlogin.php");
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario válido, redirigir al perfil correspondiente
        $row = $result->fetch_assoc();

        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['datos_usuario'] = $row['datos_usuario'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $_SESSION['perfil'] = $row['perfil'];

        $userType = $row['perfil'];

        if ($userType == 'secretaria') {
            header("Location: vista/index.php");
        } elseif ($userType == 'medico') {
            header("Location: vista/historia_clinica.php");
        } elseif ($userType == 'Administrador') {
            header("Location: vista/listado.php");
        }
    } else {
        // Usuario inválido, configurar mensaje de error
        $_SESSION['login_error'] = 'Usuario o contraseña incorrectos';
    }
}

// Aquí no debe haber una nueva llamada a session_start()

if (isset($_SESSION['login_error'])) {
    echo '<script>';
    echo 'Swal.fire({';
    echo '    icon: "error",';
    echo '    title: "Error",';
    echo '    text: "' . $_SESSION['login_error'] . '"';
    echo '});';
    echo '</script>';
    unset($_SESSION['login_error']);
}

?>

<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
<div class="login-box"> 
        <img class= "avatar" src="img/login.jpg" alt=" Avatar de la veterinaria"> <!--Se crea clase avatar para poder ajustar la imagen del login-->
        <h1>Iniciar Sesion </h1>

        <form action="login.php" method="post" >
			
            <!--USERNAME-->

            <label for="usuario">Usuario</label>
            <input type="text" name="nombre_usuario" placeholder="Ingresar Usuario">

             <!--PASSWORD-->
             <label for="contraseña">Contraseña</label>
             <input type="password" name="contraseña"  placeholder="Ingresar Contraseña" >

             <input type="submit" name="submit" value="Ingresar">  
             <!--boton-->

             <a href="recuperarContraseña.php">Recordar contraseña</a>
    
        </form>
          </div>

</body>

</html>
