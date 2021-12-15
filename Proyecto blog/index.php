<?php

require_once './includes/cabecera.php';
  ?> 
    
   


        <?php
        require_once "./includes/lateral.php";
        
        ?>


 <!--Caja principal-->
 <div id="principal">
     <h1>Últimas entradas</h1>

     <!--Imprimo las entradas del blog llamando a un bucle -->
     <?php
     $entradas = conseguirUltimasEntradas($db);
     
     if(!empty($entradas)):
       while($entrada = mysqli_fetch_assoc($entradas)): 
?>
     <article class="entrada">
         <a href="">
         <h2><?= $entrada['titulo'];?></h2>
       <span class="fecha"><?= $entrada['categoria'].' | '.$entrada['fecha']; ?></span>

         <p><?= substr($entrada['descripcion'], 0,250) ?></p>
         <img class="imagen" src="<?=  './assets/img/'.  $entrada['imagen'].".png" ?>" alt="foto-entrada" width="30%" height="30%">
         </a>
        </article> 
<?php
         endwhile;
        endif;
?>     
        <div id="ver-todas">
     <a href="">Ver todas las entradas</a>
 </div>
 <!--Fin principal-->
 </div>

   



   <?php
   require_once './includes/footer.php';
   ?>
</body>
</html>