<?php  
ob_start();
?>




<div class="p-2 text-center">
  <?php  
    $text = 'Attention le chacolat est éxtrement <span class="badge badge-danger">dangereux</span> pour les chiens et chats';

    echo styleTitreNiveau1($text, COLOR_TITRE_CONSEIL);
  ?>

  <img class="img-fluid img-tumbnail" src="<?= URL ?>public/sources/images/Autres/Articles/Chocolat.jpg"/>

</div>


<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php";

 ?>