<?php 

session_start();
include('dbcon.php');
include ('frais.php');

if(isset($_POST["update"])){    
    $insert_data = array(
    
      ':Id'                   =>$_POST['Id'],
      ':nomClient'            => $_POST['nomClient'],
      ':nomFormation'         => $_POST['nomFormation'],
      ':session'              => $_POST['session'],
      ':modePaiement'         => $_POST['modePaiement'],
      ':prixPaye'             => $_POST['prixPaye'],
      ':prixFormation'        => $_POST['prixFormation']
  
    );
  
  $query = "UPDATE paiement SET nomClient = :nomClient, nomFormation = :nomFormation, session = :session, modePaiement = :modePaiement, prixPaye = :prixPaye, prixFormation = :prixFormation WHERE Id = :Id";
  $statement = $con->prepare($query);
  $statement->execute($insert_data);
  
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css ">
    <link rel="stylesheet" href="style2.css ">
    <link rel="stylesheet" href="style3.css ">
    <script src="https://kit.fontawesome.com/96a5bdc11d.js" crossorigin="anonymous"></script>
    <title> Espace comptable</title>
</head>
<body>
   <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"><span style="margin-left:15px">  UniLang </span></span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="comptable.php"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
            </ul>
            <ul>
                <li><a href="fraisForms.php"><span class="las la-coins"></span><span>Frais des formations</span></a></li>
            </ul>
            <ul>
                <li><a href="inscrits.php"><span class="las la-users"></span><span>Liste des inscrits</span></a></li>
            </ul>
            <ul>
                <li><a href="report.php"><span class="las la-file-invoice"></span><span>Compte rendu</span></a></li>
            </ul>
            <ul>
            <li><a href="#" class="dropdown active"><span class="las la-hand-holding-usd"> </span><span class="text">Paiements</span><span class="arrow"><i class="fas fa-angle-down"></i></span></a>
              <ul class="submenu">

                <li>
                </li>

                <li>
                    <a href="inscriptions.php" class="sub-item">
                    <i class="fa fa-list"></i>
                    Tous les paiements
                    </a>
                </li>
                <li>
                    <a href="enattente.php" class="sub-item">
                    <i class="fa fa-clock-o"></i>
                    En attente
                    </a>
                </li>
             </ul>
            </li>
            </ul>
            
            <!--<ul>
                <li><a href="formations.php"><span class="las la-users"></span><span>Formations</span></a></li>
            </ul>-->
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                    Dashboard
                </label>
            </h2>
            <div class="user-wrapper">
                <img src="comptable.png" alt="Administrateur profil">
                <div>
                    <h3>Aya ZM</h3>
                    <small>comptable</small>
                </div>
            </div>
        </header>
        <div class="container" style="margin-top: 150px;">
        <h2 style="margin-left: 100px; margin-bottom: 50px;">Modifier le montant payé</h2>

        <form method="post" action=""  style="margin-left: 150px;">
        <input type="hidden" name="Id" value='<?php echo $Id; ?>'>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Client</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomClient" required value="<?php echo $nomClient;  ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Formation</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomFormation"  required value="<?php echo $nomFormation ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Session</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="session" required value="<?php echo $session;  ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Mode paiement</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="modePaiement" required value="<?php echo $modePaiement;  ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Montant payé</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prixPaye" required value="<?php echo $prixPaye;  ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-3 col-form-label">Prix formation</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prixFormation" required value="<?php echo $prixFormation;  ?>">
                </div>
            </div>
            <div class="row mb-3" >
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <input type="hidden" name="Id" value='<?php echo $row['Id']; ?>'>
                    <button type="submit" name="update" class="btn btn-primary">Enregistrer</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="paiements.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
 <?php
/*
}
}else{

}*/
?> 
    </div>
    <script type="text/javascript">
           const dropdownBtn = document.querySelector('.dropdown');
           const submenu = document.querySelector('.submenu');

           dropdownBtn.addEventListener('click',function(e) {
                e.preventDefault();
                submenu.classList.toggle('show');
           })
   </script>
   <script>
        $(document).ready(function () {
 
            $('sidebar-menu > a')
                    .click(function (e) {
                $('sidebar-menu > a')
                    .removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>
</html>