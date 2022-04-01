<?php
session_start();
require_once("public/utiles/formatage.php");
require_once("public/utiles/gestionImage.php");
require_once("config/config.php");
require_once("models/animal.dao.php");
require_once("models/image.dao.php");
require_once("models/admin.dao.php");
require_once("models/actualites.dao.php");

function getLogin()
{
    $title = "Login";
    $description = "C'est la page de login";
    if( securite::verificationConnexion())
    {
        header("Location: admin");
    }
    $alert = "";
    if(isset($_POST['login']) && !empty($_POST['login']) && (isset($_POST['pasword']) && !empty($_POST['pasword'])))
    {
        $login = securite::SecuriteHTML($_POST['login']);
        $password = securite::SecuriteHTML($_POST['pasword']);
        if(isConnexionValid($login, $password ))
        {
          securite::SecuriteCookiePassword();
           header("Location: admin");
        }
        else {
            $alert = "identifiant invalide!";
        }
        
    }
    require_once ("views/back/login.view.php");
}

function getAdmin()
{
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true")
    {
        session_destroy();
        header("Location: acceuil");
    }
    
    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Administrateur";
        $description = "C'est la page Admiistrateur";
        require_once "views/back/admin.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
    
}

function getgenererPensionnaireAdmin()
{
    $alert = 0;
    $alertype = 0;
    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion Pensionnaire";
        $description = "C'est la page de gestion de pensionnaire";
        $admindPensioncontent ="";
        require_once "views/back/adminPensionnaire.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}
function getgenererNewsAdmin()
{
    
    $alertype = 0;
    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion News";
        $description = "C'est la page de gestion des News";
        $typesActualites = gettypeActus();
        $admindNewscontent ="";
        
        require_once "views/back/adminNews.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}

function getgenererNewsAdminAjout()
{
    $alertype = 0;
    if(isset($_POST['titreActus']) && !empty($_POST['titreActus'])&&
    isset($_POST['typeActus']) && !empty($_POST['typeActus']) &&
    isset($_POST['contenuActus']) && !empty($_POST['contenuActus'])
    )
    {
        $titreActus = securite::SecuriteHTML($_POST['titreActus']);
        $typeActus = securite::SecuriteHTML($_POST['typeActus']);
        $contenuActus = securite::SecuriteHTML($_POST['contenuActus']);
        $date = date("Y-m-d H:i:s", time());
        $fileImage = $_FILES["imageActus"];
        $repertoire = "public/sources/images/Autres/News/";

        
       try{
        $nomImage = InsertImage($fileImage, $repertoire,$titreActus );
        $idimage = insertionImageBD ($nomImage, $repertoire.$nomImage);

        if(insertActualiteBD($titreActus,$typeActus,$contenuActus,$date,$idimage ))
        {
            $alert = "la cretaion de l'actualite a fonctionné.";
            $alertype = 1;
        }
        else
        {
            $alert = "l'insertion en BD n'a pas fonction!";
            $alertype = 2;
        }
       }catch(Exception $e){
        $alert = "la création de l'actualite a echouée! <br/>". $e->getMessage();
        $alertype = 2;
       }
    }

    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion News";
        $description = "C'est la page de gestion des News";
        $typesActualites = gettypeActus();
        $admindNewscontent ="";
        
        require_once "views/back/admiNewsAjout.php";
        
        require_once "views/back/adminNews.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}

function getgenererNewsAdminModif()
{
    $alertype = 0;
    $Actualites = 0;
    $actualit = 0;
    $biblios = 0;
    if(isset($_POST['typeActus']) && $_POST['etape'] >= 2)
    {
        $typeActus = securite::SecuriteHTML($_POST['typeActus']);

        $Actualites = getActusByTypeActus($typeActus);
    }
    if(isset($_POST['etape']) && $_POST['etape'] >= 3)
    {
        $idactualite = securite::SecuriteHTML($_POST['Actus']);
        $actu = getActubyID($idactualite);
        $biblios = getFullImageActus();
    }
    if(isset($_POST['etape']) && $_POST['etape'] >= 4)
    {
        $titreActus = securite::SecuriteHTML($_POST['titreActus']);
        $typeActus = securite::SecuriteHTML($_POST['typeActus']);
        $contenuActus = securite::SecuriteHTML($_POST['contenuActus']);
       
        $idimage = $actu['id_image'];
        $idactualite = $actu['id_actualite'];
        

        
       try{
        if($_FILES['imageActus']['size'] > 0)
        {
            $fileImage = $_FILES["imageActus"];
            $repertoire = "public/sources/images/Autres/News/";
            $nomImage = InsertImage($fileImage, $repertoire,$titreActus );
            $idimage = insertionImageBD ($nomImage, $repertoire.$nomImage);
        }

        if(updateActualiteBD($idactualite,$titreActus,$typeActus,$contenuActus,$idimage ))
        {
            $alert = "la madification de l'actualite a fonctionné.";
            $alertype = 1;
        }
        else
        {
            $alert = "la modification  en BD n'a pas fonction!";
            $alertype = 2;
        }
       }catch(Exception $e){
        $alert = "la modification de l'actualite a echouée! <br/>". $e->getMessage();
        $alertype = 2;
       }
    }
    
    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion News";
        $description = "C'est la page de gestion des News";
        $typesActualites = gettypeActus();
        $admindNewscontent ="";
        
        require_once "views/back/adminNewsModif.php";
        
        require_once "views/back/adminNews.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}

function getgenererNewsAdminSup()
{
    $alertype = 0;
    echo $_GET['sup'];
    if(isset($_GET['sup'])){
    try{
            deleteActusbyId($_GET['sup']);
            $alert = "la suppression  de l'actualite a fonctionné.";
            $alertype = 1;
       
       }catch(Exception $e){
        $alert = "la suppression de l'actualite a echouée! <br/>". $e->getMessage();
        $alertype = 2;
       }
    }

    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion News";
        $description = "C'est la page de gestion des News";
        $typesActualites = gettypeActus();
        $admindNewscontent ="";
        
        
        require_once "views/back/adminNews.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}
##fonction gernere page pensionnaireadminajout
function genererPensionnaireAdminAjout()
{
    $alert = 0;
    $alertype = 0;
    $caracteres = getCaracteres();
    
   
    var_dump($_POST);
       try{
        echo 'TESTE1'.VerifAnimalSaisi();
        if(VerifAnimalSaisi())
        {
            echo 'TESTE';
            $nom = securite::SecuriteHTML($_POST['nom']);
            $puce = securite::SecuriteHTML($_POST['puce']);
            $date_naissance = securite::SecuriteHTML($_POST['date_naissance']);
            $type_animal = securite::SecuriteHTML($_POST['type_animal']);
            $amie_chient = securite::SecuriteHTML($_POST['amie_chient']);
            $sexe_animal = securite::SecuriteHTML($_POST['sexe_animal']);
            $statut_animaux = securite::SecuriteHTML($_POST['statut_animaux']);
            $amie_chat = securite::SecuriteHTML($_POST['amie_chat']);
            $amie_bebe = securite::SecuriteHTML($_POST['amie_bebe']);
            $descri_animal = securite::SecuriteHTML($_POST['descri_animal']);
            $adoption_animal = securite::SecuriteHTML($_POST['adoption_animal']);
            $engagement_aniaml = securite::SecuriteHTML($_POST['engagement_aniaml']);
            $localisation_animal = securite::SecuriteHTML($_POST['localisation_animal']);
            $caractere1 = securite::SecuriteHTML($_POST['caractere1']);
            $caractere2 = securite::SecuriteHTML($_POST['caractere2']);
            $caractere3 = securite::SecuriteHTML($_POST['caractere3']);
            $fileImage = $_FILES["imageAnimal"];
            $repertoire = "public/sources/images/Animaux/".$type_animal."/".$nom."/";

            ($puce = "") ? $puce = $_POST ['puce'] : $puce = null ;

            $nomImage = InsertImage($fileImage, $repertoire,$nom );
            $idimage = insertionImageBD ($nomImage, $repertoire.$nomImage);
            echo "teste resuisi";
            if(insertAnimalBD($nom,$puce,$date_naissance,$type_animal,$amie_chient,$sexe_animal, $statut_animaux,$amie_chat, $amie_bebe, $descri_animal, $adoption_animal,$engagement_aniaml,$localisation_animal,$idimage, $caractere1, $caractere2, $caractere3 ))
            {

                $alert = "la cretaion de l'animal a fonctionné.";
                $alertype = 1;
            }
            else
            {
                $alert = "l'insertion en BD n'a pas fonction!";
                $alertype = 2;
            }
        }
       }catch(Exception $e){
        $alert = "la création de l'animal a echouée! <br/>". $e->getMessage();
        $alertype = 2;
       
        }

    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion Pensionnaire";
        $description = "C'est la page de gestion de pensionnaire";
        $admindPensioncontent ="";
        $statuts = getStatuts();
        

        require_once "views/back/adminPensionnaireAjout.php";
        
        
        require_once "views/back/adminPensionnaire.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}
##verifi les information saisie d'un animal dans le post
function VerifAnimalSaisi()
{
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])){
        return true;
    }
    else
    {
        return false;
    }
}

##genere la page de modification d'un animal
function genererPensionnaireAdminModif()
{
    $alert = 0;
    $alertype = 0;
    $animaux= 0;
    $anima  =  0;
    $caracteres = getCaracteres();
    if(isset($_POST['etape']) && $_POST['etape'] >= 1)
    {
        $idstatut = securite::SecuriteHTML($_POST['actuel_statut']);

        $animaux  = getAnimalFromStatut($idstatut);
        
    }
    if(isset($_POST['animal']) && $_POST['etape'] >= 2)
    {
        $idanimal = securite::SecuriteHTML($_POST['animal']);
        $anima  = getAnimalFromId($idanimal);
        $anima ['caracteres'] = getCaratctereFromAnimal($idanimal);
        $anima ['image'] = getImagesFromAnimal($idanimal);
        
    }
    if(isset($_POST['etape']) && $_POST['etape'] >= 3)
    {
       
            try{
        
        if(VerifAnimalSaisi())
        {
            $idanimal = $_POST["animal"];
            $nom = securite::SecuriteHTML($_POST['nom']);
            $puce = securite::SecuriteHTML($_POST['puce']);
            $date_naissance = securite::SecuriteHTML($_POST['date_naissance']);
            $type_animal = securite::SecuriteHTML($_POST['type_animal']);
            $amie_chient = securite::SecuriteHTML($_POST['amie_chient']);
            $sexe_animal = securite::SecuriteHTML($_POST['sexe_animal']);
            $statut_animaux = securite::SecuriteHTML($_POST['statut_animaux']);
            $amie_chat = securite::SecuriteHTML($_POST['amie_chat']);
            $amie_bebe = securite::SecuriteHTML($_POST['amie_bebe']);
            $descri_animal = securite::SecuriteHTML($_POST['descri_animal']);
            $adoption_animal = securite::SecuriteHTML($_POST['adoption_animal']);
            $engagement_aniaml = securite::SecuriteHTML($_POST['engagement_aniaml']);
            $localisation_animal = securite::SecuriteHTML($_POST['localisation_animal']);
            $caractere1 = securite::SecuriteHTML($_POST['caractere1']);
            $caractere2 = securite::SecuriteHTML($_POST['caractere2']);
            $caractere3 = securite::SecuriteHTML($_POST['caractere3']);
            $fileImage = $_FILES["imageAnimal"];
            $Imagetodelete = $_POST['Imagetodelete'];
            $repertoire = "public/sources/images/Animaux/".$type_animal."/".$nom."/";
            $Imagegroupdelete = explode("-", $Imagetodelete);

            if($puce === null){$puce = null;} 
            if($_FILES['imageAnimal']['size'] > 0){
            $nomImage = InsertImage($fileImage, $repertoire,$nom );
            $idimage = insertionImageBD ($nomImage, $repertoire.$nomImage);
            linkImageAnimal($idimage, $idanimal);
            }
        if(updateAnimalBD($idanimal,$nom,$puce,$date_naissance,$type_animal,$amie_chient,$sexe_animal, $statut_animaux,$amie_chat, $amie_bebe, $descri_animal, $adoption_animal,$engagement_aniaml,$localisation_animal, $caractere1, $caractere2, $caractere3 ))
        {
            updateCarctereAnimal($caractere1, $caractere2, $caractere3,  $idanimal);
            linkCarctereAnimal($caractere1, $caractere2, $caractere3,  $idanimal);
            if($Imagegroupdelete !== NULL){
                for($i = 0 ; $i < count($Imagegroupdelete); $i++)
                {
                    $image = getImageFromIdImage($Imagegroupdelete[$i]);
                    $url = $image['url_image'];
                    echo $url;
                    deleteImageAnimal($Imagegroupdelete[$i]);
                    deleteImagebyIdImage($Imagegroupdelete[$i]);
                    rrmdir($url);
                }
            }
            $alert = "la modification de l'animal a fonctionné.";
            $alertype = 1;
        }
        else
        {
            $alert = "la modification en BD n'a pas fonction!";
            $alertype = 2;
        }
        }
       }catch(Exception $e){
        $alert = "la modification de l'animal a echouée! <br/>". $e->getMessage();
        $alertype = 2;
       
    }
    $anima  = getAnimalFromId($idanimal);
    $anima ['caracteres'] = getCaratctereFromAnimal($idanimal);
    $anima ['image'] = getImagesFromAnimal($idanimal);
    }
    if(securite::verificationConnexion())
    {
        securite::SecuriteCookiePassword();
        $title = "Gestion Pensionnaire";
        $description = "C'est la page de gestion de pensionnaire";
        $admindPensioncontent ="";
        $statuts = getStatuts();

        require_once "views/back/adminPensionnaireModif.php";

        require_once "views/back/adminPensionnaire.view.php";
    }
    else
    {
        throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
    }
}
##suppression animal
function genererPensionnaireAdminSup()
{
    $alert = 0;
    $alertype = 0;
    if(isset($_GET['sup'])){
        try{
                $images = getImagesFromAnimal($_GET['sup']);
                var_dump($images);
                deleteCaractereAnimalbyIDAnimal($_GET['sup']);
                
                foreach($images as $image)
                {
                    deleteImageAnimal($image['id_image']);
                    $url = $image['url_image'];
                    rrmdir($url);
                    deleteImagebyIdImage($image['id_image']);
                }
                deleteAnimalbyId($_GET['sup']);
                
                $alert = "la suppression  de l'animal a fonctionné.";
                $alertype = 1;
           
           }catch(Exception $e){
            $alert = "la suppression de l'animal a echouée! <br/>". $e->getMessage();
            $alertype = 2;
           }
           if(securite::verificationConnexion())
           {
               securite::SecuriteCookiePassword();
               $title = "Gestion Pensionnaire";
               $description = "C'est la page de gestion de pensionnaire";
               $admindPensioncontent ="";
               $statuts = getStatuts();
       
       
               require_once "views/back/adminPensionnaire.view.php";
           }
           else
           {
               throw new Exception("vous n'avez pas le droit d'acceder à cette page!");
           }
        }
   
}
?>


