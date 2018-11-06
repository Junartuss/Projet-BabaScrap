<?php
  function getInfoUserConnect(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = '" . $_SESSION['id'] . "'");
    $req->execute();
    $detailUser = $req->fetch();

    return $detailUser;
  }

  function getFraisDePort(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM parametreFraisDePort");
    $req->execute();
    $fraisDePort = $req->fetch();

    return $fraisDePort;
  }

  function getMoyenPaiement(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM moyenPaiement");
    $req->execute();
    $moyenPaiement = $req->fetchAll();

    return $moyenPaiement;
  }

  function setCommande($civiliteDestinataire, $nomDestinataire, $prenomDestinataire, $adresseDestinataire, $codePostalDestinataire, $villeDestinataire, $prixTotalCommande, $moyenPaiementCommande){
    global $bdd;

    $req = $bdd->prepare("INSERT INTO commande(civiliteDestinataireCommande, nomDestinataireCommande, prenomDestinataireCommande, adresseLivraison, codePostalLivraison, villeLivraison, prixTotalCommande, statutCommande, dateCommande, idUtilisateurCommande, idMoyenPaiementCommande) VALUES('" . $civiliteDestinataire . "', '" . $nomDestinataire . "', '" . $prenomDestinataire . "', '" . $adresseDestinataire . "', '" . $codePostalDestinataire . "', '" . $villeDestinataire . "', '" . $prixTotalCommande . "', 0, NOW(), '" . $_SESSION['id'] . "', '" . $moyenPaiementCommande . "')");
    $req->execute();

    $reqRecupIdCommande = $bdd->prepare("SELECT idCommande FROM commande WHERE idCommande = (SELECT MAX(idCommande) FROM commande)");
    $reqRecupIdCommande->execute();
    $idCommande = $reqRecupIdCommande->fetch();
    $idLastCommande = $idCommande['idCommande'];

    foreach($_SESSION["panier"] as $keys => $values){

      //Enlever quantité correspondante
      $reqRecupQuantiteProduit = $bdd->prepare("SELECT stockProduit FROM produit WHERE idProduit = '" . $values['item_id'] . "'");
      $reqRecupQuantiteProduit->execute();
      $quantiteProduit = $reqRecupQuantiteProduit->fetch();
      $quantity = $quantiteProduit['stockProduit'];

      $refreshQuantite = $quantity - $values['item_quantity'];

      $reqDeleteQuantiteCorres = $bdd->prepare("UPDATE produit SET stockProduit = '" . $refreshQuantite . "' WHERE idProduit = '" . $values['item_id'] . "'");
      $reqDeleteQuantiteCorres->execute();
      //Fin quantité

      $reqAjoutCommande = $bdd->prepare("INSERT INTO commandeListeProduit(idCommandeListe, idProduitListe, prixProduitListe, quantiteListeProduit) VALUES ('" . $idLastCommande . "', '" . $values['item_id'] . "', '" . $values['item_price'] . "', '" . $values['item_quantity'] . "')");
      $reqAjoutCommande->execute();
    }

    unset($_SESSION['panier']);
    unset($_SESSION['validatePanier']);
  }
?>
