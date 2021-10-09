<!--EL FILALI Yassine 1IG -->
<?php
session_set_cookie_params(600);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout au panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\styles.css">
</head>
<body>
	<?php
		$flag=0;
		if (isset($_POST['ajout']) && !empty($_POST['qte'])) {
			$qte=$_POST['qte'];
				if (is_numeric($qte)) {	// Verifier que la quantité est au format numerique
					if($qte>0 && $qte!=0) { // Verifier que la quantité est supérieur a zéro 
						$panier=array('reference'=>$_SESSION['ref'], 'libelle'=>$_SESSION['lib'], 'qte'=>$qte, 'pu'=>$_SESSION['pu'], 'ttva'=>$_SESSION['ttva']);	// tableau qui va contenir la ligne a ajouter dans le panier

						if(!isset($_SESSION['caddie'])) {
							$_SESSION['caddie']=array();		// Declaration de la SESSION du caddie
						}

						$prodexist=array_search($panier['reference'], array_column($_SESSION['caddie'], 'reference'));	// Verifie si l'article a jouter existe deja

						if($prodexist===FALSE) {	// Si article a ajouter n'existe pas
							array_push($_SESSION['caddie'], $panier);
							$_SESSION['ajout_ok']="L'article ". $_SESSION['lib'] ." a été ajouté a votre panier";
						}
						else {		// Si article existe dans le penier
							$_SESSION['caddie'][$prodexist]['qte']=$qte;
  							$_SESSION['ajout_ok']="La quantité de ". $_SESSION['lib'] ." a été modifié";
						}
					} else { $_SESSION['erreur_qte']="La quantité entré n'est pas correct"; $flag=1; }
				} else { $_SESSION['erreur_qte']="Veuillez entré un caractère numérique !"; $flag=1; }
		} else { $_SESSION['erreur_qte']="La quantité n'a pas été indiquée !"; $flag=1; }
		
		if($flag==1){
			$link_redir="http://localhost/iteration5_ELFILALI/dtlProd.php?ref=". $_SESSION['ref'];
			header("Location: $link_redir"); 
		} else {
			header('Location: lstProd.php'); 
		}
	?>
</body>
</html>