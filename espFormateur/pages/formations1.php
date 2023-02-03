<?php

  require_once("connexiondb.php");
  //$pdo=new PDO("mysql:host=localhost ; dbname=gestion_de_formation" , "root" ,"");
  $requete="SELECT titre, objectif ,plan ,projet
  FROM formation JOIN affectation ON formation.Id = affectation.Idformation " ;
  $mysqli = new mysqli("localhost", "root", "", "gestion_de_formation");

  $resultatF=$mysqli->query($requete);

  //$resultatF=$pdo->query($requete);
  $nomf = isset($_GET['nomf'])?$_GET['nomf']:"";
  $requetef="select titre FROM formation where titre like '%$nomf%'";
  $resultatf=$mysqli->query($requetef);

?>

<?php 
                        include "../../respformation/model/utilisateur.php";
                        session_start();
                                                
                        if(isset($_SESSION['utilisateur'])){
                        $utilisateur=$_SESSION['utilisateur'];
                        $name = $utilisateur->getFirstName()." ".$utilisateur->getLastName();
                        echo "Bienvenue ".$name;}
                        ?>
                </div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <title>Espace Formateur</title>
</head>
<body>
    <?php
        include ("menu.php");
    ?>
    <div class="container">
    <div class="panel panel-success margetop">
        <div class="panel-heading" >Filtrer votre recherche en saisissant un mot clé ...</div>
        <div class="panel-body">
            <form method="get" action="formations.php" class="form-inline">
                <div class="form-group">
                <input type="text" name="nomf" placeholder="taper un mot clé" class="form-control" value="<?php echo $nomf?>"/>
                </div>
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>Rechercher
                </button>
            </form>
        </div>
    </div>
    <div class="panel panel-primary ">
        <div class="panel-heading " >Liste des formations</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Formation</th>
                        <th>Objectif </th>
                        <th>Plan</th>
                        <th>Projet </th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php
                        while($formation=$resultatF->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $formation['titre']?></td>
                            <td><?php echo $formation['objectif']?></td>
                            <td><?php echo $formation['plan']?></td>
                            <td><?php echo $formation['projet']?></td>
                        </tr>
                        <?php }?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>