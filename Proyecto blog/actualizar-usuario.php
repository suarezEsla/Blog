<?php


if(isset($_POST)){

	require_once './includes/conexion.php';
	

     
	
	
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
$email = isset($_POST['email']) ? (trim($_POST['email'])) : false;


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




//Si no hay errores en la validación del formulario
$guardar_usuario = false;
	
	if(count($errores) == 0){

        $usuario = $_SESSION['usuario'];

		$guardar_usuario = true;
		





		$usuario = $_SESSION['usuario'];
		
		// ACTUALIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
		$sql = "UPDATE usuarios SET ".
				   "nombre = '$nombre', ".
				   "apellidos = '$apellidos', ".
				   "email = '$email' ".
				   "WHERE id = ".$usuario['id'];

		$guardar = mysqli_query($db, $sql);
		
//		var_dump(mysqli_error($db));
//		die();
		
		if($guardar){
            //Si se ejecuta la consulta update, me actualiza los valores del array usuario en la sesión con los nuevos valores
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellidos;
            $_SESSION['usuario']['email'] = $email;
			$_SESSION['completado'] = "Datos de usuario actualizados correctamente.";

		}else{
			$_SESSION['errores']['general'] = "ERROR. Fallo al actualizar los datos de usuario.";
		}

    }else{
        $_SESSION['errores']['general'] = "ERROR. El e-mail ya está registrado en la base de datos.";
    }
		
	}else{
		$_SESSION['errores'] = $errores;
	}


header('Location: mis-datos.php');
?>