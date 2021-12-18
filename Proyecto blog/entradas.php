<?php

require_once './includes/cabecera.php';
  ?> 
    
   


        <?php
        require_once "./includes/lateral.php";
        
        ?>


 <!--Caja principal-->
 <div id="principal">
     <h1>Todas las entradas</h1>

     <!--Imprimo las entradas del blog llamando a un bucle -->
     <?php
     $entradas = conseguirEntradas($db, null); //ver helpers (parámetro LIMIT en la consulta sql)
     
     if(!empty($entradas)):
       while($entrada = mysqli_fetch_assoc($entradas)): 
?>
     <!-- <article class="entrada"> -->
       <!--Nos lleva a entrada.php y con el id de la entrada por get-->
     <!-- <a href="entrada.php?id=<?=$entrada['id']?>">
         <h2><?= $entrada['titulo'];?></h2>
       <span class="fecha"><?= $entrada['categoria']." | ".$entrada['fecha']; ?></span>

         <p><?= substr($entrada['descripcion'], 0,250) ?></p>
         <img class="imagen" src="<?=  './assets/img/'.  $entrada['imagen'].'.png';?>" alt="foto-entrada" width="30%" height="30%">
         </a>
        </article>  -->

        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?=  './assets/img/'.  $entrada['imagen'].'.png';?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $entrada['titulo'];?></h5>
    <p class="card-text"><?= substr($entrada['descripcion'], 0,250) ?></p>
    <a href="entrada.php?id=<?=$entrada['id']?>" class='link-entrada'">Ver</a>
  </div>
</div>





<?php
         endwhile;
        endif;
?>     
        
 <!--Fin principal-->
 </div>

   

   <?php
   require_once './includes/footer.php';
   ?>
</body>
</html>