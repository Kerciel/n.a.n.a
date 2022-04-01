<?php 


const COLOR_TITRE_ASSO = "perso_ColorRoseMenu";
const COLOR_TITRE_PENSIONNAIRE = "perso_ColorOrangeMenu";
const COLOR_TITRE_ACTUS = "perso_ColorVertMenu";
const COLOR_TITRE_CONSEIL = "perso_ColorRougeMenu";
const COLOR_TITRE_CONTACT = "perso_ColorBleuCielMenu";

const  HOST_NAME = "localhost";
const DATABASE_NAME = "n.a.n.a";
const USER_NAME = "root";
const PASSWORD = "";

const ID_STATUT_A_L_ADOPTION = 1;
const ID_STATUT_ADOPTE = 2;
const ID_STATUT_FALD = 3;
const ID_STATUT_MORT = 4;

const COOKIE_PROTECT = "timer";

const ID_ACTUS_NEW = 1;
const ID_ACTUS_EVENT = 2;
const ID_ACTUS_ACTION = 3;

define("URL",str_replace("index.php","",(isset($_SERVER["HTTPS3"])? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
?>