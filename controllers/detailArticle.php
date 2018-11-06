<?php
include_once('models/modelPanier.php');
include_once('models/modelDetailArticle.php');

$infoArticle = getInfoArticle($_GET['idArticle']);

include_once('views/viewDetailArticle.php');

if(!empty($_POST['submitAjoutPanier'])){
  if(!empty($_POST['quantiteProduit'])){
    if($_POST['quantiteProduit'] <= $infoArticle['stockProduit']){
      createPanier();
    } else {
      echo "<script>M.toast({html: 'Le produit n'est pas disponible'})</script>";
    }
  } else {
    echo "<script>M.toast({html: 'Veuillez saisir une quantité'})</script>";
  }
}


?>
