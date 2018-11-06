<?php  require 'inc/header.php'; ?>

<div class="container customContainer">
  <div class="section">
    <!--   Icon Section   -->
    <div class="row">
      <div class="col s3 listeCategorieBoutique">
          <ul>
            <li><a href="index.php?page=shop&numpage=1">Tous nos produits</a></li>
            <?php foreach($listeCategorie as $listeCateg) { ?>
            <li><a href="index.php?page=shop&categ=<?php echo $listeCateg['idCategorie']; ?>"><?php echo $listeCateg['nomCategorie']; ?></a></li>
            <?php } ?>
          </ul>
      </div>
      <div class="col s9">
        <div class="row">
          <form action="search.php" method="get">
            <div class="input-field col s6">
              <i class="material-icons prefix">search</i>
              <input id="icon_prefix" type="text" name="search" class="validate">
              <label for="icon_prefix">Recherche</label>
            </div>
            <div class="input-field col s3">
              <input type="submit" class="inputSubmit" value="Rechercher">
            </div>
          </form>
        </div>
        <div class="row">
          <?php if(count($listeProductPerPage) > 0) { ?>
            <?php foreach($listeProductPerPage as $listeProduit) { ?>
            <a class="urlCard" href="<?php echo "index.php?page=detailArticle&idArticle=".$listeProduit['idProduit']; ?>" >
            <div class="col s6 test">
              <div class="card">
                <div class="card-image">
                  <img src="views/img/products/<?php echo $listeProduit['photoProduit']; ?>">
                  <span class="card-title"><?php echo $listeProduit['nomProduit']; ?></span>

                </div>

                <div class="center card-content">
                  <?php
                    if($listeProduit['stockProduit'] > 0){
                      echo "<p class='infoPrincipaleArticle' style='color: green;'>En stock</p>";
                    } else {
                      echo "<p class='infoPrincipaleArticle' style='color: red;'>Non disponible</p>";
                    }
                  ?>
                  <h6>Prix : <?php echo $listeProduit['prixProduit'] . " €"; ?></h6>
                  <form action="index.php?page=shop&action=add&idProduit=<?php echo $listeProduit['idProduit']; ?>" method="post">
                      <input type="hidden" name="nomProduit" value="<?php echo $listeProduit["nomProduit"]; ?>" />
                      <input type="hidden" name="prixProduit" value="<?php echo $listeProduit["prixProduit"]; ?>" />
                  </form>
                </div>
              </div></a>
            </div>
          <?php } ?>
        <?php } else { ?>
          <center><h5>Aucun produit</h5></center>
        <?php } ?>
      </div>
      <?php if(isset($_GET['numpage'])) { ?>
        <div class="row">
          <br /><center>
            <ul class="pagination">
            <?php
              $i = 1;
              while(ceil(count($listeProduct) / $nombreOeuvre) >= $i){
                echo "<li><a href='index.php?page=shop&numpage=$i'>$i</a></li>";
                $i++;
              }
            ?>
          </ul>
        </center>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>
