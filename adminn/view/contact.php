<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "gestion_de_formation"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT * FROM utilisateur WHERE status=1";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/styleAdmin.css ">
    <title>Administrateur accueil</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="lab la-accusoft"> UniLang</span>
            </h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="../administrateur_accueil.php"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
                <li><a href="personnels.php"><span class="las la-users"></span><span>Les responsables</span></a></li>
                <li><a href="clients.php"><span class="las la-graduation-cap"></span><span>Les apprenants</span></a></li>
                <li><a href="contact.php"><span class="las la-envelope-square"></span><span>Les messages</span></a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-envelope-square"></span>
                    La boîtes des messages
                </label>
            </h2>
            <div class="user-wrapper">
                <img src="../images/admin.png" alt="Administrateur profil">
                <div>
                    <h4>Bienvenue</h4>
                    <small>Khadija Chbib</small>
                </div>
            </div>
        </header>
        
    </div>
</body>
</html>