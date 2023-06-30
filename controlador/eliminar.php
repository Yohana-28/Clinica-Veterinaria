<?php
include_once("../modelo/conect.php");

if (
    isset($_POST["id_dueño"]) 
  
) {
    $id = $_POST["id_dueño"];
   

    print($id);

    $sentencia = $bd->prepare("DELETE FROM dueño_mascota WHERE  id_dueño = $id;");

    $resultado = $sentencia->execute();

    if ($resultado) {
        echo "<script> alert('Actualización realizada'); location.href = '../vista/listado.php';</script>";
    } else {
        echo "Error";
    }
} else {
    echo "Faltan datos en el formulario.";
}
?>