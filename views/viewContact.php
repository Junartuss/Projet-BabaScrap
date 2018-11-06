<?php  require 'inc/header.php'; ?>

<div class="container customContainer">
  <div class="section comptePage">
    <h5>Contactez nous !</h5>
    <div class="row">
      <div class="col s6" style="border-right: 1px solid rgba(0, 0, 0, 0.1);">
        <h6 style="color: #ee6e73; font-weight: 700;">Formulaire de contact</h6><br />
        <form action="" method="post">
          <div class="input-field col s4">
            <select name="civiliteContact">
             <option value="Madame">Madame</option>
             <option value="Monsieur">Monsieur</option>
           </select>
           <label>Civilité</label>
          </div>
          <div class="input-field col s4">
           <input name="nomContact" id="nomContact" type="text" class="validate">
           <label for="nomContact">Nom</label>
          </div>
           <div class="input-field col s4">
            <input name="prenomContact" id="prenomContact" type="text" class="validate">
            <label for="prenomContact">Prénom</label>
           </div>
           <div class="input-field col s5">
             <input name="telContact" id="telContact" type="tel" class="validate">
             <label for="telContact">Téléphone</label>
           </div>
           <div class="input-field col s7">
             <input onkeyup='this.value=this.value.toLowerCase()' name="mailContact" id="mailContact" type="email" class="validate">
             <label for="mailContact">Mail</label>
           </div>
           <div class="input-field col s12">
             <input name="objetContact" id="objetContact" type="text" class="validate">
             <label for="objetContact">Objet</label>
           </div>
           <div class="input-field col s12">
             <textarea class="materialize-textarea" name="messageContact" id="messageContact"></textarea>
             <label for="messageContact">Message</label>
           </div>
           <center><div class="col s12">
             <input type="submit" name="inputSubmitContact" class="inputSubmit" value="Envoyer">
           </div></center>
         </form>
       </div>
      <div class="col s6">
        <h6 style="color: #ee6e73; font-weight: 700;">Informations Pratiques</h6>
      </div>
    </div>
  </div>
</div>
