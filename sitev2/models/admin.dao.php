<?php
require_once("pdo.php");

function isConnexionValid($login, $password)
{
    $bdd = connexionPDO();
  $req = "SELECT * FROM administrateur WHERE login = :loging ";
  $stmt = $bdd->prepare($req);
  $stmt->bindValue("loging", $login);
  $stmt->execute();
  $administrateur = $stmt->fetch(PDO::FETCH_ASSOC);
  
  $stmt->closeCursor();
  
  if( password_verify($password, $administrateur['pasword']) )
  {
      return true;
    
  }
  else {
    return false;
      
  }
  
}