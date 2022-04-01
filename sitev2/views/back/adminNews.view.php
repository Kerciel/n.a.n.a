<?php  
ob_start();
echo styleTitreNiveau1("Gestion des News","perso_ColorAdminMenu");
?>
<div class="row">
    <div class="col text-center">
        <a href="genererNewsAdminAjout" class="btn btn-primary">Ajout</a>
    </div>
    <div class="col text-center">
        <a href="genererNewsAdminModif" class="btn btn-primary">Modifier</a>
    </div>
</div>
<br/>
<br/>

<?= $admindNewscontent ?>

<?php if($alertype === 1) { ?>
<div class="alert alert-success" role="alert">
    <?= $alert ?>
</div>
<?php } elseif ($alertype === 2) {?>
    <div class="alert alert-danger" role="alert">
    <?= $alert ?>
</div>
<?php }?>
<?php  
$content = ob_get_clean();
require_once("views/front/commons/template.php");
?>