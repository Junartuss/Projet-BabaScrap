<?php require 'models/modelHeader.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="views/img/origami.ico" />
    <title>BabaScrap</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="views/css/hover.css">
    <link rel="stylesheet" href="views/css/materialize.css">
    <link rel="stylesheet" href="views/css/custom.css">
  </head>
  <body>
    <nav class="lighten-1 customNav" role="navigation">
    <div class="nav-wrapper container customNav"><img class="logoSite" style="width: 6%;margin-right: 5px;" src="views/img/origami.png" /><a id="logo-container" href="index.php?page=home" class="brand-logo"> Babascrap</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php?page=home">Accueil</a></li>
        <li><a href="index.php?page=shop&numpage=1">Boutique</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <li><a href="index.php?page=panier"><i style="font-size: 2.5rem;" class="large material-icons">add_shopping_cart</i></a></li>
        <li><a href="index.php?page=login"><i style="font-size: 2.5rem;" class="large material-icons">account_circle</i></a></li>
        <?php if(isset($_SESSION['id'])) { ?>
        <?php $name = getNameUser(); ?>
        <li style="margin-left: 20px;">Bienvenue <b><u><?php echo $name['prenomUtilisateur']; ?></u></b></li>
      <?php } ?>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.php?page=home">Accueil</a></li>
        <li><a href="index.php?page=shop&numpage=1">Boutique</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <li><a href="index.php?page=panier">Panier</a></li>
        <?php if(isset($_SESSION['id'])) { ?>
          <li><a href="index.php?page=compte">Mon Compte</a></li>
        <?php } else { ?>
          <li><a href="index.php?page=login">Connection</a></li>
        <?php } ?>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="views/js/init.js"></script>
  <script src="views/js/materialize.min.js"></script>
