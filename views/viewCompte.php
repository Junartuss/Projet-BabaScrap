<?php  require 'inc/header.php'; ?>

<div class="container customContainer">
  <div class="section comptePage">
    <div class="row">
      <div class="col s3">
        <div class="collection">
           <a href="#modalEditionProfilCompte" class="modal-trigger collection-item">Editer les informations</a>
           <a href="#modalEditionPassword" class="modal-trigger collection-item">Changer le mot de passe</a>
           <a href="models/modelCompteDisconnect.php" class="collection-item">Déconnexion</a>
        </div>
      </div>
      <div class="col s9">
        <?php foreach($informationUser as $infoUser) { ?>
        <h5>Informations de votre compte</h5>
        <div class="row">
          <div class="col s12">
            <p><b>Civilité : </b><span class="infoCompte"><?php echo $infoUser['civiliteUtilisateur']; ?></span></p>
          </div>
        </div>
          <div class="row">
            <div class="col s6">
              <p><b>Nom : </b><span class="infoCompte"><?php echo $infoUser['nomUtilisateur']; ?></span></p>
            </div>
            <div class="col s6">
              <p><b>Prénom : </b><span class="infoCompte"><?php echo $infoUser['prenomUtilisateur']; ?></span></p>
            </div>
        </div>
        <div class="row">
          <div class="col s6">
            <p><b>Mail : </b><span class="infoCompte"><?php echo $infoUser['mailUtilisateur']; ?></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <p><b>Adresse : </b><span class="infoCompte"><?php echo $infoUser['adresseUtilisateur']; ?></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col s3">
            <p><b>Code Postal : </b><span class="infoCompte"><?php echo $infoUser['codePostalUtilisateur']; ?></span></p>
          </div>
          <div class="col s6">
            <p><b>Ville : </b><span class="infoCompte"><?php echo $infoUser['villeUtilisateur']; ?></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <p><b>Téléphone : </b><span class="infoCompte"><?php echo $infoUser['telUtilisateur']; ?></span></p>
          </div>
        </div>

        <!-- Debut ModalEditionProfil -->

        <div id="modalEditionProfilCompte" class="modal modal-fixed-footer modalCustom">
        <form action="" method="post">
          <div class="modal-content">
           <h4>Edition de votre profil</h4><br />
             <div class="row">
               <div class="input-field col s6">
                 <input type="text" name="updateNomUser" value="<?php echo $infoUser['nomUtilisateur']; ?>">
                 <label for="updateNomUser">Nom</label>
               </div>
               <div class="input-field col s6">
                 <input type="text" name="updatePrenomUser" value="<?php echo $infoUser['prenomUtilisateur']; ?>">
                 <label for="updatePrenomUser">Prénom</label>
               </div>
           </div>
           <div class="row">
             <div class="input-field col s9">
               <input type="email" name="updateMailUser" value="<?php echo $infoUser['mailUtilisateur']; ?>">
               <label for="updateMailUser">Mail</label>
             </div>
           </div>
           <div class="row">
             <div class="input-field col s9">
               <input type="text" name="updateAdresseUser" value="<?php echo $infoUser['adresseUtilisateur']; ?>">
               <label for="updateAdresseUser">Adresse</label>
             </div>
           </div>
           <div class="row">
             <div class="input-field col s3">
               <input type="text" name="updateCodePostalUser" value="<?php echo $infoUser['codePostalUtilisateur']; ?>">
               <label for="updateCodePostalUser">Code Postal</label>
             </div>
             <div class="input-field col s9">
               <input type="text" name="updateVilleUser" value="<?php echo $infoUser['villeUtilisateur']; ?>">
               <label for="updateVilleUser">Ville</label>
             </div>
           </div>
           <div class="row">
             <div class="input-field col s6">
               <input type="text" name="updateTelUser" value="<?php echo $infoUser['telUtilisateur']; ?>">
               <label for="updateTelUser">Téléphone</label>
             </div>
           </div>
          </div>
          <div class="modal-footer">
             <input class="inputSubmit" type="submit" name="submitInfoUpdate" value="Enregistrer">
          </div>
        </form>
        </div>

        <!-- Fin ModalEditionProfil -->

        <!-- Debut ModalEditionPassword -->

        <div id="modalEditionPassword" class="modal modal-fixed-footer modalCustom">
        <form action="" method="post">
          <div class="modal-content">
           <h4>Edition de votre mot de passe</h4><br />
             <div class="row">
               <div class="input-field col s6">
                 <input type="password" name="beforeEditionPassword">
                 <label for="beforeEditionPassword">Ancien Mot de passe</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s6">
                 <input type="password" name="afterEditionPassword">
                 <label for="afterEditionPassword">Nouveau Mot de passe</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s6">
                 <input type="password" name="afterConfirmEditionPassword">
                 <label for="afterConfirmEditionPassword">Confirmation Mot de passe</label>
               </div>
             </div>
          </div>
          <div class="modal-footer">
             <input class="inputSubmit" type="submit" name="submitPasswordEdit" value="Enregistrer">
          </div>
        </form>
        </div>

        <!-- Fin ModalEditionPassword -->

      <?php } ?>
      </div>
    </div>
  </div>
  <div class="section comptePage">
    <h5>Gestion de vos commandes</h5>
    <?php if(count($listCommandeUtilisateur) >= 1){ ?>
    <table>
       <thead>
         <tr>
             <th>N° Commande</th>
             <th>Destinataire</th>
             <th>Adresse Destinataire</th>
             <th>Prix (TTC)</th>
             <th>Status</th>
             <th>Détails</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach($listCommandeUtilisateur as $uneCommande) {?>
         <tr>
           <td><?php echo $uneCommande['idCommande']; ?></td>
           <td><?php echo $uneCommande['nomDestinataireCommande'] . " " . $uneCommande['prenomDestinataireCommande']; ?></td>
           <td><?php echo $uneCommande['adresseLivraison'] . ",<br />" . $uneCommande['codePostalLivraison'] . " " . $uneCommande['villeLivraison']; ?></td>
           <td><?php echo $uneCommande['prixTotalCommande']; ?> €</td>
           <?php
            if ($uneCommande['statutCommande'] == 1){
              echo "<td style='color: green;font-weight: 700;'>Terminé</td>";
            } elseif($uneCommande['statutCommande'] == 0) {
              echo "<td style='color: red;font-weight: 700;'>En cours</td>";
            }
           ?>
           <td><a href="index.php?page=detailCommande&idCommande=<?php echo $uneCommande['idCommande']; ?>" style="text-align: center;"><i style="font-size: 3em;color: #ee6e73;" class="material-icons">add_circle_outline</i></a></td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
   <?php } else { ?>
     <br /><center><h5>Aucune commande n'est disponible</h5></center>
   <?php } ?>
  </div>
</div>
