<?php
  include_once('models/modelContact.php');

  include_once('views/viewContact.php');

  if(!empty($_POST['inputSubmitContact'])){
    if(!empty($_POST['civiliteContact']) && !empty($_POST['nomContact']))
    setMailDatabase(htmlspecialchars($_POST['civiliteContact'], ENT_QUOTES), htmlspecialchars($_POST['nomContact'], ENT_QUOTES), htmlspecialchars($_POST['prenomContact'], ENT_QUOTES), htmlspecialchars($_POST['telContact'], ENT_QUOTES), htmlspecialchars($_POST['mailContact'], ENT_QUOTES), htmlspecialchars($_POST['objetContact'], ENT_QUOTES), htmlspecialchars($_POST['messageContact'], ENT_QUOTES));
    echo "<script>M.toast({html: 'Le formulaire a bien été envoyer'})</script>";
  }

?>
