<?php  
ob_start();
echo styleTitreNiveau1("Login",COLOR_TITRE_ASSO);
?>

<div class="m-5">
    <form action="" method="POST">
        <div class="form-group row no-gutters align-items-center">
            <label for="login" class="col-6 col-md-9 col-lg-2 text-right pr-5">Login:</label>
            <input type="text" class="col-6 col-md-3 col-lg-10"  name="login" id="login">

        </div>
        <div class="form-group row no-gutters align-items-center">
            <label for="pasword" class="col-6 col-md-9 col-lg-2 text-right pr-5">Mot de passe:</label>
            <input type="text" class="col-6 col-md-3 col-lg-10"  name="pasword" id="pasword">

        </div>
        <div class="row no-gutters align-items-center text-center">
            <input type="submit" value="Valider" class="btn btn-primary">
        </div>
    </form>
</div>

<?php if($alert !== "") { ?>
<div class="alert alert-danger" role="alert">
    <?= $alert ?>
</div>
<?php }?>
<?php  
$content = ob_get_clean();
require_once("views/front/commons/template.php");
?>