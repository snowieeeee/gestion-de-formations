<?php 

session_start();
include('dbcon.php');
include ('functions.php');

if (isset($_POST['confirmed']))
{
    $appUpdateQuery = "UPDATE inscription SET statut='1' WHERE inscriptionid='".$_POST['item_id']."'";
    $appUpdateResult = mysqli_query($con, $appUpdateQuery);
}
    
if (isset($_POST['rejected']))
{
    $rejUpdateQuery = "UPDATE inscription SET statut='2' WHERE inscriptionid='".$_POST['item_id']."'";
    $rejUpdateResult = mysqli_query($con,$rejUpdateQuery);
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
    <script src="https://kit.fontawesome.com/96a5bdc11d.js" crossorigin="anonymous"></script>
    <title> Espace receptionniste</title>
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
                <li><a href="receptionniste.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
            </ul>
            <ul>
            <li>
              <a href="#" class="dropdown">
                <span class="las la-users"> </span>
                <span class="text">Inscriptions</span>
                <span class="arrow"><i class="fas fa-angle-down"></i></span>
              </a>
              <ul class="submenu">

<li>
</li>

<li>
    <a href="inscriptions.php" class="sub-item">
    <i class="fa fa-list"></i>
        Toutes les demandes
</a></li>
<li>
    <a href="enattente.php" class="sub-item">
    <i class="fa fa-clock-o"></i>
    Demandes en attente
</a></li>
<li>
    <a href="confirmer.php" class="sub-item">
    <i class="fas fa-check"></i>
    Demandes confirmées
</a></li>
<li>
    <a href="rejeter.php" class="sub-item">
    <i class="fa fa-close"></i>
    Demandes rejetées
</a></li>
<li>
    <a href="nbreplaces.php"class="sub-item">
    <i class='fas fa-male' style='font-size:24px'></i>
    Nbre de places disponibles
</a></li>
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
                <img src="receptionniste.png" alt="Administrateur profil">
                <div>
                    <h4>Aya Zm</h4>
                    <small>receptionniste</small>
                </div>
            </div>
        </header>
        <main>
        <div class="recent-flex">
                    <div class="inscriptions">
                        <div class="card">
                          <div class="card-header">
                            <h3>Demandes en attente</h3>
                            <a href="inscriptions.php"><button>Voir tout<span class="las la-arrow-right">
                            </span></button></a>
                          </div>
                          <div class="card-body">
                            <table width="100%">
                             <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Client</td>
                                    <td>Formation</td>
                                    <td>Session</td>
                                    <td>Statut</td>
                                    <td>Action</td>
                                </tr>
                             </thead>
                             <tbody>
                                <?php
                                    
                                    $demandes =getEnAttente();

                                     if(mysqli_num_rows($demandes) > 0)
                                     {
                                        foreach($demandes as $item) {
                                        ?>
                                            <tr>
                                                <td> <?= $item['inscriptionid']; ?> </td>
                                                <td> <?= $item['client']; ?> </td>
                                                <td> <?= $item['formation']; ?> </td>
                                                <td> <?= $item['session']; ?> </td>
                                                <td> 
                                                <?php $stats=$item["statut"];
                                                if($stats==1){
                                                ?>
                                                 <span style="color: green">Confirmée</span>
                                                 <?php } if($stats==2)  { ?>
                                                 <span style="color: red">Rejetée</span>
                                                 <?php } if($stats==0)  { ?>
                                                 <span style="color: blue">En attente</span>
                                                <?php } ?> </td>
                                                <td>
                                                  <form method="post" action="">
                                                    <input type="hidden" name="item_id" value="<?= $item['inscriptionid']; ?>" />
                                                    <button class="btngreen" name="confirmed" role="button">Valider</button>
                                                  </form>
                                                  <form method="post" action="">
                                                    <input type="hidden" name="item_id" value="<?= $item['inscriptionid']; ?>" />
                                                    <button class="btnred" name="rejected" role="button">Rejeter</button>
                                                  </form>
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
                    <div class="formations">

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
</body>
</html>