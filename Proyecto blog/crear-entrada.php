<?php

require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';

?>
<!--Caja principal-->
 <div id="principal">
     <h1>Crear categorías</h1>
     <p>Añade nuevas entradas al blog</p>
     <br>
<form id="form-categoria" action="guardar-entrada.php" method="POST">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="">

    <label for="descripcion">Descripción</label>
  <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

    <label for="categoria">Categoría</label>

    <select name="categoria" id="">
        <?php
        $categorias = conseguirCategorias($db);

        if(!empty($categorias)):
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?>

<option value="<?= $categoria['id'] ?>">
        <?= $categoria['nombre'] ?>
</option>
        <?php

        endwhile;
    endif;
        ?>
    </select>

    <input type="submit" value="Guardar">
</form>


</div>
<div id="ver-todas">
 </div>

 <?php require_once './includes/footer.php';