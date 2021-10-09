<!--EL FILALI Yassine 1IG -->
<?php
session_set_cookie_params(600);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contenu du panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\styles.css">
</head>
<body>
	<h2>Voici le détail de votre panier du <?php echo date("d/m/Y") ?></h2>
		<table>
			<tr>
				<th>Réf.</th>
				<th>Libellé</th>
				<th>Qté</th>
				<th>PU HTVA</th>
				<th>TTVA</th>
				<th>MTVAC</th>
				<th></th>
			</tr>
		<tr>
		<?php
			if(isset($_SESSION['caddie'])){ // Si panier contient des articles
				$prix_tot=0;
					foreach ($_SESSION['caddie'] as $key => $value) {
							// Calcul prix et formatage
								$_SESSION['caddie'][$key]['pu']=number_format(intval($_SESSION['caddie'][$key]['pu']), 2, ',', '.');
								$mtvac=(intval($_SESSION['caddie'][$key]['pu'])*(intval($_SESSION['caddie'][$key]['qte'])*(1+(intval($_SESSION['caddie'][$key]['ttva'])/100))));
								$mtvac=number_format(floatval($mtvac), 2, ',', '.');
				        		$prix_tot+=$_SESSION['caddie'][$key]['qte']*(intval($_SESSION['caddie'][$key]['pu']))*(1+(intval($_SESSION['caddie'][$key]['ttva'])/100)); 

								echo "<tr class=\"tr_td_right\">";
									echo "<td>". $_SESSION['caddie'][$key]['reference'] ."</td>";
									echo "<td>". $_SESSION['caddie'][$key]['libelle'] ."</td>";
									echo "<td>". $_SESSION['caddie'][$key]['qte'] ."</td>";
									echo "<td>". $_SESSION['caddie'][$key]['pu'] ." €</td>";
									echo "<td>". $_SESSION['caddie'][$key]['ttva'] ." %</td>";
									echo "<td>$mtvac €</td>";
									echo "<td><a href=\"delOneArticle.php?ref=".$_SESSION['caddie'][$key]['reference']. "\"><img src=\"img/suppression.png\" class=\"image_taille\"> </a></td>";
								echo "</tr>";
					}
								$prix_tot=number_format(floatval($prix_tot), 2, ',', '.');
								echo "<tr>";
									echo "<td colspan=\"5\" class=\"tr_td_bold\">TOTAL A PAYER</td>";
									echo "<td colspan=\"2\" class=\"tr_td_right\">$prix_tot €</td>";
								echo "</tr>";
				}
								echo "<tr>";
									echo "<td colspan=\"3\"><a href=\"lstProd.php\" class=\"a_tobutton\">Retour a la recherche</a></td>";
									echo "<td colspan=\"4\"><a href=\"supPanier.php\" class=\"a_tobutton\">Supprimer panier</a></td>";
								echo "</tr>";
			?>
		</tr>
	</table>

	<br><br><br><br>

		<footer>
			<img src="img/livraison.png" class="image" alt="We are the best">
		</footer>
</body>
</html>