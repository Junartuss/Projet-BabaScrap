<?php
  function createPanier(){
    if(isset($_SESSION['panier']))
    {
      $item_array_id = array_column($_SESSION['panier'], 'item_id');
      if(!in_array($_GET['idArticle'], $item_array_id))
      {
        $count = count($_SESSION['panier']);
        $item_array = array(
          'item_id'			=>	$_GET['idArticle'],
          'item_name'			=>	$_POST['nomProduit'],
          'item_price'		=>	$_POST['prixProduit'],
          'item_quantity'		=>	$_POST['quantiteProduit']
        );
        $_SESSION["panier"][$count] = $item_array;
        echo "<script>window.location='index.php?page=panier'</script>";
      }
      else
      {
        echo "<script>M.toast({html: 'Le produit est déjà ajouté'})</script>";
      }
    }
    else
    {
      $item_array = array(
        'item_id'			=>	$_GET['idArticle'],
        'item_name'			=>	$_POST['nomProduit'],
        'item_price'		=>	$_POST['prixProduit'],
        'item_quantity'		=>	$_POST['quantiteProduit']
      );
      $_SESSION['panier'][0] = $item_array;
      echo "<script>window.location='index.php?page=panier'</script>";
    }
  }

  function deletePanier(){
    foreach($_SESSION["panier"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["idArticle"])
      {
        unset($_SESSION["panier"][$keys]);
        $_SESSION['panier'] = array_values($_SESSION['panier']);
        echo '<script>window.location="index.php?page=panier"</script>';
      }
    }
  }

  function refreshPanier(){
    foreach($_SESSION["panier"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["idArticle"])
      {
        $_SESSION["panier"][$keys]['item_quantity'] = $_POST['quantiteArticle'];
        echo '<script>window.location="index.php?page=panier"</script>';
      }
    }
  }
?>
