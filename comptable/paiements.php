<?php 
session_start();
include('dbcon.php');
include ('frais.php');

//$session = $_POST["session_id"];
//$formation=$_POST["formation_id"];
//$client=$_POST["client_id"];

if (isset($_POST['confirmed']))
{
    $appUpdateQuery = "UPDATE paiement SET status='2' WHERE Id='".$_POST['item_id']."'";
    $appUpdateResult = mysqli_query($con, $appUpdateQuery);
    /*$insertQuery = "INSERT INTO inscrits (client,formation,session) VALUES(?,?,?)";
    $stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt,$insertQuery)){
    die(mysqli_error($con));
}
mysqli_stmt_bind_param(  $stmt, "sss"  , $client,$formation,$session);
mysqli_stmt_execute($stmt);*/
}
    
if (isset($_POST['rejected']))
{
    $rejUpdateQuery = "UPDATE paiement SET status='0' WHERE Id='".$_POST['item_id']."'";
    $rejUpdateResult = mysqli_query($con,$rejUpdateQuery);
}

if(isset($_POST['updateMP']))
{
    $mpUpdateQuery = "UPDATE paiement SET prixPaye='".$_POST['prixFormation']."' WHERE Id='".$_POST['item_id']."'";
    $mpUpdateResult = mysqli_query($con,$mpUpdateQuery);
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
            <h1><span class="lab la-accusoft"><span style="margin-left:15px">  UniLang </span></span>
            </h1>
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
                <li><a href="rapport.php"><span class="las la-file-invoice"></span><span>Compte rendu</span></a></li>
            </ul>
            <ul>
            <li><a href="#" class="dropdown active"><span class="las la-hand-holding-usd"> </span><span class="text">Paiements</span><span class="arrow"><i class="fas fa-angle-down"></i></span></a>
              <ul class="submenu">

                <li>
                </li>

                <li>
                    <a href="paiements.php" class="sub-item">
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
        <main>
        <div class="recent-flex">
                    <div class="paiements">
                        <div class="card">
                          <div class="card-header">
                            <h3>Liste des paiements</h3>
                            <!--<button>See all <span class="las la-arrow-right">

                            </span></button>-->
                          </div>
                          <div class="card-body">
                            <table class="table" width="100%">
                             <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Client</td>
                                    <td>Formation</td>
                                    <td>Session</td>
                                    <td>Mode paiement</td>
                                    <td>Montant payé</td>
                                    <td>Montant dû</td>
                                    <td>Statut</td>
                                    <td>Action</td>
                                </tr>
                             </thead>
                             <tbody>
                                <?php
                                    
                                    $paiements =getAllPaiements();

                                     if(mysqli_num_rows($paiements) > 0)
                                     {
                                        foreach($paiements as $item) {
                                        ?>
                                            <tr>
                                            <form method="get" action="facture.php">
                                                <td> <?= $item['Id']; ?> </td>
                                                <td> <?= $item['nomClient']; ?> </td>
                                                <td> <?= $item['nomFormation']; ?> </td>
                                                <td> <?= $item['session']; ?> </td>
                                                <td> <?= $item['modePaiement']; ?> </td>
                                                <td> <?= $item['prixPaye']; ?> </td>
                                                <td> <?= $item['prixFormation']; ?> </td>
                                                <td> 
                                                <?php $stats=$item['status'];
                                                if($stats==2){
                                                ?>
                                                 <span style="color: green">Validé</span>
                                                 <?php } if($stats==0)  { ?>
                                                 <span style="color: red">Rejeté</span>
                                                 <?php } if($stats==1)  { ?>
                                                 <span style="color: blue">En attente</span>
                                                <?php } ?> </td>
                                                <td>

                                                    <input type="hidden" name="Id" value="<?= $item['Id']; ?>">
                                                    <button alt="afficher la facture" class="btnblue view_facture" name="view" role="button" style="background-color: #c2e3fb;"><i class="las la-eye"></i></button>
                                            </form>
                                                  <form method="post" action="">
                                                    <input type="hidden" name="item_id" value="<?= $item['Id']; ?>">
                                                    <input type="hidden" name="prixFormation" value="<?= $item['prixFormation']; ?>">
                                                    <button alt="modifier le prix" class="btnyellow" name="updateMP" role="button"><i class="las la-edit"></i></button>
                                                  </form>
                                                  <form method="post" action="">
                                                    <input type="hidden" name="item_id" value="<?= $item['Id']; ?>" />
                                                    <input type="hidden" name="client_id" value="<?= $item['nomClient']; ?>" />
                                                    <input type="hidden" name="formation_id" value="<?= $item['nomFormation']; ?>" />
                                                    <input type="hidden" name="session_id" value="<?= $item['session']; ?>" />
                                                    <button alt="valider" class="btngreen" name="confirmed" role="button"><i class="las la-check"></i></button>
                                                  </form>

                                                  <form method="post" action="">
                                                    <input type="hidden" name="item_id" value="<?= $item['Id']; ?>" />
                                                    <button alt="rejeter" class="btnred" name="rejected" role="button"><i class="las la-trash-alt"></i></button>
                                                  </form>

                                                  <!--<form method="post" action="facture.php">
                                                    <input type="hidden" name="Id" value="<?= $item['Id']; ?>">
                                                    <button alt="afficher la facture" class="btnblue view_facture" name="view" role="button" style="background-color: #c2e3fb;"><i class="las la-eye"></i></button>
                                                  </form>-->

                                                  
                                                 </td>
                                                 
                                            </tr>
                                        <?php

                                        }
                                    }else{
                                        
                                    }
                                    ?> 
                             </tbody>

                            </table>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
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
    <script>
        $(document).ready(function(){
		$('table').dataTable()
	})

	$('.view_facture').click(function(){
		uni_modal("Facture","view_payment.php?pid="+$(this).attr('data-id'),"mid-large")
		
	})
    </script>
</body>
</html>