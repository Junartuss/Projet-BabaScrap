<?php
	function get_produits(){
		global $bdd;

		$req = $bdd->prepare("SELECT * FROM produit");
		$req->execute();
		$produits = $req->fetchAll();

		return $produits;
	}

	function get_actualites(){
		global $bdd;

		$req = $bdd->prepare("SELECT * FROM actualite ORDER BY dateActualite DESC, heureActualite DESC LIMIT 5");
		$req->execute();
		$actualites = $req->fetchAll();

		return $actualites;
	}
?>
