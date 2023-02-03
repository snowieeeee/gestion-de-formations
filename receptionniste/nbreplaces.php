<?php


session_start();
include('dbcon.php');
include ('functions.php');

$requete="SELECT DISTINCT formation.Id, titre, nbreplacestot FROM formation JOIN paiement ON paiement.idFormation= formation.Id WHERE paiement.status=2" ;
//$requetef="SELECT statut FROM  inscription ";

$mysqli = new mysqli("localhost", "root", "", "gestion_de_formation");

$resultatF=$mysqli->query($requete);
//$resultat = $mysqli->query($requetef);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
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
                       </a>
                    </li>
                   <li>
                       <a href="enattente.php" class="sub-item">
                       <i class="fa fa-clock-o"></i>
                       Demandes en attente
                       </a>
                    </li>
                    <li>
                       <a href="confirmer.php" class="sub-item">
                       <i class="fas fa-check"></i>
                       Demandes confirmées
                       </a>
                    </li>
                    <li>
                       <a href="rejeter.php" class="sub-item">
                       <i class="fa fa-close"></i>
                       Demandes rejetées
                       </a>
                    </li>
                    <li>
                       <a href="nbreplaces.php" class="sub-item">
                       <i class='fas fa-male' style='font-size:24px'></i>
                       Nbre de places disponibles
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
                            <h3>Le nombre de places restantes pour chaque formation</h3>
                            
                          </div>
                          <div class="card-body">
                            <table width="100%">
                             <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Formation</td>
                                    <td>Nbre de places restantes</td>
                                    
                                </tr>
                             </thead>
                             <tbody>
                             <?php
                        while($formation=$resultatF->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $formation['Id']?></td>
                            <td><?php echo $formation['titre']?></td>
                            <td> 
                                                <?php
                                                $id = $formation['Id'];
                                                $req="SELECT COUNT(*) from paiement JOIN  formation on formation.Id=paiement.idFormation where paiement.idFormation=$id and paiement.status=2";
                                                $resultat=$mysqli->query($req);
                                                $f=$resultat->fetch_row();
                                                $t=$f[0];
                                                $res=$formation['nbreplacestot'] - $t;
                                                //echo  $res;
                                                ?>
                                                 <span style="color: green"><?php echo $res ?></span>
                                                <?php } ?>
                            </td>
                            
                        </tr>
                        
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