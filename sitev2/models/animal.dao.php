<?php
require_once("pdo.php");

function getAllanimalAdopte()
{
  $bdd = connexionPDO();
  $req = "SELECT * FROM animal a inner join contient c on a.id_animal = c.id_animal 
  inner join  image i on c.id_image = i.id_image where a.id_statut = 1 
  group by a.id_animal
  limit  3";
  $stmt = $bdd->prepare($req);
  $stmt->execute();
  $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $animaux; 
}
//recupere les informations des animaux en fonctions des statuts
function getAnimalFromStatut($idstatut)
{
    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_statut = :idstatut";
if( (int) $idstatut === 2 ){ $req .= ' or id_statut = 4'; }
$stmt = $bdd->prepare($req);
$stmt->bindValue("idstatut", $idstatut, PDO::PARAM_INT);
$stmt->execute();
$animaux = $stmt->fetchall(PDO::FETCH_ASSOC);
$stmt->closeCursor();
return $animaux;
}

function getAnimalFromId($id_animal)
{
  $bdd = connexionPDO();
  $req = "SELECT * FROM animal WHERE id_animal = :idAnimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idAnimal", $id_animal, PDO::PARAM_INT);
  $stmt->execute();
  $animal = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $animal;
}

function getImagesFromAnimal($id_animal)
{
  $bdd = connexionPDO();
          $stmt = $bdd->prepare("
          
          SELECT i.id_image, i.libelle_image, i.url_image, i.description_image from image i
            INNER join contient c on c.id_image = i.id_image 
            INNER join animal a ON a.id_animal = c.id_animal
            WHERE a.id_animal = :idAnimal
          ")  ;
            $stmt->bindValue("idAnimal", $id_animal, PDO::PARAM_INT);
            $stmt->execute();
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $images;

}

function getFirstImageFromAnimal($id_animal)
{
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
          
          SELECT i.id_image, i.libelle_image, i.url_image, i.description_image from image i
            INNER join contient c on c.id_image = i.id_image 
            INNER join animal a ON a.id_animal = c.id_animal
            WHERE a.id_animal = :idAnimal
            LIMIT 1
          ")  ;
            $stmt->bindValue("idAnimal", $id_animal, PDO::PARAM_INT);
            $stmt->execute();
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
    return $image;
}


function getCaratctereFromAnimal($id_animal)
{
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
          
    SELECT c.libelle_caractere FROM caractere c INNER JOIN dispose d on d.id_caractere = c.id_caractere where id_animal = :idAnimal
    ")  ;
      $stmt->bindValue("idAnimal", $id_animal, PDO::PARAM_INT);
      $stmt->execute();
      $caracteres = $stmt->fetchall(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $caracteres;
}

function getStatuts()
{
  $bdd = connexionPDO();
  $stmt = $bdd->prepare("
          
    SELECT * FROM statut
    ")  ;
      $stmt->execute();
      $statuts = $stmt->fetchall(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $statuts;
}

function getCaracteres()
{
  $bdd = connexionPDO();
  $stmt = $bdd->prepare("
          
    SELECT * FROM caractere
    ")  ;
      $stmt->execute();
      $caracteres = $stmt->fetchall(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $caracteres;
}

function insertAnimalBD($nom,$puce,$date_naissance,$type_animal,$amie_chient,$sexe_animal, $statut_animaux,$amie_chat, $amie_bebe, $descri_animal, $adoption_animal,$engagement_aniaml,$localisation_animal,$idimage,$caractere1, $caractere2, $caractere3 )
{
  $bdd = connexionPDO();
  $req = "INSERT INTO `animal`(`nom_animal`, `type_animal`, `puce`, `sexe`, `date_naissance_animal`, `ami_chien`, `ami_chat`, `ami_enfant`, `description_animal`, `adoption_desc_animal`, `localisation_animal`, `engagement_animal`, `id_statut`) 
  VALUES (:nom, :type_anima, :puce, :sexe,:date_naissance_animal,:ami_chien,:ami_chat,:ami_enfant,:description_animal,:adoption_desc_animal,:localisation_animal,:engagement_animal,:id_statut)";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("nom", $nom, PDO::PARAM_STR);
  $stmt->bindValue("type_anima", $type_animal, PDO::PARAM_STR);
  $stmt->bindValue("puce", $puce);
  $stmt->bindValue("sexe", $sexe_animal, PDO::PARAM_INT);
  $stmt->bindValue("date_naissance_animal", $date_naissance);
  $stmt->bindValue("ami_chien", $amie_chient, PDO::PARAM_STR);
  $stmt->bindValue("ami_chat", $amie_chat, PDO::PARAM_STR);
  $stmt->bindValue("ami_enfant", $amie_bebe, PDO::PARAM_STR);
  $stmt->bindValue("description_animal", $descri_animal, PDO::PARAM_STR);
  $stmt->bindValue("adoption_desc_animal", $adoption_animal, PDO::PARAM_STR);
  $stmt->bindValue("localisation_animal", $localisation_animal, PDO::PARAM_STR);
  $stmt->bindValue("engagement_animal", $engagement_aniaml, PDO::PARAM_STR);
  $stmt->bindValue("id_statut", $statut_animaux, PDO::PARAM_INT);
  $animal = $stmt->execute();
  $idanimal = $bdd->lastInsertId();
  $stmt->closeCursor();
  if($animal > 0) {
    linkCarctereAnimal($caractere1, $caractere2, $caractere3,  $idanimal);
    linkImageAnimal($idimage, $idanimal);
    return true;} else return false;
}

function linkImageAnimal($idimage, $idanimal)
{
  $bdd = connexionPDO();
  $req = "INSERT INTO `contient`(`id_image`, `id_animal`) 
  VALUES (:idimge,:idanimal)";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idimge", $idimage, PDO::PARAM_INT);
  $stmt->bindValue("idanimal", $idanimal, PDO::PARAM_INT);
  $animal = $stmt->execute();
  $stmt->closeCursor();
}

function linkCarctereAnimal($caractere1, $caractere2, $caractere3,  $idanimal)
{
  $bdd = connexionPDO();
  $req = "INSERT INTO `dispose`(`id_caractere`, `id_animal`) 
  VALUES (:caractere1,:idanimal),
  (:caractere2,:idanimal),
  (:caractere3,:idanimal)";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("caractere1", $caractere1);
  $stmt->bindValue("caractere2", $caractere2);
  $stmt->bindValue("caractere3", $caractere3);
  $stmt->bindValue("idanimal", $idanimal, PDO::PARAM_INT);
  $animal = $stmt->execute();
  $stmt->closeCursor();
}

function updateAnimalBD($idanimal,$nom,$puce,$date_naissance,$type_animal,$amie_chient,$sexe_animal, $statut_animaux,$amie_chat, $amie_bebe, $descri_animal, $adoption_animal,$engagement_aniaml,$localisation_animal, $caractere1, $caractere2, $caractere3 )
{
  
  $bdd = connexionPDO();
  $req = "update `animal`
  set `nom_animal` = :nom, `type_animal`= :type_anima, `puce` = :puce, `sexe` = :sexe, `date_naissance_animal` = :date_naissance_animal, `ami_chien` = :ami_chien, `ami_chat` = :ami_chat, `ami_enfant` = :ami_enfant, `description_animal` = :description_animal, `adoption_desc_animal` = :adoption_desc_animal, `localisation_animal` = :localisation_animal, `engagement_animal` = :engagement_animal, `id_statut` = :id_statut 
  where id_animal = :idanimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("nom", $nom, PDO::PARAM_STR);
  $stmt->bindValue("type_anima", $type_animal, PDO::PARAM_STR);
  $stmt->bindValue("puce", $puce);
  $stmt->bindValue("idanimal", $idanimal, PDO::PARAM_INT);
  $stmt->bindValue("sexe", $sexe_animal, PDO::PARAM_INT);
  $stmt->bindValue("date_naissance_animal", $date_naissance);
  $stmt->bindValue("ami_chien", $amie_chient, PDO::PARAM_STR);
  $stmt->bindValue("ami_chat", $amie_chat, PDO::PARAM_STR);
  $stmt->bindValue("ami_enfant", $amie_bebe, PDO::PARAM_STR);
  $stmt->bindValue("description_animal", $descri_animal, PDO::PARAM_STR);
  $stmt->bindValue("adoption_desc_animal", $adoption_animal, PDO::PARAM_STR);
  $stmt->bindValue("localisation_animal", $localisation_animal, PDO::PARAM_STR);
  $stmt->bindValue("engagement_animal", $engagement_aniaml, PDO::PARAM_STR);
  $stmt->bindValue("id_statut", $statut_animaux, PDO::PARAM_INT);
  $animal = $stmt->execute();
  $stmt->closeCursor();
  if($animal > 0) {
    return true;} else return false;
}

function updateCarctereAnimal($caractere1, $caractere2, $caractere3,  $idanimal) 
{
  $bdd = connexionPDO();
  $req = "delete from dispose
  where id_animal = :idanimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idanimal", $idanimal, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function deleteAnimalbyId($id_animal)
{
  $bdd = connexionPDO();
  $req = "delete from animal
  where id_animal = :idanimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idanimal", $id_animal, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function deleteCaractereAnimalbyIDAnimal($id_animal)
{
  $bdd = connexionPDO();
  $req = "delete from dispose
  where id_animal = :idanimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idanimal", $id_animal, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function deleteImageAnimal($id_animal)
{
  $bdd = connexionPDO();
  $req = "delete from contient
  where id_image = :idanimal";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idanimal", $id_animal, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}
function getImageFromIdImage($idimage)
{
  $bdd = connexionPDO();
  $req = "select * from image
  where id_image = :idimage";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idimage", $idimage, PDO::PARAM_INT);
  $stmt->execute();
  $image = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $image;
}

function deleteImagebyIdImage($idimage)
{
  $bdd = connexionPDO();
  $req = "delete from image
  where id_image = :idimage";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("idimage", $idimage, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function getfirtNews()
{
  $bdd = connexionPDO();
  $req = "SELECT * FROM actualite inner join image on actualite.id_image =  image.id_image
  where id_type_actualite = 1
  ORDER BY date_publication_actualite desc
  limit  1";
  $stmt = $bdd->prepare($req);
  $stmt->execute();
  $new = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $new; 
}

function getfirtEvent()
{
  $bdd = connexionPDO();
  $req = "SELECT * FROM actualite inner join image on actualite.id_image =  image.id_image
  where id_type_actualite = 2
  ORDER BY date_publication_actualite desc
  limit  1";
  $stmt = $bdd->prepare($req);
  $stmt->execute();
  $new = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $new; 

}