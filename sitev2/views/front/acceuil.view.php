<?php  
ob_start();
echo styleTitreNiveau1("Ils ont besoin de vous!",COLOR_TITRE_ASSO);
?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php foreach($animaux as $key => $animal) : ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?=( $key === 0 ) ? "active"  : ""; ?> bg-dark"></li>
    <?php endforeach; ?>
    
  </ol>
  <!--Debut item-->
  <div class="carousel-inner">
      <?php foreach($animaux as $key => $animal) : ?>
    <div class="carousel-item <?=( $key === 0 ) ? "active"  : ""; ?>">
      <div class="row no-gutters border rounded overflow-hidden mb-4 perso_bgRose">
            <div class="col-12 col-md-auto text-center ">
                <img src="<?= $animal['url_image'] ?>" style="height:200px" alt="<?= $animal['libelle_image'] ?>">
            </div>
            <div class="col p-4 d-flex flex-column position-static" >
                <h3 class="perso_ColorRoseMenu perso_policeTitre perso_textShadow"><?= $animal['nom_animal']?></h3>
                <div class="text-muted mb-1"><?= $animal['date_naissance_animal']?></div>
                <a href="#" class="btn btn-primary" >Visiter ma page</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!--Fin item-->
  </div>
</div>



<div class="row">
    <div class="col-12 col-lg-6">
    <?php     
        $text = '<img  src="public/sources/images/Autres/icones/journal.png" alt="logo News" /> Nouvelles des adoptés';
        echo styleTitreNiveau2($text, COLOR_TITRE_ACTUS);    ?>
        <div class="row no-gutters border rounded mb-4 perso_bgGreen">
            <div class="col-12 col-lg-4 d-none d-lg-block">
            <img src="<?= $new['url_image']?>" class="img-fluid" style="max-height:200px;" alt="" >
            </div>
            <div class="col-12 col-lg-8 p-3 d-flex flex-column position-static">
                <h3 class="mb-0 mt-2 perso_ColorVertMenu perso_policeTitre perso_textShadow" ><?= $new['libelle_actualite'] ?></h3>
                <p class="perso_size12" style="width:200px;"><?= $new['contenu_actualite'] ?></p>
                <a href="#" class="btn btn-primary" >Visiter ma page</a>
            </div>
        </div>
    </div>
    <div class=" col-12 col-lg-6">
    <?php     
    $text = '<img  src="public/sources/images/Autres/icones/action.png" alt="logo News" />Evénement & Actions';
        echo styleTitreNiveau2($text,  COLOR_TITRE_PENSIONNAIRE);    ?>
        <div class="row no-gutters border rounded mb-4 perso_bgOrange">
                <div class="col-12 col-lg-4 d-none d-lg-block text-center">
                <img src="<?= $event['url_image'] ?>" class="img-fluid" style="max-height:200px;" alt="phot de framboire" >
                </div>
                <div class="col-12 col-lg-8 p-3 d-flex flex-column position-static">
                    <h3 class="mb-0 mt-2 perso_ColorOrangeMenu perso_policeTitre perso_textShadow" ><?= $event['libelle_actualite'] ?></h3>
                    <p class="perso_size12"><?= $event['contenu_actualite'] ?></p>
                    <a href="#" class="btn btn-primary" >Visiter ma page</a>
                </div>
        </div>
    </div>
</div>

<?php  
$content = ob_get_clean();
require_once("views/front/commons/template.php");
?>