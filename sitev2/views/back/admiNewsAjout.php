<?php  
ob_start();
echo styleTitreNiveau1("Ajout des News","perso_ColorAdminMenu");
?>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row no-gutters">
        <div class="form-group col-6">
            <label>Titre de l'actualite:</label>
            <input type="text" name="titreActus" class="form-control" id="">
        </div>
        <div class="form-group col-6">
            <label>Type d'actualite:</label>
            <select name="typeActus" id="typeActus" class="form-control">
                <?php foreach($typesActualites as $typeactualite) :?>
                <option value="<?= $typeactualite['id_type_Actualite']?>"> <?= $typeactualite['libelle_type'] ?></option>
                <?php endforeach?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Titre de l'actualite:</label>
        <textarea class="form-control" name="contenuActus"></textarea>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="imageActus" class="form-control-file" id="">
    </div>
    <div class="row-no-gutters">
        <input type="submit" value="Valider" class="btn btn-primary">
    </div>
</form>



<?php  
$admindNewscontent = ob_get_clean();
?>