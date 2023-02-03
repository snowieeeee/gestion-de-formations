

<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "gestion_de_formation"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un compte</title>
    <link rel="stylesheet" type="text/css" href="../css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body class="form-v9">
    <div class="page-content">
        <div class="form-v9-content">
            <h2>Supprimer un compte</h2>
            <h4>Vous êtes sûr de supprimer ?</h4>
            <form method="post" action="../admin/utilisateur_controller.php?action=supprimer">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>Vous êtes sûr vous voulez supprimer ?
                <br />
                <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="../dashboard_personnels.php">No</a>
                </div>
            </form>
        </div>
    </div> 
    <script>
    </script>
</body>
</html>