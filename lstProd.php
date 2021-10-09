<!--EL FILALI YASSINE 1IG-->
<?php
session_set_cookie_params(600);
session_start();
	include("donnees.php");
	include("myfunction.php");
	$bdd=connexionDB();
	if($bdd!=false){ 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Produits</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\styles.css">
</head>
<body>
	<header>
		<a href="lstPanier.php" title="Visualiser le panier">
			<img src="img/panier.png" class="image">
				<?php 
						if(isset($_SESSION['caddie'])){
							echo "<h4 class=\"alignement\"> (".count($_SESSION['caddie']).")</h6>";
						}
				?>
		</a>
	</header>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2>Notre gamme de produits</h2>
			Sélectionner une catégorie: 
			<span>
				<select name="type">
	  				<?php
	  					$tab_categorie=rechCategories(); // Recherche les catégories existante
		    				foreach ($tab_categorie as $key => $valeur) {
		     						 echo "<option value=$valeur>$valeur</option>";
		    				}
					?>
				</select>
			</span>

			<br><br>

			Ou entrez un libellé: <input type="text" name="libel" size="15">

			<br><br>

			<input type="submit" value="Rechercher">
	</form>

	<table>
		<tr>
			<th>Réf.</th>
			<th>Catégorie</th>
			<th>Libellé</th>
			<th>PU HTVA</th>
			<th>TVA</th>
			<th>Aperçu</th>
		</tr>

<?php	
	if(isset($_POST['type'], $_POST['libel'])){
		$categorie=$_POST['type'];
		$libelle=securisation($_POST['libel']);

		$tab_tva=chargerTauxTVA();	// Chargement des taux de TVA
		$tab_lib=rechProdLib($libelle);
		$tab_cat=rechProdCat($categorie);

		if(!empty($libelle) && $tab_lib!="FAUX") {	// Traitement à faire si l'utilisateur entre un produit existant dans la base de donnée
			foreach ($tab_lib as $cle){
				foreach ($tab_tva as $key => $value){	
					if($cle["codeTVA"]==$key)	// Recherche du taux de tva correspondant au produit
	     				$_SESSION['ttva']=$value;
	    		}
			echo "<tr>";
				echo "<td><a href=\"dtlProd.php?ref=".$cle['reference']. "\" title=\"Plus de détail sur l'objet : ".$cle['libelle']. " Cliquer!!!\">".$cle['reference']."</a></td>";
				echo "<td>". $cle['categorie'] ."</td>";
				echo "<td>". $cle['libelle'] ."</td>";
				
				$cle['prixunit']=number_format($cle['prixunit'], 2, ',', '.'); 

				echo "<td class=\"alignement\">". $cle['prixunit'] ." €</td>";
				echo "<td>".$_SESSION['ttva']."%</td>";
				echo "<td> <img src=\"". $cle['photo']. "\" width=\"60\" height=\"60\"></td>";
			echo "</tr>";
			}
		} else if(empty($libelle)){	// Traitement a faire si l'utilisateur ne complète pas le libellé du produit
			foreach ($tab_cat as $cle){
				foreach ($tab_tva as $key => $value){
					if($cle["codeTVA"]==$key)
	     				$_SESSION['ttva']=$value;
	    		}
			echo "<tr>";
				echo "<td> <a href=\"dtlProd.php?ref=".$cle['reference']. "\" title=\"Plus de détail sur l'objet : ".$cle['libelle']. " Cliquer!!!\">".$cle['reference']."</a></td>";
				echo "<td>". $cle['categorie'] ."</td>";
				echo "<td>". $cle['libelle'] ."</td>";
								
				$cle['prixunit']=number_format($cle['prixunit'], 2, ',', '.'); 

				echo "<td class=\"alignement\">". $cle['prixunit'] ." €</td>";
				echo "<td>".$_SESSION['ttva']."%</td>";
				echo "<td><img src=\"". $cle['photo']. "\" width=\"60\" height=\"60\"></td>";
			echo "</tr>";
			}
		} else $erreur_lib="Ce produit n'est pas en stock !"; // Si le produit n'existe pas, on affiche un message d'erreur
	}
}
?>
	</table>

	<br><br>

	<?php 
		//Affichage messages d'erreurs ou d'ajout
			if (isset($erreur_lib)) {
				echo "<div class=\"gest_erreur\">$erreur_lib</div>";
			}
				
			if (isset($_SESSION['ajout_ok'])){
				echo "<div class=\"gest_ajout\">". $_SESSION['ajout_ok']. "</div>";
				unset($_SESSION['ajout_ok']);
			}	
	?>
</body>
</html>