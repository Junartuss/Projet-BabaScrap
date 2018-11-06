<?php require 'inc/header.php'; ?>

<div class="container customContainer">
	<div class="section">
		<h1 class="accueil-titre">Les promotions actuelles</h1>

		<div class="carousel">
			<section>
				<?php
					foreach ($lesProduits as $unProduit) {
						$varIdProduit = $unProduit['idProduit'];
						$varNomProduit = $unProduit['nomProduit'];
						$varPhotoProduit = $unProduit['photoProduit'];
						$varTauxPromotion = $unProduit['tauxPromotion'];
						$varPrixProduit = $unProduit['prixProduit'];

						if ($varTauxPromotion > 0) {
							$varPrixPromotion1 = ($varPrixProduit * $varTauxPromotion) / 100;
							$varPrixPromotion2 = $varPrixProduit - $varPrixPromotion1;

							echo "
								<article>
									<a class='carousel-item' href='index.php?page=detailArticle&idArticle=$varIdProduit'>
										<div class='accueil-slider-onglet'>$varNomProduit</div>
										<img src='views/img/products/$varPhotoProduit' alt='$varNomProduit'>
										<div class='accueil-slider-onglet'><del>$varPrixProduit €</del> - $varPrixPromotion2 €</div>
									</a>
								</article>
							";
						}
				 	}
				?>
			</section>

			<script>
				$(document).ready(function(){
					$('.carousel').carousel();
				});
			</script>
		</div>

		<div>
			<section>
				<h1 class="accueil-titre">Les actualités</h1>

				<?php
					foreach ($lesActualites as $uneActualite) {
						$varTitreActualite = $uneActualite['titreActualite'];
						$varContenuActualite = $uneActualite['contenuActualite'];

						$varDateActualite = $uneActualite['dateActualite'];
						$varDateActualiteFR = date("d-m-Y", strtotime($varDateActualite));

						$varHeureMinuteActualite = $uneActualite['heureActualite'];
						$varHeureActualite = date("H", strtotime($varHeureMinuteActualite));
						$varMinuteActualite = date("i", strtotime($varHeureMinuteActualite));

						echo "
							<article>
								<h2 class='accueil-actualite-titre'>$varTitreActualite</h2>
								<p class='accueil-actualite-contenu'>$varContenuActualite</p>
								<p class='accueil-actualite-footer'>Publié le $varDateActualiteFR à $varHeureActualite"."h"."$varMinuteActualite.</p>
							</article>
						";
					}
				?>
			</section>
		</div>
	</div>
</div>
