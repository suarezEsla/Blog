<!--https://proxmox.iestetuan.es:8006/#v1:0:18:4:::::::-->






<!--Sidebar-->
<aside id="sidebar">


<!--Sólo si existe la sesión 'usuario' (login), se abre un div y muestro el array usuario que está
guardado en la sesión (únicamente los índices nombre y apellido)-->
<?php if(isset($_SESSION['usuario'])): ?>
    <div id="usuario-logueado" class="block-aside">
<h3>Bienvenido/a, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ;  ?></h3>
<!--Botón para cerrar la sesión en caso de que el usuario esté logueado-->
<a class="bubbly-button " href="crear-entrada.php">Crear Entrada</a>
<a class="bubbly-button " href="crear-categoria.php">Crear Categoría</a>
<a class="bubbly-button " href="cerrar.php">Crear Categoría</a>
<a class="bubbly-button " href="mis-datos.php">Mis Datos</a>
<a class="bubbly-button " href="cerrar.php">Cerrar Sesión</a>
    </div>
<?php endif; ?>

<!--SI NO EXISTE LA SESIÓN USUARIO, MUESTRA LOS PANELES DE LOGIN Y REGISTRO-->
<?php if(!isset($_SESSION['usuario'])): ?>



<!--LOGIN-->
            <div id="login" class="block-aside">
                <h3>Identifícate</h3>

                        <?php if(isset($_SESSION['error_login'])): ?>
            <div  class="alerta-error">
     <?= $_SESSION['error_login'];?>
            </div>
        <?php endif; ?>


                <form action="login.php" method="POST">
                    <label for="email">e-mail</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">

                    <input class="bubbly-button" type="submit" name="submit" value="Entrar">
                </form>
                
            </div>

            <div id="register" class="block-aside">

           
<!--REGISTRO-->
                <h3>Regístrate</h3>

<!--Mostrar errores-->

<!--Sesíon completado sólo existe en caso de que haya funcionado la consulta de inserción a la bd-->
               <?php if(isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">     
                 <?= $_SESSION['completado']?>
                 </div>

               <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">     
                 <?= $_SESSION['errores']= "Error en registro";?>
                 </div>
<?php endif; ?>

                <form action="registro.php" method="POST">
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
                    <input type="text" name="nombre" id="nombre">

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
                    <input type="text" name="apellidos" id="Apellidos">

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
                    <input type="email" name="email" id="email">

                    <?php 
if(isset($_SESSION['errores'])){
    ?>
    <div class="alerta-error"> <?php
    echo mostrarError($_SESSION['errores'], 'password');
    ?>
    </div>
    <?php
}
?>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">

        
                    <input class="bubbly-button" type="submit" name="submit" value="Registrarse">
                </form>

                <?php
                borrarErrores();
                ?>
            </div>
<?php endif; ?>
        </aside>