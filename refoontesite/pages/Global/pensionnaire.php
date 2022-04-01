<?php 
require_once("../../utiles/formatage.php");
require_once("../../utiles/config.php");
require_once("../Global/pdo.php");
require_once("../Global/animal.dao.php");


$bdd = connexionPDO();
$animaux = getAnimalFromStatut($_GET['idstatut']);


$titreh1 = "";
if((int) $_GET['idstatut'] === ID_STATUT_A_L_ADOPTION)
{
    $titreh1 = "Ils cherchent une famille" ;
}elseif ((int) $_GET['idstatut'] === ID_STATUT_FALD)
{
    $titreh1 = "Famille d'Accueil Longue Durée";
}else {
    $titreh1 = "Les anciens";
}
foreach($animaux as $key => $animal) 
{      
    $image = getFirstImageFromAnimal($animal['id_animal']);
    $animaux[$key]['image'] = $image;
    $caracteres = getCaratctereFromAnimal($animal['id_animal']);
    $animaux[$key]['caracteres'] = $caracteres;

}

require_once "pensionnaire.view.php";