<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "gestion_de_formation"; 

$conn = new PDO('mysql:host=localhost;dbname=gestion_de_formation',"root","");


 //on appelle notre fichier de config $id = null; if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } if (null == $id) { header("location:index.php"); } else { //on lance la connection et la requete $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .

    $id = $_POST['id'];
    $sql = "SELECT * FROM utilisateur where id = $id ";
    $q = $conn->prepare($sql);
    $q->execute(array());
    $data = $q->fetch(PDO::FETCH_ASSOC);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Afficher un compte</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"/>
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style.css"/>
	</head>

	<body>
		<div class="wrapper" style="background-image: url('../images/bg-registration-form-2.jpg');">
			<div class="accueil">
				<a class="btn btn-primary" href="../administrateur_accueil.php" style="text-decoration: none;">Retourner</a>
			</div>
			<div class="inner">
				<form method="post" action="afficher.php">
					<h3><strong><em>Afficher les données du compte</em></strong></h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Nom</label>
							<input type="text" name="lastName" class="form-control" value="<?php echo $data['lastName']; ?>" disabled>
						</div>
						<div class="form-wrapper">
							<label for="">Prénom</label>
							<input type="text" name="firstName" class="form-control" value="<?php echo $data['firstName']; ?>" disabled>
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Profession</label>
						<input type="text" name="statut" class="form-control" value="<?php echo $data['profession']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">Téléphone</label>
						<input type="tele" name="telephone" class="form-control" value="<?php echo $data['telephone']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">Password</label>
						<input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">CIN</label>
						<input type="text" name="CIN" class="form-control" value="<?php echo $data['CIN']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">Date de naissance</label>
						<input type="date" name="birthdate" class="form-control" value="<?php echo $data['birthdate']; ?>" disabled>
					</div>
					<div class="form-wrapper">
						<label for="">Adresse</label>
						<input type="text" name="adress" class="form-control" value="<?php echo $data['adress']; ?>" required>
					</div>
					
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>