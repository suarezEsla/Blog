<?php

if(isset($_POST)){
    require_once './includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

//Array de errores
$errores = array();

//Validación de nombre
if(!empty($nombre) && !is_numeric($nombre) ){
    $nombre_validado = true;
}else{
    $nombre_validado = false;
    $errores['nombre'] = "ERROR.El nombre no es válido";
   
}
if (count($errores) == 0){
    $sql = "INSERT INTO categorias VALUES (null, '$nombre')";

    $guardar = mysqli_query($db, $sql);

  
}
}

header('Location: index.php');

?>