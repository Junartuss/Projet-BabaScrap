<?php
  function getProduct(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM produit");
    $req->execute();
    $listeProduit = $req->fetchAll();

    return $listeProduit;
  }

  function getFilterProduct($idCateg){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM produit WHERE idCategorieProduit = '".$idCateg."'");
    $req->execute();
    $listeProduit = $req->fetchAll();

    return $listeProduit;
  }

  function getCateg(){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM categorie");
    $req->execute();
    $listeCateg = $req->fetchAll();

    return $listeCateg;
  }

  function getProductPerPage($page, $longueur){
    global $bdd;
    $debut = ($page - 1) * $longueur;

    $req = $bdd->prepare("SELECT * FROM produit LIMIT $debut, $longueur");
    $req->execute();
    $listeProduit = $req->fetchAll();

    return $listeProduit;
  }

  function searchProduct($textSearch){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM produit WHERE nomProduit LIKE '%" . $textSearch . "%'");
    $req->execute();
    $produitSearch = $req->fetchAll();

    return $produitSearch;
  }

?>
