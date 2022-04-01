<?php  
ob_start();
echo styleTitreNiveau1("Modification  d'un animal","perso_ColorAdminMenu");
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="1" >
    <div class="row no-gutters">
        <label>Choisir le statut de l'animal:</label>
        <select name="actuel_statut" class="form-control" onchange="submit()">
            <option></option>
            <?php foreach($statuts as $statut) :?>
            <option value="<?= $statut['id_statut'] ?>"
            <?php if(isset($_POST['actuel_statut']) && $_POST['actuel_statut'] === $statut['id_statut']) echo "selected" ?> ><?= $statut['libelle_statut'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</form>

<?php if(isset($_POST['etape']) && $_POST['etape'] >= 1) : ?>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2" >
    <input type="hidden" name="actuel_statut" value="<?= $_POST['actuel_statut'] ?>" >
    <div class="row no-gutters">
        <label>Choisir le statut de l'animal:</label>
        <select name="animal" class="form-control" onchange="submit()">
            <option></option>
            <?php foreach($animaux as $animal) :?>
            <option value="<?= $animal['id_animal'] ?>"
            <?php if(isset($_POST['animal']) && $_POST['animal'] === $animal['id_animal']) echo "selected" ?> > <?= $animal['id_animal']."-".$animal['nom_animal'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</form>
<?php endif; ?>

<?php if(isset($_POST['animal']) && $_POST['etape'] >= 2) : ?>

<form method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="etape" value="3" >
    <input type="hidden" name="actuel_statut" value="<?= $_POST['actuel_statut'] ?>" >
    <input type="hidden" name="animal" id="animal" value="<?= $_POST['animal'] ?>" >
    <div class="row no-gutters">
        <div class="form-group col-12 col-lg-4">
            <label for="nom">nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?= $anima['nom_animal'] ?>">
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="puce">Puce:</label>
            <input type="number" name="puce" id="" class="form-control" value="<?= $anima['puce'] ?>">
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="date_naissance">Date de naiissance:</label>
            <input type="date" name="date_naissance" id="" class="form-control" value="<?= $anima['date_naissance_animal'] ?>">
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Type</th>
            <th scope="col">Sexe</th>
            <th scope="col">statut</th>
            <th scope="col">Ami Chien</th>
            <th scope="col">Ami Chat</th>
            <th scope="col">Ami Bébé</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <select name="type_animal" id="type_animal" class="form-control">
                    <option value="Chient"<?php if($anima['type_animal'] === "Chient") echo "selected" ?> >Chient</option>
                    <option value="Chat" <?php if($anima['type_animal'] === "Chat") echo "selected" ?>>Chat</option>
                </select>
            </td>
            <td>
            <select name="sexe_animal" id="" class="form-control">
                    <option value="1" <?php if($anima['sexe'] === "1") echo "selected" ?>>Male</option>
                    <option value="0" <?php if($anima['sexe'] === "0") echo "selected" ?>>femelle</option>
                </select>
            </td>
            <td>
            <select name="statut_animaux" id="statut_animaux" class="form-control">
                   <?php foreach($statuts as $statut) : ?>
                    <option value="<?= $statut['id_statut']?>"<?php if($anima['id_statut'] === $statut['id_statut']) echo "selected" ?>> <?= $statut['libelle_statut']?></option>
                    <?php endforeach ?>
                </select>
            </td>
            <td>
            <select name="amie_chient" id="amie_chient" class="form-control">
                    <option value="non" <?php if($anima['ami_chien'] === "non") echo "selected" ?>>Non</option>
                    <option value="oui" <?php if($anima['ami_chien'] === "oui") echo "selected" ?>>Oui</option>
                    <option value="n/a" <?php if($anima['ami_chien'] === "N/A") echo "selected" ?>>N/A</option>
                </select>
            </td>
            <td>
            <select name="amie_chat" id="amie_chat" class="form-control">
            <option value="non" <?php if($anima['ami_chat'] === "non") echo "selected" ?>>Non</option>
                    <option value="oui" <?php if($anima['ami_chat'] === "oui") echo "selected" ?>>Oui</option>
                    <option value="n/a" <?php if($anima['ami_chat'] === "N/A") echo "selected" ?>>N/A</option>
                </select>
            </td>
            <td>
            <select name="amie_bebe" id="amie_bebe" class="form-control">
            <option value="non" <?php if($anima['ami_enfant'] === "non") echo "selected" ?>>Non</option>
                    <option value="oui" <?php if($anima['ami_enfant'] === "oui") echo "selected" ?>>Oui</option>
                    <option value="n/a" <?php if($anima['ami_enfant'] === "N/A") echo "selected" ?>>N/A</option>
                </select>
            </td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">caractere1</th>
            <th scope="col">caractere2</th>
            <th scope="col">caractere3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <select name="caractere1"  class="form-control">
                    <?php foreach($caracteres as $caractere) : ?>
                    
                    <option value="<?= $caractere['id_caractere'] ?>" <?php if($anima['caracteres'][0]['libelle_caractere'] === $caractere['libelle_caractere']) echo "selected" ?>><?=$caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="caractere2"  class="form-control"> 
                    <?php foreach($caracteres as $caractere) : ?>
                    
                    <option value="<?= $caractere['id_caractere'] ?>"  <?php if($anima['caracteres'][1]['libelle_caractere'] === $caractere['libelle_caractere']) echo "selected" ?>><?= $caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="caractere3"  class="form-control">
                    <?php foreach($caracteres as $caractere) : ?>
                    
                    <option value="<?=$caractere['id_caractere'] ?>"  <?php if($anima['caracteres'][2]['libelle_caractere'] === $caractere['libelle_caractere']) echo "selected" ?>><?= $caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            </tr>
        </tbody>
    </table>
    <div class="row no-gutters">
        <div class="form-group col-12">
            <label for="descri_animal">description_animal</label>
            <textarea class="form-control" name="descri_animal" id=""><?= $anima['description_animal']?></textarea>
        </div>
    
        <div class="form-group col-12">
            <label for="adoption_animal">description adoption animal</label>
            <textarea class="form-control" name="adoption_animal" id=""><?= $anima['adoption_desc_animal']?></textarea>
        </div>
        <div class="form-group col-12">
            <label for="engagement_animal">engagement animal</label>
            <textarea class="form-control" name="engagement_aniaml" id=""><?= $anima['engagement_animal']?></textarea>
        </div>

        <div class="form-group col-12">
            <label for="localisation_animal">localisation animal</label>
            <textarea class="form-control" name="localisation_animal" id=""><?= $anima['localisation_animal']?></textarea>
        </div>
        <div class="form-group">
        <label>Image</label>
        <input type="file" name="imageAnimal" class="form-control-file col-12" id="">
        </div>
        <br/>
        <br/>
        <br/>
        <div class="col-12">
        <?php require_once "views/back/adminPensionnaireImage.php"; ?>            
        </div>
        <br/>
        <br/>
        <br/> 
        
        <br/>
        <br/>
        <br/>  
    </div>           
        <div class="row">
        <input type="submit" value="Valider" class="btn btn-primary col-12 col-lg-6">
        <input type="submit" value="Supprimer" id="btnSup" class="btn btn-danger col-12 col-lg-6">
        </div>
        
    
    
</form>
<script src="public/js/verificationSuppresionAnimal.js" ></script>
<?php endif; ?>
<?php  
$admindPensioncontent = ob_get_clean();

?>