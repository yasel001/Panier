<!--EL FILALI YASSINE 1IG-->

<?php 	 
	// connexion à la db (à appeler une fois en début de programme)
	function connexionDB() {
		if($connexion = new PDO("mysql:host=localhost;dbname=coophelha", "root", "")) {
			$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connexion;							
		}
	}

	// retourne un tableau indicé de toutes les catégories (sans doublon)
	function rechCategories(){
		$cnx = connexionDB();
		// la clause "distinct" supprime les doublons de catégories dans le résultat obtenu 
		$requete = $cnx->prepare("SELECT DISTINCT categorie FROM produit");
		$requete->execute();
		$tbResult = $requete->fetchAll();
		
		foreach($tbResult as $record){
			$tbCat[] = $record[0];
		}

		return $tbCat;	
	} 

	// Retourne un tableau contenant les diffrents taux de tva
	function chargerTauxTVA(){
		$cnx = connexionDB();

		$requete = $cnx->prepare("SELECT * FROM tva");
		$requete->execute();
		$tbResult = $requete->fetchAll();

		$i=1;
		foreach($tbResult as $record){
			$tbTva[$i] = $record[1];
		$i++;
		}

		return $tbTva;	
	}

	// Retourne un tableau contenant les differents produits d'une catégorie
	function rechProdCat ($categorie){
		$cnx = connexionDB();

		$requete = $cnx->prepare('SELECT reference, categorie, libelle, prixunit, photo, codeTVA FROM produit WHERE categorie=\''.$categorie.'\'');
		$requete->execute();
		$tbResult = $requete->fetchAll();

		$i=1;
		foreach($tbResult as $record){
			$tbCategorie[$i] = $record;
		$i++;
		}

		return $tbCategorie;	
	}

	// Retourne un tableau contenant le produit qui a le libellé mentionné
	function rechProdLib ($libelle){
		$cnx = connexionDB();

		$requete = $cnx->prepare('SELECT reference, categorie, libelle, prixunit, photo, codeTVA FROM produit WHERE libelle=\''.$libelle.'\'');
		$requete->execute();
		$tbResult = $requete->fetchAll();

		if (count($tbResult)!=0) {
			$i=1;
			foreach($tbResult as $record){
				$tbLibel[$i] = $record;
			$i++;			
			}
			return $tbLibel;
		} else return "FAUX";
	}

	// Retourne un tableau contenant les détails du produit
	function rechDetailProd ($ref){
		$cnx = connexionDB();

		$requete = $cnx->prepare('SELECT * FROM produit WHERE reference=\''.$ref.'\'');
		$requete->execute();
		$tbResult = $requete->fetchAll();


		if (count($tbResult)!=0) {
			$i=1;
			foreach($tbResult as $record){
				$tbDetail[$i] = $record;
			$i++;
			}
			return $tbDetail;	
		} else return "FAUX";
	}
?>