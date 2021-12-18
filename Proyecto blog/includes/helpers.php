<?php
require_once 'conexion.php';
function mostrarError($errores, $campo){
    $alerta = "";
if(isset($errores[$campo]) && !empty($campo)){
$alerta = '<div class="alerta_error">'.$errores[$campo].'</div>';
}
return $alerta;
}

function borrarErrores(){
	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
	if(isset($_SESSION['error_login'])){
		$_SESSION['error_login'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['errores_entrada'])){
		$_SESSION['errores_entrada'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}

function conseguirCategorias($conexion){
	$sql = "SELECT * FROM categorias ORDER BY id ASC;";
	$categorias = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($categorias && mysqli_num_rows($categorias) >= 1){
		$resultado = $categorias;
	}
	
	return $resultado;
}

function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
		 "INNER JOIN categorias c ON e.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE e.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
	}
	
	$sql .= "ORDER BY e.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}


function conseguirCategoria($conexion, $id){
	$sql = "SELECT * FROM categorias WHERE id = $id;";
	$categoria = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($categoria && mysqli_num_rows($categoria) == 1){
		$resultado = mysqli_fetch_assoc($categoria);
	}
	
	return $resultado;
}

function conseguirEntrada($conexion, $id){
	$sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
		  . " FROM entradas e ".
		   "INNER JOIN categorias c ON e.categoria_id = c.id ".
		   "INNER JOIN usuarios u ON e.usuario_id = u.id ".
		   "WHERE e.id = $id";
/* $sql = "SElect * from entradas"; */
	$entrada = mysqli_query($conexion, $sql);
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
		
}

return $resultado;




}

?>