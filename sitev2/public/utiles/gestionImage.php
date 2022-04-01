<?php 

function InsertImage($file, $dir, $nom)
{
    if(!file_exists($dir)) {mkdir($dir);}

    $extention = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $target_files = $dir. $nom . "_" . $file['name'] ;

    if(!getimagesize($file['tmp_name']))
    throw new Exception("Le fichier n'est pas une image");
    if($extention !=="jpg" && $extention !=="png" && $extention !=="jpeg"  && $extention !=="gif")
    throw new Exception("L'extention n'est pas reconnu!");
    if(file_exists($target_files))
    throw new Exception("Le fichier exite déjà!");
    if($file['size']> 500000)
    throw new Exception("Le fichier est trop gros!");
    if(!move_uploaded_file($file['tmp_name'], $target_files))
    throw new Exception("L'ajout de l'image n'a pas fonctionner!");
    else return($nom."_". $file['name'] );

}  

function rrmdir($dir) {
    $fichier =$dir;
    if(file_exists($fichier)){unlink($fichier);
    echo 'supprimer';}
  }
