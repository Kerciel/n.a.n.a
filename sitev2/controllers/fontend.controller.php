<?php 

require_once("public/utiles/formatage.php");
require_once("config/config.php");
require_once("models/animal.dao.php");
function getPensionnaires()
{
    $title = "page des pensionnaires";
    $description = "C'est la page des pensionnaires";

    $bdd = connexionPDO(); 
    if(isset($_GET['idstatut']) && !empty($_GET['idstatut']))
    {
        $idstatut = securite::SecuriteHTML($_GET['idstatut']);
        $animaux = getAnimalFromStatut($idstatut);

       

    $titreh1 = "";
    if((int) $idstatut === ID_STATUT_A_L_ADOPTION)
    {
        $titreh1 = "Ils cherchent une famille" ;
    }elseif ((int) $idstatut === ID_STATUT_FALD)
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
    }
    else 
    {
        throw new Exception ("L'id du statut n'est pas renseigner, vous pouvez pas acceder à la page!");
    }
    

    require_once "views/front/pensionnaire.view.php";
}


function getAssociation()
{
    $title = "Association";
    $description = "C'est la page Association";
    require_once "views/front/association/association.view.php";
}

function getPartenaires()
{
    $title = "Partenaires";
    $description = "C'est la page des partenaires";
    require_once "views/front/association/partenaires.view.php";
}

function getChocolat()
{
    $title = "Chocolat";
    $description = "C'est la page Chocolat";
    require_once "views/front/articles/chocolat.php";
}

function getEducateur()
{
    $title = "Educateur";
    $description = "C'est la page Educateur";
    require_once "views/front/articles/educateur.php";
}

function getPlantes()
{
    $title = "Plantes";
    $description = "C'est la page Plantes";
    require_once "views/front/articles/plantes.php";
}

function getSterilisation()
{
    $title = "Stérilisation";
    $description = "C'est la page Stérilisation";
    require_once "views/front/articles/sterilisation.php";
}

function getTemperature()
{
    $title = "Température";
    $description = "C'est la page Temperature";
    require_once "views/front/articles/temperature.php";
}

function getContact ()
{
    $title = "Contact";
    $description = "C'est la page Contact";
   require_once "views/front/Contact/contact.php";
}

function getDon ()
{
    $title = "Don";
    $description = "C'est la page de Don";
    require_once "views/front/contact/don.php";
}

function getMention ()
{
    $title = 'Mentions Legal';
    $description = "C'est la page de Mentions Legal";
    require_once "views/front/contact/mentions.php";
}

function getActus()
{
    if(isset($_GET['idtype']) && !empty($_GET['idtype']))
    {
        $idtype = securite::SecuriteHTML($_GET['idtype']);
        $actualites = getAllInfoActualitebyType($idtype);

       

    $titreh1 = "";
    if((int) $idtype === ID_ACTUS_NEW)
    {
        $titreh1 = "Nouvelle des Adoptes" ;
       
    }elseif ((int) $idtype === ID_ACTUS_EVENT)
    {
        $titreh1 = "Evenement";
    }else {
        $titreh1 = "Actions";
    }
    }
    
    var_dump($actualites);
    $title = $titreh1;
    $description = "C'est la page Actus";
    require_once "views/front/actus/actus.php";
}

function getAnimal()
{
    $bdd = connexionPDO();
    if(isset($_GET['idAnimal']) && !empty($_GET['idAnimal']))
    {
    $idanimal = securite::SecuriteHTML($_GET['idAnimal']);
    $animal = getAnimalFromId($idanimal);
    $images =  getImagesFromAnimal($animal['id_animal']);
    $animal['images'] = $images;
    $caracteres = getCaratctereFromAnimal($animal['id_animal']);
    $animal['caracteres'] = $caracteres;

    $title = $animal['nom_animal'];
    $description = "C'est la page de".$animal['nom_animal'];
    }
    else
    {
        throw new Exception("L'id animal n'est pas renségner, vous pouvez pas acceder à la page!");
    }
    

    require_once "views/front/animal/animal.php";
}

function getAcceuil(){
    $animaux = getAllanimalAdopte();
    $new = getfirtNews();
    $event = getfirtEvent();
    var_dump($new);
    $title = "Acceuil";
    $description = "C'est la page Acceuil";
    require_once "views/front/acceuil.view.php";
}

?>