<?php  
ob_start();
echo styleTitreNiveau1("Ajout  d'un animal","perso_ColorAdminMenu");
?>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="row no-gutters">
        <div class="form-group col-12 col-lg-4">
            <label for="nom">nom:</label>
            <input type="text" name="nom" id="" class="form-control">
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="puce">Puce:</label>
            <input type="number" name="puce" id="" class="form-control">
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="date_naissance">Date de naiissance:</label>
            <input type="date" name="date_naissance" id="" class="form-control">
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
                    <option></option>
                    <option value="Chient">Chient</option>
                    <option value="Chat">Chat</option>
                </select>
            </td>
            <td>
            <select name="sexe_animal" id="" class="form-control">
                    <option value="1">Male</option>
                    <option value="0">femelle</option>
                </select>
            </td>
            <td>
            <select name="statut_animaux" id="statut_animaux" class="form-control">
                   <option></option>
                   <?php foreach($statuts as $statut) : ?>
                    <option value="<?= $statut['id_statut']?>"> <?= $statut['libelle_statut']?></option>
                    <?php endforeach ?>
                </select>
            </td>
            <td>
            <select name="amie_chient" id="amie_chient" class="form-control">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                    <option value="N/A">N/A</option>
                </select>
            </td>
            <td>
            <select name="amie_chat" id="amie_chat" class="form-control">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                    <option value="N/A">N/A</option>
                </select>
            </td>
            <td>
            <select name="amie_bebe" id="amie_bebe" class="form-control">
                    <option value="non">Non</option>
                    <option value="oui">Oui</option>
                    <option value="N/A">N/A</option>
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
                    
                    <option value="<?= $caractere['id_caractere'] ?>"><?=$caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="caractere2"  class="form-control">
                    <?php foreach($caracteres as $caractere) : ?>
                    
                    <option value="<?= $caractere['id_caractere'] ?>"><?= $caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="caractere3"  class="form-control">
               
                    <?php foreach($caracteres as $caractere) : ?>
                    
                    <option value="<?=$caractere['id_caractere'] ?>"><?= $caractere['libelle_caractere'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            </tr>
        </tbody>
    </table>
    <div class="row no-gutters">
        <div class="form-group col-12">
            <label for="descri_animal">description_animal</label>
            <textarea class="form-control" name="descri_animal" id=""></textarea>
        </div>
    
        <div class="form-group col-12">
            <label for="adoption_animal">description adoption animal</label>
            <textarea class="form-control" name="adoption_animal" id=""></textarea>
        </div>
        <div class="form-group col-12">
            <label for="engagement_animal">engagement animal</label>
            <textarea class="form-control" name="engagement_aniaml" id=""></textarea>
        </div>

        <div class="form-group col-12">
            <label for="localisation_animal">localisation animal</label>
            <textarea class="form-control" name="localisation_animal" id=""></textarea>
        </div>

        <div class="form-group">
        <label>Image</label>
        <input type="file" name="imageAnimal" class="form-control-file" id="">
        </div>
        <br/>

        
        <input type="submit" value="Valider" class="btn btn-primary col-12">
    </div>
    
</form>


<?php  
$admindPensioncontent = ob_get_clean();

?>