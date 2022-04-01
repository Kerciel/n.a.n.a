<?php

//recupere les informations des animaux en fonctions des statuts
function getAnimalFromStatut($idstatut)
{
    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_statut = :idstatut";
if( (int) $idstatut === 2 ){ $req .= ' or id_statut = 4'; }
$stmt = $bdd->prepare($req);
$stmt->bindValue("idstatut", $idstatut);
$stmt->execute();
$animaux = $stmt->fetchall(PDO::FETCH_ASSOC);
$stmt->closeCursor();
return $animaux;
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
            $stmt->bindValue("idAnimal", $id_animal);
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
      $stmt->bindValue("idAnimal", $id_animal);
      $stmt->execute();
      $caracteres = $stmt->fetchall(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $caracteres;
}