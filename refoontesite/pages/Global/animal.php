<?php 
include("../Commons/header.php");


$bdd = connexionPDO();
$req = "SELECT * FROM animal WHERE id_animal = :idAnimal";
$stmt = $bdd->prepare($req);
$stmt->bindValue("idAnimal", $_GET['idAnimal']);
$stmt->execute();
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();
echo $_GET['idAnimal'];
?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_TITRE_PENSIONNAIRE) ?>
<div class='row border border-dark rounded-lg m-2 align-items-center perso_bgGreen'>
    <div class="col p-2 text-center">
    <?php 
          $stmt = $bdd->prepare("
          
          SELECT i.id_image, i.libelle_image, i.url_image, i.description_image from image i
            INNER join contient c on c.id_image = i.id_image 
            INNER join animal a ON a.id_animal = c.id_animal
            WHERE a.id_animal = :idAnimal
          ")  ;
            $stmt->bindValue("idAnimal", $animal['id_animal']);
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            ?>
        <img src=' <?= $images [0]['url_image']?>' class="img-thumbnail" style="max-height:180px;" alt="Framboise" />
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
        <img src='../../sources/images/Autres/icones/<?= $iconeChien?>.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
                <img src='../../sources/images/Autres/icones/<?= $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
                <img src='../../sources/images/Autres/icones/<?= $iconeEnfant?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="mb-2">Puce : <?php if($animal['puce'] === null){echo "XXXXXXXXX";}else{echo $animal['puce'];} ?></div>
        <div class="mb-2">Né : <?= $animal['date_naissance_animal'] ?></div>
        <?php 
          $stmt = $bdd->prepare("
          
          SELECT c.libelle_caractere FROM caractere c INNER JOIN dispose d on d.id_caractere = c.id_caractere where id_animal = :idAnimal
          ")  ;
            $stmt->bindValue("idAnimal", $animal['id_animal']);
            $stmt->execute();
            $caracteres = $stmt->fetchall(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            ?>

                <div class="my-3">
                    <?php foreach($caracteres as $caractere) : ?>
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
                <?php foreach($images as  $key => $image): ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ; ?>" class="<?=( $key === 0 ) ? "active"  : ""; ?> bg-dark"></li>
                    <?php endforeach;?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach($images as  $key => $image): ?>
                            <div class="carousel-item <?=( $key === 0 ) ? "active"  : ""; ?>">
                        <img src="<?= $image['url_image']?>" class="img-fluid" alt="<?= $image['libelle_image']?>">
                        </div>
                    <!--<div class="carousel-item active">
                    <img src="../../sources/images/Animaux/Chats/Odin/Odin2.jpg" class="img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../../sources/images/Animaux/Chats/Odin/Odin3.jpg" class="img-fluid"alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../../sources/images/Animaux/Chats/Odin/Odin4.jpg" class="img-fluid" alt="...">
                    </div>-->
                    <?php endforeach;?>
                </div>
        </div>
        <div class="col-12 col-lg-6">
                <p><?= $animal['description_animal'] ?></p>
            </div>
        
    </div>
    








<?php  


include("../Commons/footer.php"); ?>