<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
	$entrada_actual = conseguirEntrada($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1><?=$entrada_actual['titulo']?></h1>
	
	
		<h2><?=$entrada_actual['categoria']?></h2>
	    <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario'] ?></h4>
        <p><?= $entrada_actual['descripcion'] ?></p>
        <img class="imagen" src="<?=  './assets/img/'.  $entrada_actual['imagen'].'.png';?>" alt="foto-entrada" width="30%" height="30%">
    </a>



	
	
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>