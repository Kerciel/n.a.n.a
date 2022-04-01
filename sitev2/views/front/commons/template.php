
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$description?>" >
    <title> <?= $title ?></title>
    <link href="<?= URL ?>public/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= URL ?>public/css/main.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    
    <!--header du site-->
    <div class="container p-0 mt-2 rounded">
        <header class="bg-dark text-white rounded-top perso_policeTitre perso_shadow">
            <div class="row align-items-center m-0">
                <div class="col-2 p-2 text-center">
                    <a href="<?= URL ?>acceuil">
                        <img src="<?= URL ?>public/sources/images/Autres/logoNANA2.jpg" class="rounded-circle img-fluid perso_logoSize" alt="logo du site">
                    </a>
                </div>
                <div class="col-6 col-lg-8 m-0 p-0">
                    <?php include("views/menu.php"); ?>
                </div>
                <div class="col-4 col-lg-2 text-right pt-1 pr-4">
                   <a href="<?= URL ?>login" class="nav-link text-white text-center"> N.A.N.A <br/> Clermont(09)</a>
                </div>
            </div>
        </header>

        <!--Contenu du site-->
        <div class="border p-1 perso_MinCorpSize px-5">

        <?= $content ?>

        
        </div>
        <!--Footer du site-->
        <footer class="bg-dark text-center text-white rounded-bottom perso_shadow ">
                <p class="p-2">&copy; Association N.A.N.A 2022-2023 <p>    
        </footer>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='<?= URL ?>public/bootstrap/js/bootstrap.js'> </script>
</body>
</html>