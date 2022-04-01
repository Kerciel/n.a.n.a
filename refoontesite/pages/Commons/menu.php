<nav class="navbar navbar-expand-lg navbar-dark bg-dark perso_size20">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle perso_ColorRoseMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                L'asso
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRoseMenu" href="../Global/association.php">Qui sommes-nous ?</a>
                <a class="dropdown-item perso_ColorRoseMenu" href="../Global/partenaires.php">Partenaires</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pensionnaires
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaire.php?idstatut=<?= ID_STATUT_A_L_ADOPTION; ?>">Ils cherchent une famille</a>
                <a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaire.php?idstatut=<?= ID_STATUT_FALD ;?>">Famille d'Accueil Longue Durée</a>
                <a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaire.php?idstatut=<?= ID_STATUT_ADOPTE; ?>">Les anciens</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorVertMenu" href="../Global/actus.php">Nouvelles des adoptés</a>
                <a class="dropdown-item perso_ColorVertMenu" href="#">Evénements</a>
                <a class="dropdown-item perso_ColorVertMenu" href="#">Nos actions au quotidien</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Conseils
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRougeMenu" href="../Articles/temperatures.php">Températures</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="../Articles/chocolat.php">Le chocolat</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="../Articles/plantes.php">Les plantes toxiques</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="../Articles/sterilisation.php">Stérilisation</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="../Articles/educateur.php">Educateur canin</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorBleuCielMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contacts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorBleuCielMenu" href="../Contact/contact.php">Contact</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="../Contact/don.php">Don</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="../Contact/mentions.php">Mentions légales</a>
            </div>
        </li>
    </ul>
  </div>
</nav>