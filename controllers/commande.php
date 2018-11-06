<?php

include_once('models/modelCommande.php');

if(isset($_SESSION['id'])){
  if(isset($_SESSION['panier']) && count($_SESSION['panier']) >= 1){
    if(!empty($_POST['inputValidatePanier'])){
      $_SESSION['validatePanier'] = "validate";
    }
    $detailUser = getInfoUserConnect();
    $fraisDePort = getFraisDePort();
    $moyenPaiement = getMoyenPaiement();
  } else {
    header("Location: index.php?page=panier");
  }
} else {
  header("Location: index.php?page=login");
}

include_once('views/viewCommande.php');

if(!empty($_POST['inputSubmitCommande'])){
  if(!empty($_POST['civiliteDestinataire']) && !empty($_POST['nomDestinataire']) && !empty($_POST['prenomDestinataire']) && !empty($_POST['adresseDestinataire']) && !empty($_POST['codePostalDestinataire']) && !empty($_POST['villeDestinataire']) && !empty($_POST['moyenPaiementCommande'])){
    setCommande(htmlspecialchars($_POST['civiliteDestinataire'], ENT_QUOTES), htmlspecialchars($_POST['nomDestinataire'], ENT_QUOTES), htmlspecialchars($_POST['prenomDestinataire'], ENT_QUOTES), htmlspecialchars($_POST['adresseDestinataire'], ENT_QUOTES), htmlspecialchars($_POST['codePostalDestinataire'], ENT_QUOTES), htmlspecialchars($_POST['villeDestinataire'], ENT_QUOTES), $totalCommande, htmlspecialchars($_POST['moyenPaiementCommande'], ENT_QUOTES));
    echo "<script>M.toast({html: 'Commande bien enregistrer'})</script>";
    echo "<script>window.location='index.php?page=panier'</script>";
  } else {
    echo "<script>M.toast({html: 'Veuillez remplir tous les champs'})</script>";
  }
}

?>
