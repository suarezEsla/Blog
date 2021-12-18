<?php

//Iniciar la sesión y la conexión a la bd
require_once 'includes/conexion.php';

//Recoger los datos del formulario login

if(isset($_POST)){

//Si existiera la sesión de error se destruye porque ya se habría solventado
if(isset($_SESSION['error_login'])){
    session_unset();
}

//Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];


//Consultar las credenciales del usuario

//Select para sacar los usuarios que en la bd tengan el mismo email que el pasado por $post
$sql = "SELECT * FROM usuarios WHERE email = '$email'"; 
//Se envía la query a la bd 
$login = mysqli_query($db, $sql);


//Si la query funciona, y existe exactamente 1 resultado
if($login && mysqli_num_rows($login) == 1){

    //Se guarda el resultado en un array asociativo llamado $usuario
    $usuario = mysqli_fetch_assoc($login);
    /* var_dump($usuario); */



//Comprobar la contraseña 

//Comprueba que la password pasada por post sea la misma que hay en la bd (ya cifrada)
$verify = password_verify($password, $usuario['password']);


//Si se verifica que las dos contraseñas son iguales
if($verify){
//Creo una sesión en la que guardo los datos del usuario

$_SESSION['usuario'] = $usuario;





}else{
//Si no, crear una sesión con el error

$_SESSION['error_login'] = 'Login incorrecto.';
}

}else{
//Mensaje de error

$_SESSION['error_login'] = 'Login incorrecto.';
}

}

header('Location: index.php');




//Hacer consulta a bd para comprobar las credenciales del usuario 





//Redirigir al index





?>