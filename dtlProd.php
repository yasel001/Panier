 <!--EL FILALI YASSINE 1IG-->

 <?php
session_set_cookie_params(600);
session_start();
	include("donnees.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Détail Produit</title>
	<link rel="stylesheet" type="text/css" href="css\styles.css">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<a href="lstPanier.php" title="Visualiser le panier">
			<img src="img/panier.png" class="image">
				<?php 
					if (isset($_SESSION['caddie'])) {
						echo "<h4 class=\"alignement\"> (".count($_SESSION['caddie']).")</h6>";
					}
				?>
		</a>
	</header>

<?php
	if (isset($_GET["ref"])) {
		$ref=$_GET["ref"];
		$tab_detail=rechDetailProd($ref);

		if($tab_detail!="FAUX"){ // Si l'article existe
			foreach ($tab_detail as $record){ // Parcours du tableau pour afficher les detail du produit
				echo "<form method=\"POST\" action=\"addPanier.php\">";
					echo "<table>";
						echo "<tr>";
							echo "<th colspan=\"2\">Détail du produit - ".$record['reference']."</th>";
						echo "</tr>";

						echo "<tr>";
							echo "<td rowspan=\"3\"> <img src=\"".$record["photo"]. "\"></td>";
							echo "<td height=\"20\">Catégorie<br><br>".$record["categorie"]."</td>";
						echo "</tr>";

						echo "<tr><td height=\"10\"><b>".$record['prixunit']. "</b> €, (TVA ".$_SESSION['ttva']."%)</td></tr>";
						echo "<tr><td class=\"td_hors_contour\">".$record['description']."</td></tr>";


				if(isset($_SESSION['caddie'])){ 	// Gestion affichage de la quantité
					$prodexist=array_search($record['libelle'], array_column($_SESSION['caddie'], 'libelle'));
						if ($prodexist!==FALSE) {
							echo "<tr>";
								echo "<td class=\"alignage_centre_td\">";

								if (isset($_SESSION['erreur_qte'])){
									echo "<div class=\"gest_erreur\">". $_SESSION['erreur_qte'] ."</div>";
									unset($_SESSION['erreur_qte']);
								}

									echo "Quantité <input type=\"text\" value=\"".$_SESSION['caddie'][$prodexist]['qte']."\" size=\"2\" name=\"qte\">";
								echo "</td>";
								echo "<td><input type=\"submit\" value=\"Modifier panier\" name=\"ajout\"></td>";
							echo "</tr>";
						} else {
							echo "<tr>";
								echo "<td class=\"alignage_centre_td\">Quantité <input type=\"text\" value=\"0\" size=\"2\" name=\"qte\"></td>";
								echo "<td><input type=\"submit\" value=\"Ajouter au panier\" name=\"ajout\"></td>";
							echo "</tr>";
						}
				} else {
							echo "<tr>";
								echo "<td class=\"alignage_centre_td\">";
								
								if (isset($_SESSION['erreur_qte'])){	// Affichage erreur sur la quantite
									echo "<div class=\"gest_erreur\">". $_SESSION['erreur_qte'] ."</div>";
									unset($_SESSION['erreur_qte']);
								}
									echo "Quantité <input type=\"text\" value=\"0\" size=\"2\" name=\"qte\"></td>";
								echo "<td><input type=\"submit\" value=\"Ajouter au panier\" name=\"ajout\"></td>";
							echo "</tr>";
						}

						echo "<tr>";
							echo "<td class=\"alignage_centre_td\" colspan=\"2\"><a href=\"lstProd.php\" class=\"a_tobutton\" title=\"Rechercher un nouvel article\">Retour à la recherche</a></td>";
						echo "</tr>";
					echo "</table>";
				echo "</form>";

				$_SESSION['ref']=$record['reference'];
				$_SESSION['lib']=$record['libelle'];
				$_SESSION['pu']=$record['prixunit'];
			}
		} else echo "!!!! ERROR: Article inexistant !!!!";
	} else echo "!!!! ERROR404: Page non trouvée !!!!";
?>
</body>
</html>