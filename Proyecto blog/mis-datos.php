<?php

require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php'; ?>
<!--Caja principal-->
 <div id="principal">
     <h1>Mis datos</h1>
     <form id='form-categoria' action="actualizar-usuario.php" method="POST">
                <?php 
if(isset($_SESSION['errores'])){
    ?>

    <div class="alerta-error"> <?php
    echo mostrarError($_SESSION['errores'], 'nombre');
    ?>
    </div>
    <?php
}
?>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>">

                    <?php 
if(isset($_SESSION['errores'])){
    ?>
    <div class="alerta-error"> <?php
    echo mostrarError($_SESSION['errores'], 'apellidos');
    ?>
    </div> <?php
}
?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="Apellidos" value="<?= $_SESSION['usuario']['apellidos']; ?>">

                    <?php 
if(isset($_SESSION['errores'])){
    ?>
    <div class="alerta-error"> <?php
    echo mostrarError($_SESSION['errores'], 'email');
    ?>
    </div>
    <?php
}
?>
                    <label for="email">e-mail</label>
                    <input type="email" name="email" id="email" value="<?= $_SESSION['usuario']['email']; ?>">
                    <?php if(isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">     
                 <?= $_SESSION['completado']?>
                 </div>

               <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">     
                 <?= $_SESSION['errores']['general']= "Error en registro";?>
                 </div>
                 <?php endif; ?>
                    
                  
                    <input type="submit" name="submit" value="Actualizar">
                   


                   
                </form>
                <?php
                borrarErrores();
                ?>
<!-- Fin principal-->
</div>

<?php require_once './includes/footer.php';

?>