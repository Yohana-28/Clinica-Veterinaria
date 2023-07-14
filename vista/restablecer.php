<?php
if (isset($_POST['submit'])) {
    // Obtener el token y la nueva contraseña ingresados en el formulario
    $token = $_POST['token'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    // Aquí debes implementar la lógica para verificar si el token es válido y actualizar la contraseña en la base de datos

    // Redirige al usuario a una página de éxito o muestra un mensaje de éxito en la misma página
    echo "La contraseña se ha restablecido correctamente.";
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="login-box">
        <img class="avatar" src="img/login.jpg" alt="Avatar de la veterinaria">
        <h1>Recuperar contraseña</h1>

        <form method="post" action="recuperarContraseña.php">
            <!-- Email -->
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" placeholder="Ingresar correo electrónico">

            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>


