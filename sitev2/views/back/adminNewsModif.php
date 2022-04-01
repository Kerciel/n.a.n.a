<?php  
ob_start();
echo styleTitreNiveau1("Modifier des News","perso_ColorAdminMenu");
?>
<form method="POST" action="" enctype="multipart/form-data">
<div class="row no-gutters">
    <input type="hidden" name="etape" value="2">
        <div class="form-group col-12">
            <label>Choisir:</label>
            <select name="typeActus" id="typeActus" class="form-control" onchange="submit()">
                <option></option>
                <?php foreach($typesActualites as $typeactualite) :?>
                <option value="<?= $typeactualite['id_type_Actualite']?>"
                <?php if(isset($_POST['typeActus']) && $_POST['typeActus'] === $typeactualite['id_type_Actualite']) echo "selected" ?>><?= $typeactualite['libelle_type'] ?></option>
                <?php endforeach?>

            </select>
        </div>
 </div>
</form>

        <?php if(isset($_POST['etape']) && $_POST['etape'] == 2) { ?>
        <form method="POST" action="" enctype="multipart/form-data">
      
            <input type="hidden" name="etape" value="3">
            <input type="hidden" name="typeActus" value="<?= $_POST['typeActus'] ?>">
            <div class="form-group col-12">
            <label>Actualite:</label>
            <select name="Actus" id="Actus" class="form-control" onchange="submit()"> 
                <option></option>
                <?php foreach($Actualites as $Actualite) :?>
                    <option value="<?= $Actualite['id_actualite']?>" 
                    <?php if(isset($_POST['Actus']) && $_POST['Actus']  ===  $Actualite['id_actualite']) echo "selected" ?>>
                    <?= $Actualite['libelle_actualite'] ?> - <?= $Actualite['id_actualite'] ?></option>
                <?php endforeach?>

            </select>
            </div>
        </form> 
        <?php } ?>

<?php  if(isset($_POST['etape']) && $_POST['etape'] >= 3) { 
    echo styleTitreNiveau1("Les informations:","perso_ColorAdminMenu");
    ?>
<form method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="etape" value="4">
<input type="hidden" name="typeActus" value="<?= $_POST['typeActus'] ?>">
<input type="hidden" name="Actus" id="Actus" value="<?= $_POST['Actus'] ?>">
    <div class="row no-gutters">
        <div class="form-group col-6">
            <label>Titre de l'actualite:</label>
            <input type="text" name="titreActus" id="titreActus" class="form-control" id="" value="<?= $actu['libelle_actualite'] ?>">
        </div>
        <div class="form-group col-6">
            <label>Type d'actualite:</label>
            <select name="typeActus" id="typeActus" class="form-control">
            <?php foreach($typesActualites as $typeactualite) :?>
                <option value="<?= $typeactualite['id_type_Actualite']?>"
                <?php if($actu['id_type_Actualite'] === $typeactualite['id_type_Actualite']) echo "selected" ?>><?= $typeactualite['libelle_type'] ?></option>
                <?php endforeach?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Contenu de l'actualite:</label>
        <textarea class="form-control" name="contenuActus"><?= $actu['contenu_actualite'] ?></textarea>
    </div>

    

    <img src="<?= $actu['url_image'] ?>" style="max-height:200px;">
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="imageActus" class="form-control-file" id="" value="<?= $actu['libelle_image'] ?>">
    </div>
    <div class="row-no-gutters">
        <input type="submit" value="Valider" class="btn btn-primary">
        <input type="submit" id="btnSup" value="Supprimer" class="btn btn-danger">
    </div>
    <br />
    <br />
   
</form>

<?php require_once "views/back/adminNewsBiblio.php"; ?>

<script src="public/js/biblioimagenew.js"></script>
<script src="public/js/verificationSuppresionActualite.js" ></script>
<?php }?>
<?php  
$admindNewscontent = ob_get_clean();
?>