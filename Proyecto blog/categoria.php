<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
	$categoria_actual = conseguirCategoria($db, $_GET['id']);

	if(!isset($categoria_actual['id'])){
		header("Location: index.php");
	}
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Entradas de <?=$categoria_actual['nombre']?></h1>
	
	<?php 
		$entradas = conseguirEntradas($db, null, $_GET['id']);

		if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<!-- <article class="entrada">
					<a href="entrada.php?id=<?=$entrada['id']?>">
						<h2><?=$entrada['titulo']?></h2>
						<span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 180)."..."?>
						</p>
					</a>
				</article> -->
				<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?=  './assets/img/'.  $entrada['imagen'].'.png';?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $entrada['categoria'];?></h5>
    <p class="card-text"><?= $entrada['descripcion'] ?></p>
    
  </div>
</div>


	<?php
			endwhile;
		else:
	?>
		<div class="alerta-error">No hay entradas en esta categoría</div>
	<?php endif; ?>
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>