<?php  
ob_start();
?>



<div class="p-2 text-center">
  <?php  
    $text = 'Attention aux plantes <span class="badge badge-danger">toxiques</span> pour les chats';

    echo styleTitreNiveau1($text, COLOR_TITRE_CONSEIL);
  ?>

  <img class="img-fluid img-tumbnail" src="<?= URL ?>public/sources/images/Autres/Articles/Plantes toxiques.jpg"/>
  
</div>

<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php";

?>