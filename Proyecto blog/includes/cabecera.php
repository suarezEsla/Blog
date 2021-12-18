<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>ビデオゲームブログ</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
		
	</head>
	<body>
		<!-- CABECERA -->
		<header id="cabecera">
			<!-- LOGO -->
			<div id="logo">
				<a href="index.php">
				ビデオゲームブログ
				</a>
			</div>
			
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<?php 
                    /***********LISTAR CATEGORÍAS CON UN BUCLE */
                    //Llamo a función conseguirCategorias en Helpers
						$categorias = conseguirCategorias($db);
						if(!empty($categorias)):
							while($categoria = mysqli_fetch_assoc($categorias)): 
					?>
								<li>
									<a href="categoria.php?id=<?=$categoria['id']?>"> <?=$categoria['nombre']?> </a>
								</li>
					<?php
							endwhile;
						endif;
					?>
					<li>
						<a href="index.php">Sobre mí</a>
					</li>
					<li>
						<a href="index.php">Contacto</a>
					</li>
				</ul>
			</nav>
			
			<div class="clearfix"></div>
		</header>
		
		<div id="container">