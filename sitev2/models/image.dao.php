<?php
require_once("pdo.php");

function getFullImageActus()
{
    $bdd = connexionPDO();
  $req = "SELECT * FROM `image` a INNER join actualite i on a.id_image = i.id_image;
  ";
  $stmt = $bdd->prepare($req);
  $stmt->execute();
  $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $images;
  
}