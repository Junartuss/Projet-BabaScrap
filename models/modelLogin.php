<?php

  function registerUser($civiliteUser, $nomUser, $prenomUser, $adresseUser, $codePostalUser, $villeUser, $telUser, $mailUser, $passwordUser){
    global $bdd;
    $passwordCrypte = password_hash($passwordUser, PASSWORD_DEFAULT);

    $req = $bdd->prepare("INSERT INTO utilisateur(civiliteUtilisateur, nomUtilisateur, prenomUtilisateur, adresseUtilisateur, codePostalUtilisateur, villeUtilisateur, telUtilisateur, mailUtilisateur, passwordUtilisateur, rangUtilisateur) VALUES ('".$civiliteUser."', '".$nomUser."', '".$prenomUser."', '".$adresseUser."', '".$codePostalUser."', '".$villeUser."', '".$telUser."', '".$mailUser."', '".$passwordCrypte."', 0)");
    $req->execute();
  }

  function checkMail($mailUser){
    global $bdd;
    $result = true;

    $req = $bdd->prepare("SELECT * FROM utilisateur");
    $req->execute();
    $mail = $req->fetchAll();

    foreach($mail as $unMail){
      if($unMail['mailUtilisateur'] == $mailUser){
        $result = false;
      }
    }
    return $result;
  }

  function connectionUser($mailConnection, $passwordConnection){
    global $bdd;
    global $resultConnectionUser;
    global $verifPasswordConnection;

    $req = $bdd->prepare("SELECT idUtilisateur, passwordUtilisateur FROM utilisateur WHERE mailUtilisateur = '".$mailConnection."'");
    $req->execute();
    $resultConnectionUser = $req->fetch();

    $verifPasswordConnection = password_verify($passwordConnection, $resultConnectionUser['passwordUtilisateur']);
  }
?>
