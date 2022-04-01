<?php  
ob_start();
echo styleTitreNiveau1("ADMIN",COLOR_TITRE_ASSO);
?>
<div class="row">
    <div class="col text-center">
        <a href="genererPensionnaireAdmin" class="btn btn-primary">Gestion pensionnaire</a>
    </div>
    <div class="col text-center">
        <a href="genererNewsAdmin" class="btn btn-primary">Gestion News</a>
    </div>
    <div class="col text-center">
        <form method="POST" action="">
            <input  type="hidden" name="deconnexion" value="true" />
            <input type="submit"  class="btn btn-primary" value="se deconnexion" />
        </form>
    </div>
</div>

<?php  
$content = ob_get_clean();
require_once("views/front/commons/template.php");
?>