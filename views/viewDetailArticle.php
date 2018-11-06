<?php  require 'inc/header.php'; ?>
<div class="container customContainer">
  <div class="section loginPage detailProduitPage">
      <div class="row">
        <div class="col s6" style="border-right: 1px solid rgba(0, 0, 0, 0.2);">
          <img class="responsive-img imgProduit" src="views/img/products/<?php echo $infoArticle['photoProduit']; ?>">
        </div>
        <div class="col s6">
            <h5 class="nomDetailProduit"><?php echo $infoArticle['nomProduit']; ?></h5>
            <p class="infoPrincipaleArticle">Matière : <span><?php echo $infoArticle['matiereProduit']; ?></span></p>
            <p class="infoPrincipaleArticle">Catégorie : <span><?php echo $infoArticle['nomCategorie']; ?></span></p>
            <p class="infoPrincipaleArticle">Marque : <span><?php echo $infoArticle['nomMarque']; ?></span></p>
            <?php
              if($infoArticle['stockProduit'] > 0){
                echo "<p class='infoPrincipaleArticle' style='color: green;'>En stock</p>";
              } else {
                echo "<p class='infoPrincipaleArticle' style='color: red;'>Non disponible</p>";
              }
            ?>
            <p style="font-size: 18px;" class="infoPrincipaleArticle">Prix : <span><?php echo $infoArticle['prixProduit'] . " €"; ?></span></p>
        </div>
        <div class="col s12">
          <label for="descriptionProduit">Description</label>
          <p name="descriptionProduit"><?php echo $infoArticle['descProduit']; ?></p>
        </div>
        <?php if($infoArticle['stockProduit'] > 0){ ?>
        <form action="index.php?page=detailArticle&idArticle=<?php echo $infoArticle['idProduit']; ?>&action=add" method="post">
        <div class="row">
          <div class="col s7"></div>
          <div class="input-field col s2">
            <input onkeyup="verif_nombre(this);" type="text" name="quantiteProduit" value="1" />
            <label for="quantiteProduit">Quantité</label>
          </div>
          <div class="col s3">
            <input type="hidden" name="nomProduit" value="<?php echo $infoArticle["nomProduit"]; ?>" />
            <input type="hidden" name="prixProduit" value="<?php echo $infoArticle["prixProduit"]; ?>" />
            <input style="margin-top: 15px;" type="submit" class="inputSubmit" name="submitAjoutPanier" value="Ajouter au panier">
          </div>
          </form>
        <?php } ?>
        </div>
      </div>
  </div>
</div>
