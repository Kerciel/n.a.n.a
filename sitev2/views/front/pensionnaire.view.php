
<?php 
ob_start();
echo styleTitreNiveau1($titreh1, COLOR_TITRE_PENSIONNAIRE); ?>
<div class='row no-gutters'>
    <?php foreach($animaux as $animal ):?>
    <div class="col-12 col-lg-6">
        <div class='row border border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgGreen" : "perso_bgRose"; ?>' style="height:200px;">
            <div class="col p-2 text-center">
                <?php if($animal['image'] != NULL) : ?>
                <img src='<?= $animal['image']['url_image'] ?>' class="img-thumbnail" style="max-height:180px;" alt="<?= $animal['image']['libelle_image'] ?>" />
                <?php endif; ?>
            </div>

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
            <div class="col-2 border-left border-right border-dark text-center">
                <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChien?>.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
                <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
                <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeEnfant?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
            </div>
            <div class="col-6 text-center">
                <div class="perso_policeTitre perso_size20 mb-3"><?= $animal['nom_animal']?></div>
                <div class="mb-2">Né : <?= $animal['date_naissance_animal']?></div>

                <div class="my-3">
                    <?php foreach($animal['caracteres'] as $caractere) : ?>
                        <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?= $caractere['libelle_caractere'] ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="animal&idAnimal=<?= $animal['id_animal']?>" class="btn btn-primary">Visiter ma page </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php 
$content = ob_get_clean();
require_once("views/front/commons/template.php"); 
?>
            
      