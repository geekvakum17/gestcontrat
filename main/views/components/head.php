<?php
if (isset($_SESSION["nom"]) && !empty($_SESSION["nom"])) {
	$User_pseudo = $_SESSION["nom"];
}

if (isset($_SESSION['code_ent']) && !empty($_SESSION['code_ent'])) {
	$code_ent = $_SESSION['code_ent'];
}

if ((isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 1)) {
	$message = "<span> le email ou le mot de passe est incorrect ! </span>";
} else {
	$message = " ";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>AEJ-GESTION DES CONTRATS</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo $url ?>../../public/assets/images/aej.png" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo $url ?>../../public/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $url ?>../../public/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $url ?>../../public/assets/css/plugins/dataTables.bootstrap4.min.css">

</head>
