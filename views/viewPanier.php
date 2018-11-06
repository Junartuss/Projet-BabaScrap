<?php  require 'inc/header.php'; ?>
<div class="container customContainer">
  <div class="section comptePage">
    <h5>Mon panier</h5>
    <?php if(!empty($_SESSION['panier'])){ ?>
    <table id="myTable">
       <thead>
         <tr>
             <th>Article</th>
             <th>Quantité(s)</th>
             <th>Prix (TTC)</th>
             <th>Prix Total (TTC)</th>
             <th>Actions</th>
         </tr>
       </thead>
       <tbody id="tableauPanier">
         <?php
          $total = 0;
          foreach($_SESSION["panier"] as $keys => $values){
          ?>
           <tr>
             <form name="formPanier" action="index.php?page=panier&action=refresh&idArticle=<?php echo $values["item_id"]; ?>" method="post">
               <td><?php echo $values['item_name']; ?></td>
               <td><input onkeyup="verif_nombre(this);" name="quantiteArticle" style="width: 20%;" type="text" name="points" value="<?php echo $values['item_quantity']; ?>"></td>
               <td id="prixUniteArticle"><?php echo $values['item_price'] ?> €</td>
               <td><b><?php echo $values["item_quantity"] * $values["item_price"]; ?> €</b></td>
               <td>
                 <input type="submit" class="inputPanierRefresh" name="refreshPanierSubmit" value="Rafraichir">
                <a class="inputPanierDelete" href="index.php?page=panier&action=delete&idArticle=<?php echo $values["item_id"]; ?>">Supprimer</a></td>
             </form>
           </tr>
           <?php
           $total = $total + ($values["item_quantity"] * $values["item_price"]);
          }
           ?>
       </tbody>
     </table><br />
     <div class="row">
       <div class="col s6"></div>
       <div style="text-align:right;" class="col s4">
         <h6 class="h6PrixPanier">Prix Total Panier (TTC) : <?php echo $total; ?> €</h6>
       </div>
       <div style="text-align:right;" class="col s2">
         <form action="index.php?page=commande" method="post">
           <?php if(isset($_SESSION['id'])) { ?>
             <input type="submit" class="inputSubmit" name="inputValidatePanier" value="Valider le panier">
          <?php } else { ?>
              <a class="inputSubmit" href="index.php?page=login">Se connecter</a>
          <?php } ?>
         </form>
       </div>
     </div>
   <?php } else { ?>
     <center><h4>Votre panier est vide</h4></center>
   <?php } ?>
  </div>
</div>
