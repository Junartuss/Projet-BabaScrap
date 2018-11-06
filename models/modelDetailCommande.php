<?php
  function getDetailCommande($idCommande){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM commande WHERE idCommande = '" . $idCommande . "'");
    $req->execute();
    $detailCommande = $req->fetch();

    return $detailCommande;
  }

  function getDetailProduitCommande($idCommande){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM commandeListeProduit CL, produit P WHERE CL.idProduitListe = P.idProduit AND CL.idCommandeListe = '" . $idCommande . "'");
    $req->execute();
    $detailProduitCommande = $req->fetchAll();

    return $detailProduitCommande;
  }

  function changeDate($date){
    $dateModif = explode("-", $date);
    $dateChange = $dateModif[2] . "/" . $dateModif[1] . "/" . $dateModif[0];

    return $dateChange;
  }

  function getMoyenPaiement($idMoyenPaiement){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM moyenPaiement WHERE idMoyenPaiement = '" . $idMoyenPaiement . "'");
    $req->execute();
    $libPaiement = $req->fetch();

    return $libPaiement;
  }

  function getFraisDePort(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM parametreFraisDePort");
    $req->execute();
    $fraisDePort = $req->fetch();

    return $fraisDePort;
  }
?>
