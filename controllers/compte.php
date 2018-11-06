<?php

  include_once('models/modelCompte.php');

  if(isset($_SESSION['id'])){
    $informationUser = getInfosUser();
    $listCommandeUtilisateur = getCommandeUtilisateur();
  } else {
    header("Location: index.php?page=login");
  }
  include_once('views/viewCompte.php');

  if(!empty($_POST['submitInfoUpdate'])){
    if(!empty($_POST['updateNomUser']) && !empty($_POST['updatePrenomUser']) && !empty($_POST['updateMailUser']) && !empty($_POST['updateAdresseUser']) && !empty($_POST['updateCodePostalUser']) && !empty($_POST['updateVilleUser']) && !empty($_POST['updateTelUser'])){
      updateInfosUser(htmlspecialchars($_POST['updateNomUser'], ENT_QUOTES), htmlspecialchars($_POST['updatePrenomUser'], ENT_QUOTES), htmlspecialchars($_POST['updateMailUser'], ENT_QUOTES), htmlspecialchars($_POST['updateAdresseUser'], ENT_QUOTES), htmlspecialchars($_POST['updateCodePostalUser'], ENT_QUOTES), htmlspecialchars($_POST['updateVilleUser'], ENT_QUOTES), htmlspecialchars($_POST['updateTelUser'], ENT_QUOTES));
      echo '<script>window.location="index.php?page=compte"</script>';
    } else {
      echo "<script>M.toast({html: 'Veuillez remplir tous les champs'})</script>";
    }
  }

  if(!empty($_POST['submitPasswordEdit'])){
    verifChangePassword(htmlspecialchars($_POST['beforeEditionPassword'], ENT_QUOTES));
    if($verifPasswordEdition){
      if(!empty($_POST['afterEditionPassword']) && !empty($_POST['afterConfirmEditionPassword'])){
        if($_POST['afterEditionPassword'] == $_POST['afterConfirmEditionPassword']){
          changePassword(htmlspecialchars($_POST['afterEditionPassword'], ENT_QUOTES));
        } else {
          echo "<script>M.toast({html: 'Les mot de passe ne correspondent pas'})</script>";
        }
      } else {
        echo "<script>M.toast({html: 'Veuillez remplir tous les champs'})</script>";
      }
    } else {
      echo "<script>M.toast({html: 'Ancien mot de passe incorrect'})</script>";
    }
  }
?>
