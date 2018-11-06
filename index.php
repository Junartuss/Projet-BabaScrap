<?php
session_start();

include_once('views/inc/connexionDatabase.php');

if (!isset($_GET['page']) OR $_GET['page'] == 'home')
{
    include_once('controllers/home.php');
}

else
{
	if ($_GET['page'] == 'shop')
	{
			include_once('controllers/boutique.php');
	}
	if ($_GET['page'] == 'login')
	{
			include_once('controllers/login.php');
	}
  if ($_GET['page'] == 'contact')
  {
      include_once('controllers/contact.php');
  }
  if ($_GET['page'] == 'panier')
  {
      include_once('controllers/panier.php');
  }
  if ($_GET['page'] == 'compte')
  {
      include_once('controllers/compte.php');
  }
  if ($_GET['page'] == 'detailArticle')
  {
      include_once('controllers/detailArticle.php');
  }
  if ($_GET['page'] == 'commande')
  {
      include_once('controllers/commande.php');
  }
  if ($_GET['page'] == 'detailCommande')
  {
      include_once('controllers/detailCommande.php');
  }
}
?>
