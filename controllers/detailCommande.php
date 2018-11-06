<?php
  include_once('models/modelDetailCommande.php');

  if(isset($_SESSION['id'])){
    if(isset($_GET['idCommande'])){
      $detailCommande = getDetailCommande($_GET['idCommande']);
      $detailProduitCommande = getDetailProduitCommande($_GET['idCommande']);
      $changeDate = changeDate($detailCommande['dateCommande']);
      $libPaiement = getMoyenPaiement($detailCommande['idMoyenPaiementCommande']);
      $fraisDePort = getFraisDePort();
    } else {
      header("Location: index.php?page=compte");
    }
  } else {
    header("Location: index.php?page=login");
  }

  include_once('views/viewDetailCommande.php');

?>
