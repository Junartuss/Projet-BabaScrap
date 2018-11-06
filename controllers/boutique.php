<?php
  include_once('models/modelBoutiqueArticle.php');


  $listeCategorie = getCateg();
  $listeProduct = getProduct();
  $nombreOeuvre = 6;

  if(isset($_GET['categ'])){
    $listeProductPerPage = getFilterProduct($_GET['categ']);
  } elseif(isset($_GET['search'])) {
    $listeProductPerPage = searchProduct($_GET['search']);
  } else {
    if(isset($_GET['numpage'])){
      $listeProductPerPage = getProductPerPage($_GET['numpage'], $nombreOeuvre);
    } else {
      $listeProductPerPage = getProduct();
    }
  }

  include_once('views/viewBoutique.php');

?>
