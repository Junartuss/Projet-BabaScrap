<?php  require 'inc/header.php'; ?>
<div class="container customContainer">
  <div class="section comptePage">
    <h5>Ma commande</h5>
    <?php if(isset($_SESSION['validatePanier'])) { ?>
    <table>
      <thead>
        <tr>
          <th>Article</th>
          <th>Quantité(s)</th>
          <th>Prix (TTC)</th>
          <th>Prix Total (TTC)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $total = 0;
          foreach($_SESSION["panier"] as $keys => $values) { ?>
            <tr>
              <td><?php echo $values['item_name']; ?></td>
              <td><?php echo $values['item_quantity']; ?></td>
              <td><?php echo $values['item_price']; ?> €</td>
              <td><b><?php echo $values["item_quantity"] * $values["item_price"]; ?> €</b></td>
            </tr>
          <?php $total = $total + ($values["item_quantity"] * $values["item_price"]); } ?>
      </tbody>
    </table><br />
      <div class="row">
        <form action="" method="post">
          <div class="section commandePage col s7"><br />
              <div class="row">
                <div class="input-field col s4">
                  <select name="civiliteDestinataire">
                   <option value="<?php echo $detailUser['civiliteUtilisateur'] ?>"><?php echo $detailUser['civiliteUtilisateur'] ?></option>
                   <?php if($detailUser['civiliteUtilisateur'] == "Monsieur") { ?>
                     <option value="Madame">Madame</option>
                   <?php } else { ?>
                     <option value="Monsieur">Monsieur</option>
                   <?php } ?>
                 </select>
                 <label>Civilité</label>
                </div>
                <div class="input-field col s4">
                  <input name="nomDestinataire" id="nomDestinataire" type="text" value="<?php echo $detailUser['nomUtilisateur']; ?>" class="validate">
                  <label for="nomDestinataire">Nom Destinataire</label>
                </div>
                <div class="input-field col s4">
                  <input name="prenomDestinataire" id="prenomDestinataire" type="text" value="<?php echo $detailUser['prenomUtilisateur']; ?>" class="validate">
                  <label for="prenomDestinataire">Prénom Destinataire</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s9">
                  <input name="adresseDestinataire" id="adresseDestinataire" type="text" value="<?php echo $detailUser['adresseUtilisateur']; ?>" class="validate">
                  <label for="adresseDestinataire">Adresse Destinataire</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s3">
                  <input name="codePostalDestinataire" id="codePostalDestinataire" type="text" value="<?php echo $detailUser['codePostalUtilisateur']; ?>" class="validate">
                  <label for="codePostalDestinataire">Code Postal</label>
                </div>
                <div class="input-field col s5">
                  <input name="villeDestinataire" id="villeDestinataire" type="text" value="<?php echo $detailUser['villeUtilisateur']; ?>" class="validate">
                  <label for="villeDestinataire">Ville</label>
                </div>

                <div class="input-field col s8">
                  <select name="moyenPaiementCommande">
                  <?php foreach($moyenPaiement as $unMoyenPaiement) { ?>
                    <option value="<?php echo $unMoyenPaiement['idMoyenPaiement']; ?>"><?php echo $unMoyenPaiement['nomMoyenPaiement']; ?></option>
                  <?php } ?>
                 </select>
                 <label>Moyen de paiement</label>
                </div>
              </div>
          </div>
          <div class="col s5"><br /><br /><br /><br /><br /><br />
            <div class="row">
              <div class="col s2"></div>
              <div class="col s10">
                <span><i>Les frais de port sont gratuit à partir de 60 euros d'achat.</i></span>
              </div>
            </div>
            <div class="row">
              <div class="col s2"></div>
              <div class="col s10">
                <p><b>Sous Total (TTC) : <span style="color: #ee6e73;"><?php echo $total; ?> €</span></b></p>
                <?php
                  if($fraisDePort['limiteFdp'] > $total){
                    $fdp = $fraisDePort['montantFdp'];
                  } else {
                    $fdp = 0;
                  }
                  $totalCommande = $total + $fdp;
                ?>
                <p><i>Frais de Port : <?php echo $fdp; ?> €</i></p>
                <p><b>Total (TTC) : <span style="color: #ee6e73;"><?php echo $totalCommande; ?> €</span></b></p>
                <input type="submit" name="inputSubmitCommande" class="inputSubmit" value="Procéder au paiement">
              </div>
            </div>
          </div>
        </form>
    </div>
  <?php } else { ?>
    <center><h5>Votre panier n'est pas validé</h5></center>
  <?php } ?>
  </div>
</div>
