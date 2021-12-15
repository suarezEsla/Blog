<?php


if(isset($_POST)){

	require_once './includes/conexion.php';
	
if(!isset($_SESSION)){
	session_start();
}
     
	
	
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
$email = isset($_POST['email']) ? (trim($_POST['email'])) : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;

//Array de errores
$errores = array();


//Validar los datos

//Validación de nombre
if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){
    $nombre_validado = true;
}else{
    $nombre_validado = false;
    $errores['nombre'] = "ERROR.El nombre no es válido";
   
}

//Validación de apellidos
if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)){
    $apellidos_validado = true;
}else{
    $apellidos_validado = false;
    $errores['apellidos'] = "ERROR. Los apellidos no son válidos";
}

//Validación email
if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_validado = true;
}else{
    $email_validado = false;
    $errores['email'] = "ERROR. e-mail no válido";
}

//Validación de contraseña
if(!empty($password)){
    $password_validado = true;
}else{
    $password_validado = false;
    $errores['password'] = "ERROR. password no válido";
}


//Si no hay errores en la validación del formulario
$guardar_usuario = false;
	
	if(count($errores) == 0){
		$guardar_usuario = true;
		
		// Cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
		
		// INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
		$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
		$guardar = mysqli_query($db, $sql);
		
//		var_dump(mysqli_error($db));
//		die();
		
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
		}
		
	}else{
		$_SESSION['errores'] = $errores;
	}
}

header('Location: index.php');
?>