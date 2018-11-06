<?php include_once('inc/header.php'); ?>

<div class="container customContainer">
  <center><div class="section loginPage">
    <div class="row">
      <div class="col s5">
        <h6>Se connecter</h6>
        <form action="" method="post">
          <div class="input-field col s12">
           <input onkeyup='this.value=this.value.toLowerCase()' name="mailConnection" id="mailConnection" type="email" class="validate">
           <label for="mailConnection">Mail</label>
         </div>
         <div class="input-field col s12">
          <input name="passwordConnection" id="passwordConnection" type="password" class="validate">
          <label for="passwordConnection">Mot de passe</label>
        </div>
        <div style="text-align: center; font-size: 13px; margin-bottom: 5%;" class="col s12">
          <a href="#">Mot de passe oublié ?</a>
        </div>
        <div class="col s12">
          <input type="submit" name="validationConnection" class="inputSubmit" value="Connexion">
        </div>
        </form>
      </div>
      <div class="col s7" style="border-left: 1px solid rgba(0, 0, 0, 0.1);">
       <h6>Inscription</h6>
       <form action="" method="post">
         <div class="input-field col s12">
           <select name="civiliteInscription">
            <option value="Madame">Madame</option>
            <option value="Monsieur">Monsieur</option>
          </select>
          <label>Civilité</label>
         </div>
         <div class="input-field col s6">
          <input name="nomInscription" id="nomInscription" type="text" class="validate">
          <label for="nomInscription">Nom</label>
        </div>
        <div class="input-field col s6">
         <input name="prenomInscription" id="prenomInscription" type="text" class="validate">
         <label for="prenomInscription">Prénom</label>
       </div>
       <div class="input-field col s12">
        <input onkeyup='this.value=this.value.toLowerCase()' name="mailInscription" id="mailInscription" type="email" class="validate">
        <label for="mailInscription">Mail</label>
      </div>
      <div class="input-field col s6">
       <input name="passwordInscription" id="passwordInscription" type="password" class="validate">
       <label for="passwordInscription">Mot de passe</label>
     </div>
     <div class="input-field col s6">
      <input name="passwordConfirmInscription" id="passwordConfirmInscription" type="password" class="validate">
      <label for="passwordConfirmInscription">Confirmation Mot de passe</label>
    </div>
      <div class="input-field col s12">
       <input name="adresseInscription" id="adresseInscription" type="text" class="validate">
       <label for="adresseInscription">Adresse</label>
     </div>
     <div class="input-field col s5">
      <input name="codePostalInscription" id="codePostalInscription" type="text" class="validate">
      <label for="codePostalInscription">Code Postal</label>
    </div>
    <div class="input-field col s7">
     <input name="villeInscription" id="villeInscription" type="text" class="validate">
     <label for="villeInscription">Ville</label>
   </div>
   <div class="input-field col s7">
    <input name="telInscription" id="telInscription" type="text" class="validate">
    <label for="telInscription">Téléphone</label>
  </div>
       <div class="col s12">
         <input type="submit" name="validationInscription" class="inputSubmit" value="S'inscrire">
       </div>
       </form>
      </div>
      </div>
    </div></center>
</div>
