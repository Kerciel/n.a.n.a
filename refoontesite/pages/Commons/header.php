<?php 
require_once("../../utiles/formatage.php");
require_once("../../utiles/config.php");
require_once("../Global/pdo.php");
require_once("../Global/animal.dao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../../css/main.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
</head>
<body>
    <!--header du site-->
    <div class="container p-0 mt-2 rounded">
        <header class="bg-dark text-white rounded-top perso_policeTitre perso_shadow">
            <div class="row align-items-center m-0">
                <div class="col-2 p-2 text-center">
                    <a href="../Global/index.php">
                        <img src="../../sources/images/Autres/logoNANA2.jpg" class="rounded-circle img-fluid perso_logoSize" alt="logo du site">
                    </a>
                </div>
                <div class="col-6 col-lg-8 m-0 p-0">
                    <?php include("../Commons/menu.php"); ?>
                </div>
                <div class="col-4 col-lg-2 text-right pt-1 pr-4">
                    N.A.N.A <br/> Clermont(09)
                </div>
            </div>
        </header>

        <!--Contenu du site-->
        <div class="border p-1 perso_MinCorpSize px-5">