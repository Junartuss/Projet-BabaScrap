<?php
  include_once('models/modelCompte.php');

  include_once('models/modelHome.php');

  $lesProduits = get_produits();
  $lesActualites = get_actualites();
  
  include_once('views/viewHome.php');
?>
