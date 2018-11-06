<?php  require 'inc/header.php'; ?>

<?php //var_dump($detailCommande); ?>
<?php //var_dump($detailProduitCommande); ?>

<div class="container customContainer">
  <div class="section comptePage">
    <h5>Commande n°<span style="font-weight: 700;color: #ee6e73;"><?php echo $detailCommande['idCommande']; ?></span></h5>
    <?php if ($detailCommande['statutCommande'] == 1){
      echo "<p class='infoPrincipaleArticle'>Statut : <span style='color: green;font-weight: 700;'>Terminé</span></p>";
    } elseif($detailCommande['statutCommande'] == 0) {
      echo "<p class='infoPrincipaleArticle'>Statut : <span style='color: red;font-weight: 700;'>En cours</span></p>";
    } ?>
    <p class="infoPrincipaleArticle">Date Commande : <span><?php echo $changeDate; ?></span></p>
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
          foreach($detailProduitCommande as $unProduitCommande) { ?>
            <tr>
              <td><?php echo $unProduitCommande['nomProduit']; ?></td>
              <td><?php echo $unProduitCommande['quantiteListeProduit']; ?></td>
              <td><?php echo $unProduitCommande['prixProduitListe']; ?> €</td>
              <td><b><?php echo $unProduitCommande['quantiteListeProduit'] * $unProduitCommande['prixProduitListe']; ?> €</b></td>
            </tr>
          <?php $total = $total + ($unProduitCommande['quantiteListeProduit'] * $unProduitCommande['prixProduitListe']); } ?>
      </tbody>
    </table><br />
    <div class="row">
      <div class="groupBox col s6">
        <h6 class="h6Custom">➤ Informations Destinataire</h6>
        <p class='infoPrincipaleArticle'><?php echo $detailCommande['civiliteDestinataireCommande'] . " <span>" . $detailCommande['nomDestinataireCommande'] . " " . $detailCommande['prenomDestinataireCommande'] . "</span>";?></p>
        <p class="infoPrincipaleArticle"><span><?php echo $detailCommande['adresseLivraison'] . "<br />" . $detailCommande['codePostalLivraison'] . " " . $detailCommande['villeLivraison']; ?></span></p>
        <p class="infoPrincipaleArticle">Moyen de Paiement : <span><?php echo $libPaiement['nomMoyenPaiement']; ?></span></p>
      </div>
      <div class="col s3"></div>
      <div class="col s3">
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
        <a onClick="window.print()" class="waves-effect waves-light btn"><i class="material-icons left">cloud_download</i> Imprimer</a>
      </div>
    </div>
  </div>
</div>
