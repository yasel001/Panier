<!--EL FILALI Yassine 1IG-->

<?php
session_set_cookie_params(600);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Suppression du panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\styles.css">
</head>
<body>
	<?php
		unset($_SESSION['caddie']);
		session_destroy();
		header('Location: lstProd.php');
	?>
</body>
</html>