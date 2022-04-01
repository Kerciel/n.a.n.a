<?php  
ob_start();
echo styleTitreNiveau1("Erreur",COLOR_TITRE_ASSO);
?>
<div class="alert alert-danger text-center" role="alert">
<?= $erreurmessage?>
</div>


<?php  
$content = ob_get_clean();
require_once("views/front/commons/template.php");
?>