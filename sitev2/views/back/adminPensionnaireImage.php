<br />
<?php  

echo styleTitreNiveau1("Gestion images:","perso_ColorAdminMenu");
?>
<div id="ImageOfgroup" >
<?php foreach($anima['image'] as $image ):?>
        <img src="<?= $image['url_image']  ?>" style="max-height:200px; " id="<?= $image['id_image']?>">
 <?php endforeach;?>
</div>
<div >
    <input type="" name="Imagetodelete" id="Imagetodelete">
</div>


<script src="public/js/imagManager.js" ></script>