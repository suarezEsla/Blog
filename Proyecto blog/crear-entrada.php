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

    <?php if(isset($_SESSION['errores_entrada']['titulo'])){ ?>

    <div class="alerta-error"> <?php
    echo mostrarError($_SESSION['errores_entrada'], 'titulo');
    ?>
    </div>
    <?php
}?>

    <label for="descripcion">Descripción</label>
  <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

  <?php if(isset($_SESSION['errores_entrada']['descripcion'])){ ?>

<div class="alerta-error"> <?php
echo mostrarError($_SESSION['errores_entrada'], 'descripcion');
?>
</div>
<?php
}?>

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

<?php if(isset($_SESSION['errores_entrada']['categoria'])){ ?>
<div class="alerta-error"> <?php
echo mostrarError($_SESSION['errores_entrada'], 'categoria');
?>

</div>
<?php
}?>


        <?php

        endwhile;
    endif;
        ?>
    </select>
    

    <input type="submit" value="Guardar">
</form>
<?php
borrarErrores();

?>

</div>
<div id="ver-todas">
 </div>

 <?php require_once './includes/footer.php';