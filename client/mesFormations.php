<?php
//connexion à la base de donnees 
try {
	$connection = new PDO('mysql:host=localhost;dbname=gestion_de_formation', "root", "");
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
include "../respformation/model/utilisateur.php";
session_start();
$u = $_SESSION['utilisateur']; 
$id = $u->Id;
//Requete SQL
$sql = "SELECT inscription.statut,inscription.session,formation.prix,inscription.formation,formation.Id,inscription.idFormation
FROM inscription 
JOIN formation ON inscription.idFormation = formation.Id 
JOIN utilisateur ON inscription.idClient = utilisateur.id 
WHERE utilisateur.id = $id ";
//Exécution de la requete
$q = $connection->prepare($sql);
$q->execute(array());
//Recuperer les donnees 
//$row = $q->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mes formations</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Lingua project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../respformation/styles/bootstrap4/bootstrap.min.css">
	<link href="../respformation/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../respformation/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../respformation/styles/main_styles1.css">
	<link rel="stylesheet" type="text/css" href="../respformation/styles/responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">

			<!-- Top Bar -->
			<div class="top_bar">
				<div class="top_bar_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
									<div class="top_bar_phone"><span class="top_bar_title">tel:</span>+212 300 303 026
									</div>
									<div class="top_bar_right ml-auto">


										<!-- Social -->
										<div class="top_bar_social">
											<span class="top_bar_title social_title">Nous suivre</span>
											<ul>
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												</li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												</li>
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
										<li class="active"><a href="../respformation/index1.html">Accueil</a></li>
										<li><a href="../courses.php">Cours</a></li>
										<li><a href="mesFormations.php">Mes formations</a></li>
									    <li><a href="../formateur/client.php">Mon planning</a></li>
										<li><a href="../respformation/view/instructors.html">Professeurs</a></li>
									</ul>
								</nav>
								<div class="header_content_right ml-auto text-right">
									<div class="header_search">
										<div class="search_form_container">
											<form action="#" id="search_form" class="search_form trans_400">
												<input type="search" class="header_search_input trans_400"
													placeholder="Type for Search" required="required">
												<div class="search_button">
													<i class="fa fa-search" aria-hidden="true"></i>
												</div>
											</form>
										</div>
									</div>

									<!-- Hamburger -->
									<div class="user" style="margin-left: 38px;"><a href="profil.php"><i
												class="fa fa-user"></i></a></div>
									<div class="user" style="margin-left: 10px;"><a
											href="../resformation/controller/utilisateur-controller.php?action=deconnexion"><i
												class="fa fa-power-off"></i></a></div>
									<div style="margin-left: 38px;">
										<?php
										// include "../respformation/model/utilisateur.php";
										// session_start();
										
										if (isset($_SESSION['utilisateur'])) {
											$utilisateur = $_SESSION['utilisateur'];
											echo "Bienvenue " . $utilisateur->getFirstName();
										}
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

		<!-- Menu -->

		<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
			<div class="menu_close_container">
				<div class="menu_close">
					<div></div>
					<div></div>
				</div>
			</div>
			<div class="search">
				<form action="#" class="header_search_form menu_mm">
					<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
					<button
						class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
						<i class="fa fa-search menu_mm" aria-hidden="true"></i>
					</button>
				</form>
			</div>
			<nav class="menu_nav">
				<ul class="menu_mm">
					<li class="menu_mm"><a href="profil.php">Profil</a></li>
					<li class="menu_mm"><a
							href="../respformation/controller/utilisateur-controller.php?action=deconnexion">Se
							déconnecter</a></li>
				</ul>
			</nav>
			<hr>
			<nav class="menu_nav">
				<ul class="menu_mm">
					<li class="menu_mm"><a href="../respformation/index.html">Accueil</a></li>
					<li class="menu_mm"><a href="../respformation/view/courses.html">Cours</a></li>
					<li class="menu_mm"><a href="../respformation/view/instructors.html">Professeurs</a></li>
					<li class="menu_mm"><a href="../respformation/view/blog.html">Blog</a></li>
					<li class="menu_mm"><a href="../respformation/view/contact.html">Contact</a></li>
				</ul>
			</nav>
			<div class="menu_extra">
				<div class="menu_phone"><span class="menu_title">tel:</span>+212 300 303 026</div>
				<div class="menu_social">
					<span class="menu_title">Nous suivre</span>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- MAIN -->

		<main class="container" style="margin-top: 200px ;">
		<h3>Mes formations</h3><br>
			<div>
				<table class="table">
					<thead>
						<tr>
							<th>Formation</th>
							<th>Prix (DH)</th>
							<th>Session</th>
							<th>
								<center>Inscription initiale</center>
							</th>
							<th>
								<center>Inscription définitive</center>
							</th>
							<th>
								<center>Payée?</center>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//Lire les donnees de chaque ligne
						while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
							$idf = $row['idFormation'];
							$req = "SELECT * FROM paiement WHERE idFormation = $idf and idClient=$id";
							$r = $connection->prepare($req);
							$r->execute(array());
							
							?>

							<tr>
								<td>
									<?php echo $row['formation']; ?>
								</td>
								<td>
									<?php echo $row['prix']; ?>
								</td>

								<td>
									<?php echo $row['session']; ?>

								</td>
								<td>
									<center>
										<?php
										if ($row['statut'] == 0)
											echo "En attente";
										if ($row['statut'] == 1)
											echo "Validée";
										if ($row['statut'] == 2)
											echo "Refusée";
										?>
									</center>
								</td>
								<td>
									<center>
										<?php
										if ($result = $r->fetch(PDO::FETCH_ASSOC)){
											if ($result['status'] == 1)
												echo "En attente";
											if ($result['status'] == 2)
												echo "Validée";
											if ($result['status'] == 0)
												echo "Refusée";
										}else{
											echo '---';
										}
										?>
									</center>
								</td>
								<td>
									<center>
									<?php 
									//inscription initiale validée
									if ($row['statut']==1) {
										//formulaire paiement non rempli
										if ($result==null) {?>
										<form method="post" action="formPaiement.php">
											<input type="hidden" name="idf" value='<?php echo $row['Id']; ?>'>
											<button type="submit" class="btn btn-success">Payer</button>
										</form>
										<?php } 
										//paiement validé
										else if ($result['status'] == 2) 
											echo 'Payée et inscit';
										//paiement refusé
										else if ($result['status'] == 0)
											echo 'non inscrit';
										//paiement en attente
										else if ($result['status'] == 1)
											echo 'Payée';	
									}
									//inscription initiale en attente
									else if ($row['statut'] == 1)
										echo 'Non payée';
									//inscription initiale refusée
									else
										echo 'Non inscrit';
									?>
									</center>
								</td>

							</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</main>
		<br>
		<br>

		<footer class="footer">
			<div class="footer_body">
				<div class="container">
					<div class="row">

						<!-- Newsletter -->
						<div class="col-lg-3 footer_col">
							<div class="newsletter_container d-flex flex-column align-items-start justify-content-end">
								<div class="footer_logo mb-auto"><a href="#">Unilang</a></div>
								<div class="footer_title">S'abonner</div>
								<form action="#" id="newsletter_form" class="newsletter_form">
									<input type="email" class="newsletter_input" placeholder="Email"
										required="required">
									<button class="newsletter_button"><i class="fa fa-long-arrow-right"
											aria-hidden="true"></i></button>
								</form>
							</div>
						</div>

						<!-- About -->
						<div class="col-lg-2 offset-lg-3 footer_col">
							<div>
								<div class="footer_title">About Us</div>
								<ul class="footer_list">
									<li><a href="#">Courses</a></li>
									<li><a href="#">Team</a></li>
									<li><a href="#">Brand Guidelines</a></li>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Advertise with us</a></li>
									<li><a href="#">Press</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>
						</div>

						<!-- Help & Support -->
						<div class="col-lg-2 footer_col">
							<div class="footer_title">Help & Support</div>
							<ul class="footer_list">
								<li><a href="#">Discussions</a></li>
								<li><a href="#">Troubleshooting</a></li>
								<li><a href="#">Duolingo FAQs</a></li>
								<li><a href="#">Schools FAQs</a></li>
								<li><a href="#">Duolingo English Test FAQs</a></li>
								<li><a href="#">Status</a></li>
							</ul>
						</div>

						<!-- Privacy -->
						<div class="col-lg-2 footer_col clearfix">
							<div>
								<div class="footer_title">Privacy & Terms</div>
								<ul class="footer_list">
									<li><a href="#">Community Guidelines</a></li>
									<li><a href="#">Terms</a></li>
									<li><a href="#">Brand Guidelines</a></li>
									<li><a href="#">Privacy</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col">
							<!--<div class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							<!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
						<div class="cr_right ml-md-auto">
							<div class="footer_phone"><span class="cr_title">tel:</span>+212 300 303 026</div>
							<div class="footer_social">
								<span class="cr_social_title">Nous suivre</span>
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
	</footer>
	</div>

	<script src="../respformation/js/jquery-3.2.1.min.js"></script>
	<script src="../respformation/styles/bootstrap4/popper.js"></script>
	<script src="../respformation/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="../respformation/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="../respformation/plugins/easing/easing.js"></script>
	<script src="../respformation/js/custom.js"></script>
</body>

</html>