<?php  
ob_start();
?>



<div class="row  no-gutters">
  <div class="col-12 col-lg-4 p-2">
      <img class="img-fluid img-thumbnail"  src="<?= URL ?>public/sources/images/Autres/Articles/Sterilisation2.jpg" />
  </div>
  <div class="col-12 col-lg-8 p-2">
 
      <?= styleTitreNiveau1("Pourquoi la stérilisation est un acte responsable?", COLOR_TITRE_CONSEIL) ?>

      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, fugit consectetur rem eaque quidem corrupti quisquam. Distinctio eum repudiandae saepe repellendus, sunt nostrum id asperiores expedita, ipsa optio cumque. Cum!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore qui delectus soluta similique? Facilis nemo labore aut odit laudantium? Sunt.
      </p>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae debitis enim natus accusamus tempore officia, sed possimus quae voluptate aut voluptates maiores blanditiis consequuntur aliquam dolore magni vitae autem! Eum omnis illum possimus veniam veritatis. Delectus eum at nobis quos?</p>
      <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quam eum quae accusantium ab aliquid, culpa animi sequi vitae deserunt.</P>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, maiores.</p>
  </div>
</div>


<?php  
$content = ob_get_clean();
require_once "views/front/commons/template.php";
 ?>