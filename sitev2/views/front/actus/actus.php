<?php  
ob_start(); ?>



<?= styleTitreNiveau1($titreh1, COLOR_TITRE_ACTUS) ?>
<?php foreach($actualites as $actualite): ?>
<!--debut article-->
<div class="row no-gutters mt-3">
    <div class="col-12">
        <h3 class=" perso_policeTitre perso_size30 ">Poster le : <span class="perso_ColorVertMenu"><?= $actualite['date_publication_actualite'] ?></span > par <span class="perso_ColorVertMenu"><?= $actualite['libelle_actualite'] ?></span></h3>
    </div>
</div>
<hr style="margin: 0;">
<div class="row no-gutters pl-5 mt-5 align-items-center">
    <div class="col-12 col-lg text-center">
        <img class="img-fluid" src="<?= $actualite['url_image'] ?>" alt="Framboise" style="max-height: 200px;"/>
    </div>
    <div class="col-12 m-2 col-lg-10 pl-2 d-flex flex-column">
        <p><?= $actualite['contenu_actualite'] ?></p>
    </div>
</div>
<!--fin article-->
<?php endforeach; ?>




<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php"; ?>