<?php 
ob_start();

?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_TITRE_PENSIONNAIRE) ?>
<div class='row border border-dark rounded-lg m-2 align-items-center perso_bgGreen'>
    <div class="col p-2 text-center">
        <?php if( $animal ['images'] != NULL) :?>
        <img src=' <?= $animal ['images'][0]['url_image']?>' class="img-thumbnail" style="max-height:180px;" alt="Framboise" />
        <?php endif; ?>
    </div>
    <div class="col-2 col-md-1 border-left border-right border-dark text-center">
    <?php  $iconeChien = "";
            if($animal['ami_chien']=== "oui")$iconeChien = "chienOk" ;
            else if ($animal['ami_chien'] === "non") $iconeChien = "ChienBar";
            else if ($animal['ami_chien'] === "N/A") $iconeChien  = "ChienQuest";
            $iconeChat = "";
            if($animal['ami_chat']=== "oui")$iconeChat = "chatOk" ;
            else if ($animal['ami_chat'] === "non") $iconeChat = "ChatBar";
            else if ($animal['ami_chien'] === "N/A") $iconeChat  = "ChatQuest";
            $iconeEnfant = "";
            if($animal['ami_enfant']=== "oui")$iconeEnfant = "babyOk" ;
            else if ($animal['ami_enfant'] === "non") $iconeEnfant = "babyBar";
            else if ($animal['ami_enfant'] === "N/A") $iconeEnfant  = "babyQuest";
            ?>
        <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChien?>.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
                <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
                <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeEnfant?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="mb-2">Puce : <?php if($animal['puce'] === null){echo "XXXXXXXXX";}else{echo $animal['puce'];} ?></div>
        <div class="mb-2">Né : <?= $animal['date_naissance_animal'] ?></div>
        

                <div class="my-3">
                    <?php foreach($animal['caracteres'] as $caractere) : ?>
                        <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?= $caractere['libelle_caractere'] ?></span>
                    <?php endforeach; ?>
                </div>
    </div>
    <div class="col-12 col-md-4">
        Frais d'adoption : <?= $animal['adoption_desc_animal'] ?><br />
        Vaccins : 35€ (à la demande de l'adoptant)<br />
        Stérilisation : <?= $animal['engagement_animal'] ?>
    </div>
</div>

    <div class="row no-gutters">
        <div class="col-12">
            <h3 class="text-right mt-3 perso_ColorOrangeMenu perso_policeTitre perso_textShadow">Qui suis je?</h3>
        </div>

        <div class="row">
            
        <div id="carouselExampleIndicators" class="col-12 col-lg-6 carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                <?php foreach($animal['images']  as  $key => $image): ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ; ?>" class="<?=( $key === 0 ) ? "active"  : ""; ?> bg-dark"></li>
                    <?php endforeach;?>
                </ol>
                <div class="carousel-inner" style="max-height: 400px; max-width:200px;">
                    <?php foreach($animal['images'] as  $key => $image): ?>
                            <div class="carousel-item <?=( $key === 0 ) ? "active"  : ""; ?>">
                        <img src="<?= $image['url_image']?>" class="img-fluid" alt="<?= $image['libelle_image']?>" style="max-height: 400px;">
                        </div>
                    <?php endforeach;?>
                </div>
        </div>
        <div class="col-12 col-lg-6">
                <p><?= $animal['description_animal'] ?></p>
            </div>
        
    </div>
    

</div>






<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php";
 ?>