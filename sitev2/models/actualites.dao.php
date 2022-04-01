<?php
require_once("pdo.php");

         
        function gettypeActus() {
            $bdd = connexionPDO();
            $req = "SELECT * FROM type_actualite ";
            $stmt = $bdd->prepare($req);
            $stmt->execute();
            $type_actualite = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $type_actualite;
        }

        function 
        insertActualiteBD($titreActus,$typeActus,$contenuActus,$date, $image  )
        {
            $bdd = connexionPDO();
            $req = "INSERT INTO `actualite`( `libelle_actualite`, `contenu_actualite`, `date_publication_actualite`, `id_image`, `id_type_Actualite`) 
            VALUES (:title,:contenu,:dat,:imag, :type_actualite)  ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("title", $titreActus, PDO::PARAM_STR);
            $stmt->bindValue("contenu", $contenuActus, PDO::PARAM_STR);
            $stmt->bindValue("dat", $date);
            $stmt->bindValue("imag", $image, PDO::PARAM_INT);
            $stmt->bindValue("type_actualite", $typeActus, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
            if($resultat>0) return true; else return false;
           
        }

        function insertionImageBD($nomImage, $url){
            $bdd = connexionPDO();
            $req = "INSERT INTO `image`( `libelle_image`, `url_image`, `description_image`) 
            VALUES (:nomimage, :urlimage, :descriptionimage) ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("nomimage", $nomImage);
            $stmt->bindValue("urlimage", $url);
            $stmt->bindValue("descriptionimage", $nomImage);
            $stmt->execute();
            $resultat = $bdd->lastInsertId();
            $stmt->closeCursor();
            return $resultat;
            
        }

        function getActusByTypeActus($typeActus){
            $bdd = connexionPDO();
            $req = "SELECT * FROM `actualite` WHERE `id_type_Actualite` = :typeactus ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("typeactus", $typeActus);
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultat;
        }

        function getActubyID($idactus)
        {
            $bdd = connexionPDO();
            $req = "SELECT * FROM actualite a INNER join image i on i.id_image = a.id_image WHERE a.id_actualite = :idactus ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("idactus", $idactus);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            var_dump($resultat);
            return $resultat;
        }

        function updateActualiteBD($idactualite,$titreActus,$typeActus,$contenuActus,$idimage )
        {
            $bdd = connexionPDO();
            $req = "Update actualite
            Set `libelle_actualite` = :title,`contenu_actualite` = :contenu,`id_image` = :imag,`id_type_Actualite` = :type_actualite
            where `id_actualite` = :idctualite  ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("idctualite", $idactualite, PDO::PARAM_STR);
            $stmt->bindValue("title", $titreActus, PDO::PARAM_STR);
            $stmt->bindValue("contenu", $contenuActus, PDO::PARAM_STR);
            $stmt->bindValue("imag", $idimage, PDO::PARAM_INT);
            $stmt->bindValue("type_actualite", $typeActus, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
            if($resultat>0) return true; else return false;
        }

        function deleteActusbyId($idactualite)
        {
            $bdd = connexionPDO();
            $req = "delete from actualite
            where `id_actualite` = :idctualite  ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("idctualite", $idactualite, PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
            if($resultat>0) return true; else return false;
        }


        function getAllInfoActualitebyType($typeActus)
        {
            $bdd = connexionPDO();
            $req = "SELECT * FROM `actualite` inner join image on actualite.id_image = image.id_image 
             WHERE `id_type_Actualite` = :typeactus ";
            $stmt = $bdd->prepare($req);
            $stmt->bindValue("typeactus", $typeActus);
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultat;
        }