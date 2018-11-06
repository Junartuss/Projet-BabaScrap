<?php
include_once('models/modelLogin.php');

if(isset($_SESSION['id'])){
  header("Location: index.php?page=compte");
} else {

}

include_once('views/viewLogin.php');


  // Condition pour formulaire inscription
  if(!empty($_POST['validationInscription'])){
    if(!empty($_POST['nomInscription']) && !empty($_POST['prenomInscription']) && !empty($_POST['mailInscription']) && !empty($_POST['passwordInscription']) && !empty($_POST['passwordConfirmInscription']) && !empty($_POST['adresseInscription']) && !empty($_POST['codePostalInscription']) && !empty($_POST['villeInscription']) && !empty($_POST['telInscription'])){
      if($_POST['passwordInscription'] == $_POST['passwordConfirmInscription']){
        if(checkMail(htmlspecialchars($_POST['mailInscription'], ENT_QUOTES)) == true){
          registerUser(htmlspecialchars($_POST['civiliteInscription'], ENT_QUOTES), htmlspecialchars($_POST['nomInscription'], ENT_QUOTES), htmlspecialchars($_POST['prenomInscription'], ENT_QUOTES), htmlspecialchars($_POST['adresseInscription'], ENT_QUOTES), htmlspecialchars($_POST['codePostalInscription'], ENT_QUOTES), htmlspecialchars($_POST['villeInscription'], ENT_QUOTES), htmlspecialchars($_POST['telInscription'], ENT_QUOTES), htmlspecialchars($_POST['mailInscription'], ENT_QUOTES), htmlspecialchars($_POST['passwordInscription'], ENT_QUOTES));
          echo "<script>M.toast({html: 'Vous êtes bien inscris, vous pouvez vous connectez'})</script>";
        } else {
          echo "<script>M.toast({html: 'Le mail est déjà utilisé'})</script>";
        }
      } else {
        echo "<script>M.toast({html: 'Les mots de passes ne correspondent pas'})</script>";
      }
    } else {
      echo "<script>M.toast({html: 'Veuillez remplir tous les champs'})</script>";
    }
  }

  //Condition pour formulaire connexion
  if(!empty($_POST['validationConnection'])){
    if(!empty($_POST['mailConnection']) && !empty($_POST['passwordConnection'])){
      connectionUser(htmlspecialchars($_POST['mailConnection'], ENT_QUOTES), htmlspecialchars($_POST['passwordConnection'], ENT_QUOTES));
      if(!$resultConnectionUser){
        echo "<script>M.toast({html: 'Mauvais identifiant ou Mot de passe'})</script>";
      } else {
        if($verifPasswordConnection){
          $_SESSION['id'] = $resultConnectionUser['idUtilisateur'];
          echo '<script>window.location="index.php?page=compte"</script>';
        } else {
          echo "<script>M.toast({html: 'Mauvais identifiant ou mot de passe'})</script>";
        }
      }
    } else {
      echo "<script>M.toast({html: 'Veuillez remplir tous les champs'})</script>";
    }
  }
?>
