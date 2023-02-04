<?php
include('respFormation/model/utilisateur.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Formations</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Lingua project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/courses.css">
	<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
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

										<!-- Language -->
										<div class="top_bar_lang">
											<!--<span class="top_bar_title">site language:</span>
											<ul class="lang_list">
												<li class="hassubs">
													<a href="#">English<i class="fa fa-angle-down"
															aria-hidden="true"></i></a>
													<ul>
														<li><a href="#">Ukrainian</a></li>
														<li><a href="#">Japanese</a></li>
														<li><a href="#">Lithuanian</a></li>
														<li><a href="#">Swedish</a></li>
														<li><a href="#">Italian</a></li>
													</ul>
												</li>
											</ul>-->
										</div>

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
										<li><a href="respFormation/index.html">Accueil</a></li>
										<li class="active"><a href="coursesInternaute.php">Cours</a></li>
										<li><a href="respFormation/view/instructors.html">Professeurs</a></li>
										<li><a href="contact.html">Contact</a></li>
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

									<!-- Hamburger -->

								<div class="user"> <a href="respFormation/view/login.html">Login</a></div>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
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
					<li class="menu_mm"><a href="index.html">Accueil</a></li>
					<li class="menu_mm"><a href="courses.php">Cours</a></li>
					<li class="menu_mm"><a href="instructors.html">Formateurs
						
					</a></li>
					<li class="menu_mm"><a href="contact.html">Contact</a></li>
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

		<!-- Home -->

		<div class="home">
			<div class="breadcrumbs_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
								<li><a href="index.html">accueil</a></li>
								<li><a href="courses.html">formations</a></li>
								<li>français</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Language -->

		<div class="language">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="language_title">Apprenez les langues facilement</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="language_slider_container">

							<!-- Language Slider -->

							<div class="owl-carousel owl-theme language_slider">

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Ukrainian.svg" alt=""></div>
										<div class="lang_name">Ukrainian</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Japanese.svg" alt=""></div>
										<div class="lang_name">Japanese</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Lithuanian.svg" alt=""></div>
										<div class="lang_name">Lithuanian</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Swedish.svg" alt=""></div>
										<div class="lang_name">Swedish</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/English.svg" alt=""></div>
										<div class="lang_name">English</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Italian.svg" alt=""></div>
										<div class="lang_name">Italian</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/Chinese.svg" alt=""></div>
										<div class="lang_name">Chinese</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/French.svg" alt=""></div>
										<div class="lang_name">French</div>
									</a>
								</div>

								<!-- Flag -->
								<div class="owl-item language_item">
									<a href="#">
										<div class="flag"><img src="images/German.svg" alt=""></div>
										<div class="lang_name">German</div>
									</a>
								</div>

							</div>

							<div class="lang_nav lang_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							<div class="lang_nav lang_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Courses -->

		<div class="courses">
			<div class="container">
				<div class="row courses_row">
					<!--fetching products-->
					<?php

				$servername="localhost";
				$username="root";
				$password="";
				$bdd="gestion_de_formation";

				//Connexion à la base de données 

				$con=mysqli_connect($servername,$username,$password,$bdd);
				//afficher le message d'erreur au cas d'échéance à la connexion avec la base de données .
				

				$select_query="SELECT * from formation ";
				//$result = $mysqli->query("SELECT *FROM test ORDER BY id ASC");
				$result_query = mysqli_query($con , $select_query);
				// while loop instruction in order to display all rows using the function mysqli_fetch_assoc

                    while ($row = mysqli_fetch_assoc($result_query)) {
	                    $formation_id = $row['Id']; //`Id` int(11) NOT NULL,
                    	$titre_formation = $row['titre']; //`titre` text NOT NULL,
                    	$prix_formation = $row['prix']; //`prix` double NOT NULL,
                    	$objectif_formation = $row['objectif']; // text NOT NULL,
                    	$plan_formation = $row['plan']; //`plan` text NOT NULL,
                    	$projet = $row['projet']; //`projet` text NOT NULL,
                    	$evaluation = $row['evaluation']; //`evaluation` text NOT NULL,
                    	//`statut` tinyint(1) NOT NULL DEFAULT 1
                    	$session = $row['session'];
	                    $image = $row['image'];
	                    $statut = $row['statut'];

                    ?>

					<div class='col-lg-4 course_col'>
						<div class='course'>
							<div class='course_image'><img src='images/course_4.jpg' alt=''></div>
							<div class='course_body'>

								<div class='course_title'><a href='course.html'>
										<?php echo $titre_formation; ?>
									</a></div>
								<div class='course_info'>
									<ul>
										<li><a href='instructors.html'>Prix de formation :</a></li>
										<li><a href='#'>
												<?php echo $prix_formation; ?>
											</a></li>
									</ul>
								</div>
								<div class='course_text'>
									<p>
										<?php echo $objectif_formation; ?>
									</p>
								</div>
							</div>

							<div class='course_footer d-flex flex-row align-items-center justify-content-start'>
								<div class='session'><i aria-hidden='true'></i>
								<span>
										<form method="POST" action="insertion.php" >
										
											<label for='session'>Session:</label>

											<select name='session' id='session'>
												<?php
													$T = explode("+", $session);
													for ($i = 0; $i < count($T); $i++) { ?>
												<option value='<?php echo $T[$i]; ?>'>
													<?php echo $T[$i]; ?>
												</option>

												<?php } ?>
											</select>
							
					

											<div class='course_rating ml-auto'><i aria-hidden='true'></i><span></span>
											</div>
											<div class='course_mark course_free trans_200'>
												<!--<form method="POST" action="insertion.php">-->
												<!-- <input type="hidden"  name="nomClient" value="<?=$_SESSION['utilisateur']->getFirstName();?>"/>
												<input type="hidden"  name="titreFormation" value="<?=$row['titre'];?>"/>
												<input type="hidden"  name="idFormation" value="<?=$row['id'];?>"/> -->
												<button type='submit'name='envoyer'><a  class="text-white"href="respFormation/view/login.html">S'inscrire</a></button></div>
												<!--</form>-->
										</form>
						
									</span>
								</div>
							</div>
						</div>

					</div>
					<?php }?>




						<!-- Course -->

						<!-- Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_5.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">Spanish</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span></span>Session :</div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark course_free trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				 Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_6.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">English</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				< Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_7.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">English</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark course_free trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_8.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">Spanish</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark course_free trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				 Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_9.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">English</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				 Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_10.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">English</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark course_free trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				 Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_11.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">Spanish</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span></span>Session :</div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark course_free trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

				 Course -->
						<!--<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_12.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">Vocabulary</a></div>
							<div class="course_info">
								<ul>
									<li><a href="instructors.html">Sarah Parker</a></li>
									<li><a href="#">English</a></li>
								</ul>
							</div>
							<div class="course_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla.</p>
							</div>
						</div>
						<div class="course_footer d-flex flex-row align-items-center justify-content-start">
							<div class="session"><i  aria-hidden="true"></i><span>Session :</span></div>
							<div class="course_rating ml-auto"><i  aria-hidden="true"></i><span></span></div>
							<div class="course_mark trans_200"><a href="#">S'inscrire</a></div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col">
					<div class="load_more_button"><a href="#">load more</a></div>
				</div>
			</div>
		</div>
	</div>

	 <!-Footer -->

						<footer class="footer" style="width:100%;">
							<div class="footer_body">
								<div class="container">
									<div class="row">

										<!-- Newsletter -->
										<div class="col-lg-3 footer_col">
											<div
												class="newsletter_container d-flex flex-column align-items-start justify-content-end">
												<div class="footer_logo mb-auto"><a href="#">UniLang</a></div>
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
												<div class="footer_title">A propos de nous</div>
												<ul class="footer_list">
													<li><a href="#">Formations</a></li>
													<li><a href="#">Team</a></li>
													<li><a href="#">Guidelines</a></li>
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
											<div
												class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
												<div class="cr">
													<!--<script>document.write(new Date().getFullYear());</script> All
													rights reserved | Made with <i class="fa fa-heart-o"
														aria-hidden="true"></i> by <a href="https://colorlib.com"
														target="_blank">Colorlib</a> &amp; distributed by <a
														href="https://themewagon.com" target="_blank">ThemeWagon</a>
													Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
												</div>
												<div class="cr_right ml-md-auto">
													<div class="footer_phone"><span class="cr_title">tel:</span>+212
														300 303 026</div>
													<div class="footer_social">
														<span class="cr_social_title">follow us</span>
														<ul>
															<li><a href="#"><i class="fa fa-facebook"
																		aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-instagram"
																		aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"
																		aria-hidden="true"></i></a></li>
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

					<script src="js/jquery-3.2.1.min.js"></script>
					<script src="styles/bootstrap4/popper.js"></script>
					<script src="styles/bootstrap4/bootstrap.min.js"></script>
					<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
					<script src="plugins/easing/easing.js"></script>
					<script src="js/courses.js"></script>
</body>

</html>