<?php
require_once "controllers/backend.controller.php";
require_once "controllers/fontend.controller.php";
require_once ("config/securite.class.php");


try {
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = securite::SecuriteHTML($_GET['page']);
        switch ($page){
            case "acceuil": getAcceuil();
            break;
            case "pensionnaire": getPensionnaires();
            break;
            case "partenaires": getPartenaires();
            break;
            case "association": getAssociation();
            break;
            case "temperature": getTemperature();
            break;
            case "chocolat": getChocolat();
            break;
            case "plantes": getPlantes();
            break;
            case "sterilisation": getSterilisation();
            break;
            case "educateur": getEducateur();
            break;
            case "contact": getContact();
            break;
            case "don": getDon();
            break;
            case "mentions": getMention();
            break;
            case "actus": getActus();
            break;
            case "animal": getAnimal();
            break;
            case "login": getLogin();
            break;
            case "admin": getAdmin();
            break;
            case "genererPensionnaireAdmin": getgenererPensionnaireAdmin();
            break;
            case "genererNewsAdmin": getgenererNewsAdmin();
            break;
            case "genererNewsAdminAjout" : getgenererNewsAdminAjout();
            break;
            case "genererNewsAdminModif" : getgenererNewsAdminModif();
            break;
            case "genererNewsAdminSup" :getgenererNewsAdminSup() ;
            break;
            case "genererPensionnaireAdminAjout" :genererPensionnaireAdminAjout() ;
            break;
            case "genererPensionnaireAdminModif" :genererPensionnaireAdminModif() ;
            break;
            case "genererPensionnaireAdminSup"  :genererPensionnaireAdminSup();
            break;
            case "error301": 
            case "error302": 
            case "error400": 
            case "error401": 
            case "error402": 
            case "error405": 
            case "error500": 
            case "error505": throw new Exception("Error de type : "+$page);
            break;
            case "error403": throw new Exception("vous n'avez pas le droit d'accéder à ce dossier");
            break;
            case "error404":
            default: throw new Exception("La page n'existe pas");
        }
    } else {
        getAcceuil();
    }
} catch(Exception $e){
    $title = "Error";
    $description = "Page de gestion des erreurs";
    $erreurmessage = $e->getMessage();
    require "views/front/commons/error.php";
}


