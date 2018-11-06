<?php
  function getInfosUser(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = '".$_SESSION['id']."'");
    $req->execute();
    $infoUser = $req->fetchAll();

    return $infoUser;
  }

  function updateInfosUser($nomUser, $prenomUser, $mailUser, $adresseUser, $codePostalUser, $villeUser, $telUser){
    global $bdd;

    $idUser = $_SESSION['id'];

    $req = $bdd->prepare("UPDATE utilisateur SET nomUtilisateur = '".$nomUser."', prenomUtilisateur = '".$prenomUser."', mailUtilisateur = '".$mailUser."', adresseUtilisateur = '".$adresseUser."', codePostalUtilisateur = '".$codePostalUser."', villeUtilisateur = '".$villeUser."', telUtilisateur = '".$telUser."' WHERE idUtilisateur = $idUser");
    $req->execute();
  }

  // Début traitement changement MDP

  function verifChangePassword($beforePassword){
    global $bdd;
    global $resultVerifPasswordEdition;
    global $verifPasswordEdition;

    $req = $bdd->prepare("SELECT passwordUtilisateur FROM utilisateur WHERE idUtilisateur = '".$_SESSION['id']."'");
    $req->execute();
    $resultVerifPasswordEdition = $req->fetch();

    $verifPasswordEdition = password_verify($beforePassword, $resultVerifPasswordEdition['passwordUtilisateur']);
  }

  function changePassword($afterPassword){
    global $bdd;

    $passwordCrypte = password_hash($afterPassword, PASSWORD_DEFAULT);

    $req = $bdd->prepare("UPDATE utilisateur SET passwordUtilisateur = '".$passwordCrypte."' WHERE idUtilisateur = '".$_SESSION['id']."'");
    $req->execute();
  }

  // Fin traitement changement MDP

  function getCommandeUtilisateur(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM commande WHERE idUtilisateurCommande = '" . $_SESSION['id'] . "' ORDER BY dateCommande DESC");
    $req->execute();
    $listCommandeUtilisateur = $req->fetchAll();

    return $listCommandeUtilisateur;
  }
?>
