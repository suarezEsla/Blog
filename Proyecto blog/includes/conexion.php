<?php

//Conexión a BBDD
$servidor = 'localhost';
$usuario = 'root';
$password = "";
$bbdd = "blog";

$db = mysqli_connect($servidor, $usuario, $password, $bbdd);

mysqli_query($db, "SET NAMES 'utf8'");


//Iniciar sesión
if(!isset($_SESSION)){
    session_start();
}

?>