<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "gestion_de_formation"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT * FROM utilisateur WHERE status=0";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                    <span class="las la-users"></span>
                    Les responsables
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
        <main>
            <div class="recent-grid">
                <div class="card">
                    <div class="card-header">
                        <h2>Les responsables</h2>
                        <button class="btn btn-primary" onclick="window.location.href = '../Actions/ajouter.html';" title="Ajouter">Ajouter <i class="las la-plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Profession</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Date de naissance</th>
                                    <th>CIN</th>
                                    <th>Adresse</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                    if ($result->num_rows > 0) { 

                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                <tr>
                                    <td style="width: 20px;"><?php echo $row['lastName']; ?></td>
                                    <td><?php echo $row['firstName']; ?></td>
                                    <td><?php echo $row['profession']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['telephone']; ?></td>
                                    <td><?php echo $row['birthdate']; ?></td>
                                    <td><?php echo $row['CIN']; ?></td>
                                    <td><?php echo $row['adress']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td>
                                        <form method="post" action="../Actions/afficher.php">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-primary"title="Afficher"><i class="las la-eye"></i></button>
                                        </form> 
                                        <form method="post" action="../Actions/modifier.php">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-primary" title="Modifier"><i class="las la-pen"></i></button>
                                        </form>                         
                                        <form method="post" action="../admin/utilisateur_controller.php?action=supprimer">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger" title="Supprimer"><i class="las la-trash-alt"></i></button>
                                        </form>                      
                                    </td>
                                </tr>
<?php
            }
        }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>