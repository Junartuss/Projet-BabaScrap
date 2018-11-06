<?php
  function getInfoArticle($idArticle){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM produit P, categorie C, marque M WHERE idProduit = '".$idArticle."' AND P.idCategorieProduit = C.idCategorie AND P.idMarqueProduit = M.idMarque");
    $req->execute();
    $detailArticle = $req->fetch();

    return $detailArticle;
  }
?>
