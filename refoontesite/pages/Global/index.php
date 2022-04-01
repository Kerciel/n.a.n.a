<?php  include("../Commons/header.php"); 

echo styleTitreNiveau1("Ils ont besoin de vous!",COLOR_TITRE_ASSO);
?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
  </ol>
  <!--Debut item-->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row no-gutters border rounded overflow-hidden mb-4 perso_bgRose">
            <div class="col-12 col-md-auto text-center ">
                <img src="../../sources/images/Animaux/Chats/Framboise/Framboise.jpg" style="height:200px" alt="phot de framboire">
            </div>
            <div class="col p-4 d-flex flex-column position-static" >
                <h3 class="perso_ColorRoseMenu perso_policeTitre perso_textShadow">Framboise</h3>
                <div class="text-muted mb-1">02/2019</div>
                <p class="mb-auto">
                    Description de framboire
                </p>
                <a href="#" class="btn btn-primary" >Visiter ma page</a>
            </div>
        </div>
    </div>
    <!--Fin item-->
    <!--Debut item-->
    <div class="carousel-item">
      <div class="row no-gutters border rounded overflow-hidden mb-4 perso_bgRose">
            <div class="col-12 col-md-auto text-center ">
                <img src="../../sources/images/Animaux/Chats/Framboise/Framboise.jpg" style="height:200px" alt="phot de framboire">
            </div>
            <div class="col p-4 d-flex flex-column position-static" >
                <h3>Framboise</h3>
                <div>02/2019</div>
                <p>
                    Description de framboire
                </p>
                <a href="#" class="btn btn-primary" >Visiter ma page<a/>
            </div>
        </div>
    </div>
    <!--Fin item-->
  </div>
</div>

<div class="row">
    <div class="col-6 mt-3">

        <?php     
        $text = '<img  src="../../sources/images/Autres/icones/journal.png" alt="logo News" /> Nouvelles des adoptés';
        echo styleTitreNiveau2($text, COLOR_TITRE_ACTUS);    ?>
        
    </div>
    <div class="col-6 mt-3">
    <?php     
    $text = '<img  src="../../sources/images/Autres/icones/action.png" alt="logo News" />Evénement & Actions';
        echo styleTitreNiveau2($text,  COLOR_TITRE_PENSIONNAIRE);    ?>

    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="row no-gutters border rounded mb-4 perso_bgGreen">
            <div class="colo-auto d-none d-lg-block">
            <img src="../../sources/images/Animaux/Chats/Framboise/Framboise.jpg" style="height:200px" alt="phot de framboire" >
            </div>
            <div class="col p-3 d-flex flex-column position-static">
                <h3 class="mb-0 mt-2 perso_ColorVertMenu perso_policeTitre perso_textShadow" >Doyenne Chipie</h3>
                <p class="perso_size12">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum natus cumque earum possimus. Asperiores, nesciunt.</p>
                <a href="#" class="btn btn-primary" >Visiter ma page</a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row no-gutters border rounded mb-4 perso_bgOrange">
                <div class="colo-auto d-none d-lg-block">
                <img src="../../sources/images/Animaux/Chats/Framboise/Framboise.jpg" style="height:200px" alt="phot de framboire" >
                </div>
                <div class="col p-3 d-flex flex-column position-static">
                    <h3 class="mb-0 mt-2 perso_ColorOrangeMenu perso_policeTitre perso_textShadow" >Doyenne Chipie</h3>
                    <p class="perso_size12">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum natus cumque earum possimus. Asperiores, nesciunt.</p>
                    <a href="#" class="btn btn-primary" >Visiter ma page</a>
                </div>
        </div>
    </div>
</div>

<?php  include("../Commons/footer.php"); ?>