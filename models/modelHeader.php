<?php
  function getNameUser(){
    global $bdd;

    $req = $bdd->prepare("SELECT prenomUtilisateur FROM utilisateur WHERE idUtilisateur = '" . $_SESSION['id'] . "'");
    $req->execute();
    $nameUser = $req->fetch();

    return $nameUser;
  }
 ?>
