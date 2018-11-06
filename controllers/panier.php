<?php
  include_once('models/modelPanier.php');

  include_once('views/viewPanier.php');

  if(isset($_GET["action"]))
  {
  	if($_GET["action"] == "delete")
  	{
  		deletePanier();
  	}
    if(!empty($_POST['quantiteArticle'])){
      if($_GET['action'] == "refresh"){
        refreshPanier();
      }
    } else {
      echo "<script>M.toast({html: 'Veuillez saisir une quantité'})</script>";
    }
  }

?>
