<?php

try {
	$connection = new PDO('mysql:host=localhost;dbname=gestion_de_formation', "root", "");
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
include "../respformation/model/utilisateur.php";
session_start();
$u=$_SESSION['utilisateur'];
$id = $u->Id;
$idFormation = $_POST['idf'];
$sql = "SELECT formation,prix,idClient,idFormation,inscription.session,utilisateur.firstName,utilisateur.lastName FROM inscription JOIN formation ON inscription.idFormation = formation.Id JOIN utilisateur ON inscription.idClient = utilisateur.id WHERE idClient = $id AND formation.Id=$idFormation";

$q = $connection->prepare($sql);
$q->execute(array());
$row = $q->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Formulaire de paiement</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Lingua project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../respformation/styles/bootstrap4/bootstrap.min.css">
	<link href="../respformation/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../respformation/styles/login1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script>
		$(document).ready(function () {
			$("#mySelect").change(function () {
				if (this.value == "CreditCard") {
					$("#newField").append("<input type='text' id='otherField' value='0' name='PrixPaye' placeholder='Enter other value'/>");
				}
				else {
					$("#otherField").remove();
				}
			});
		});
	</script> -->
</head>

<body>

	<header class="header">

		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<div class="top_bar_phone"><span class="top_bar_title">tel:</span>+212 300 303 026</div>
								<div class="top_bar_right ml-auto">


									<!-- Social -->
									<div class="top_bar_social">
										<span class="top_bar_title social_title">Nous suivre</span>
										<ul>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container mr-auto">
								<a href="#">
									<div class="logo_text">Unilang</div>
								</a>
							</div>
							<nav class="main_nav_contaner">
								<ul class="main_nav">
									<li class="active"><a href="index1.html">Accueil</a></li>
									<li><a href="../courses.php">Cours</a></li>
									<li><a href="instructors.html">Professeurs</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
							<div class="header_content_right ml-auto text-right">
								<!-- Hamburger -->
								<div class="user" style="margin-left: 38px;"><a href="profil.php"><i
											class="fa fa-user"></i></a></div>
								<div class="user" style="margin-left: 10px;"><a
										href="../respformation/controller/utilisateur-controller.php?action=deconnexion"><i
											class="fa fa-power-off"></i></a></div>
								<div style="margin-left: 100px;">
								<?php 
									
									
									if(isset($_SESSION['utilisateur'])){
										$utilisateur=$_SESSION['utilisateur'];
										echo "Bienvenue ".$utilisateur->getFirstName();}
									?>
								</div>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	<div class="register_form_container " style="margin-top: 100px;">
		<div class="register_form_title my-5">Formulaire de paiement</div>
		<form method="post" action="insertPaiement.php" id="register_form" class="register_form">
			<div>
				<!-- Infos formation -->
				<div class="register_col">
					<input type="hidden" class="form_input" name="idFormation" value="<?php echo $idFormation; ?>" required="required">
				</div>
				<div class="register_col">
					<input type="hidden" class="form_input" name="idClient" value="<?php echo $id; ?>" required="required">
				</div>
				<div class="register_col">
					<input type="text" class="form_input" name="nomFormation" value="<?php echo $row['formation'] ?>" required="required">
				</div>
				<div class="register_col">
					<input type="text" class="form_input" name="prixFormation" value="<?php echo $row['prix'] ?>" required="required">
				</div>
				<div class="register_col">
					<input type="text" class="form_input" name="session" value="<?php echo $row['session'] ?>" required="required">
				</div>
				<!-- Infos Clients -->
				<div class="register_col">
					<input type="text" class="form_input" name="lastName" value="<?php echo $row['lastName'] ?>" placeholder="Nom" required="required">
				</div>
				<div class="register_col">
					<input type="text" class="form_input" name="firstName" value="<?php echo $row['firstName'] ?>" placeholder="Prénom" required>
				</div>
				
				<!-- Moyens de Paiement -->
				<!-- <div class="register_col"> -->
					<select id="mySelect" name="modePaiement" class="register_col" >
						<option value="CreditCard">Carte de Crédit</option>
						<option value="Especes">Espèces</option>
					</select>
				<!-- </div> -->
				<div class="register_col">
					<input type="text" class="form_input" name="numCC" placeholder="N° de carte">
				</div>
				<div class="register_col">
					<input type="text" class="form_input" name="prixPaye" placeholder="Prix Payé">
				</div>
				<div class="register_col">
					<input type="password" class="form_input" name="codeCC" placeholder="code de carte" >
				</div>
				<!-- <div class="register_col">
					<input type="date" class="form_input" name="datePaiement" placeholder="date de paiement" value="<?php echo date("d-m-y");?>" required>
				</div> -->
				<div class="register_col">
					<!-- Statut = 0 refusé 1 en attente de validation  2 validé -->
					<input type="hidden" class="form_input" name="status" placeholder="Adresse" value="1">
				</div>
				<div>
					<button type="submit" style="width: 180px;" class="form_button trans_200">Confirmer</button>
				</div>

			</div>
		</form>
	</div>


	<script src="../respformation/js/jquery-3.2.1.min.js"></script>
	<script src="../respformation/styles/bootstrap4/popper.js"></script>
	<script src="../respformation/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="../respformation/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="../respformation/plugins/easing/easing.js"></script>
	<script src="../respformation/js/custom.js"></script>
</body>

</html>