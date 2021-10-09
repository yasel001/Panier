<!--EL FILALI Yassine 1IG -->
<?php
session_set_cookie_params(600);
session_start();

$refer=$_GET['ref'];
		$prodexist=array_search($refer, array_column($_SESSION['caddie'], 'reference'));	// recherche l'indice d'ou se trouve l'element a supprimé dans le caddie

		unset($_SESSION['caddie'][$prodexist]);		// Suppression de l'article du panier
		sort($_SESSION['caddie']);			// On trie le caddie pour ne pas avoir d'indice vide

		header('Location: lstPanier.php');
?>