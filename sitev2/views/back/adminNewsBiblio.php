<?php  

echo styleTitreNiveau1("Bibliotheque de News","perso_ColorAdminMenu");
?>
<form method="POST"  action="" enctype="multipart/form-data">
<div class="row no-gutters">
<div class="col-12 border-black" style="border: 2px solid;" id="biblionew">
    <?php foreach($biblios as $biblio) : ?>
        <img src="<?= $biblio['url_image'] ?>"  class="img-fluid" style="max-height: 200px;" id="<?= $biblio['id_image'] ?>">
    <?php endforeach; ?>
</div>

<div class="col-12">
    <button id="addimg" class="btn btn-primary">Confirmer l'image selectionner</button>
</div>
</div>
</form>

