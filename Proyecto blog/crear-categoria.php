<?php

require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';

?>
<!--Caja principal-->
 <div id="principal">
     <h1>Crear categorías</h1>
     <p>Añade nuevas categorías al blog</p>
     <br>
<form id="form-categoria" action="guardar-categoria.php" method="POST">
    <label for="nombre">Nombre de la categoría</label>
    <input type="text" name="nombre" id="">

    <input type="submit" value="Guardar">
</form>


</div>
<div id="ver-todas">
 </div>

 <?php require_once './includes/footer.php';
