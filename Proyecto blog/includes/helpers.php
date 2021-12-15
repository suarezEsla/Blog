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
    $_SESSION['errores'] = null;
    $_SESSION['completado'] = null;
    
    $borrado = session_unset();

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

function conseguirUltimasEntradas($conexion){
	/* $sql = "SELECT e.*, c.* FROM ENTRADAS e"."INNER JOIN categorias c ON e.categoria_id = c.id". "ORDER BY e.id DESC LIMIT 4"; */
/* $sql = "SELECT * FROM entradas"; */
 $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
		   "INNER JOIN categorias c ON e.categoria_id = c.id ";
	$entradas = mysqli_query($conexion, $sql);

	$resultado = array();

	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	return $resultado;
}
?>