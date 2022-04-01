<?php  
ob_start();?>
<?= 
styleTitreNiveau1('Contact', COLOR_TITRE_CONTACT);
?>

<h2>Suivé nous</h2>
<p class="pl-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis alias quam fugiat! Aliquam qui error ipsa suscipit veritatis. Laudantium veritatis porro eveniet esse officiis sint sunt deserunt a excepturi repellat!</p>
<h2>Contacter nous</h2>
<p class="pl-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, ipsa?</p>
<p class="pl-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, ipsa?</p>
<p class="pl-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, ipsa?</p>
<?= 
styleTitreNiveau2('Formulaire de contact', COLOR_TITRE_CONTACT);
?>
<form method="POST" action="#" class="pl-5"> 
  <div class="form-group row no-gutters">
    <label for="nom" class="col-auto pr-3">Nom:</label>
    <input type="text" class="col" name="nom" id="nom" placeholder="Nom" required>
  </div>

  <div class="form-group row no-gutters">
    <label for="email" class="col-auto pr-3">Email:</label>
    <input type="email" class="col" name="email" id="email" placeholder="email@exemple.com" required>
  </div>

  <div class="form-group row no-gutters">
    <label for="objet" class="col-auto pr-3">Objet:</label>
    <select class="form-control col" id="objet" name="objet">
      <option value="quetion">Questions</option>
      <option value="adoption">Adoption</option>
      <option value="donnation">Donnation</option>
      <option value="autre">Autre</option>
    </select>
  </div>

  <div class="form-group row no-gutters">
    <label for="message" >Message:</label>
    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
  </div>

  <div class="form-group row no-gutters">
    <label for="captcha" class="col-auto pr-3" >Combien font 3+5:</label>
    <input type="number" class="col" name="captcha" id="captcha" required>
  </div>

  <input type="submit" class="btn btn-primary d-block mx-auto" value="Valider">


</form>

<?php
if(isset($_POST['nom']) && !empty($_POST['nom']) &&
isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['objet']) && !empty($_POST['objet']) &&
isset($_POST['message']) && !empty($_POST['message']) &&
isset($_POST['captcha']) && !empty($_POST['captcha'])
)
{
  $captcha = (int) $_POST['captcha'];
  if($captcha == 8)
  {
    echo '<div class="alert alert-success text-center" role="alert">
            Formulaire envoyé!
            </div>';
    $nom = htmlentities(($_POST['nom']));
    $email = htmlentities(($_POST['email']));
    $objet = htmlentities($_POST['objet']);
    $message = htmlentities($_POST['message']);
    $destination = "assiationnsamisnosaminaux@gmail.com";
    mail($destination, $objet."-".$nom,"Mail".$email."Message:".$message);
  }
  else {
   echo ' <div class="alert alert-danger text-center" role="alert">
            Erreur sur le captcha
          </div>';
  }
  
}

?>

<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php";
?>