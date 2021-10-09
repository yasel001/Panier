<?php
		// Securise les champs
		function securisation($champ) {
			$champ=trim($champ); //suppression des espaces 
			$champ=stripcslashes($champ); // suppression antishlash
			$champ=strip_tags($champ);	// suppression des balise php/html
			$champ=htmlspecialchars($champ); // faire en sorte que les caracteres html ne soient pas comprises par le navigateur
		return $champ;
		}
?>