<?php 

session_start();
include('dbcon.php');
include ('frais.php');

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
    <link rel="stylesheet" href="style3.css">
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
                <li><a href="rapport.php" class="active"><span class="las la-file-invoice"></span><span>Compte rendu</span></a></li>
            </ul>
            <ul>
            <li><a href="#" class="dropdown"><span class="las la-hand-holding-usd"> </span><span class="text">Paiements</span><span class="arrow"><i class="fas fa-angle-down"></i></span></a>
              <ul class="submenu">
                   <li>
                   </li>
                   <li>
                       <a href="paiements.php" class="sub-item">
                       <i class="fa fa-list"></i>
                       Toutes les paiements
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
                    <div class="inscriptions">
                        <div class="card">
                          <div class="card-header">
                            <h3>Rapport des paiements</h3>
                            <!--<a href="paiements.php"><button>Voir tout<span class="las la-arrow-right">-->
                            </span></button></a>
                          </div>
                          <div class="card-body">
                            <table width="100%">
                             <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Client No.</td>
                                    <td>Nom Client</td>
                                    <td>Formation No.</td>
                                    <td>Date</td>
                                    <td>Mode Paiement</td>
                                    <td>Montant</td>
                                </tr>
                             </thead>
                             <tbody>
                                <?php
                                    
                                    $i=1;
                                    $total = 0;
                                    $inscrits =getInscrits();
  
                                    if(mysqli_num_rows($inscrits) > 0)
                                     {
                                        foreach($inscrits as $item) {
                                            $total+=$item['prixPaye']
                                        ?>
                                            <tr>
                                            <form method="get" action="rapport-pdf.php">
                                                <td> <?= $i; ?> </td>
                                                <td> <?= $item['idClient']; ?> </td>
                                                <td> <?= $item['nomClient']; ?> </td>
                                                <td> <?= $item['idFormation']; ?> </td>
                                                <td> <?= date('d-m-Y',strtotime($item['datePaiement'])); ?> </td>
                                                <td> <?= $item['modePaiement']; ?> </td>
                                                <td> <?= $item['prixPaye']; ?> </td>
                                            </tr>
                                        <?php
                                           $i++;

                                        }
                                    }else{
                                        
                                    }
                                    ?> 
                                    <td> </td>
                              </tbody>
                              <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Total</b></td>
                                    <td style="text-align:left;"><?php echo number_format($total,2); ?></td>
                                </tr>
                             </tfoot>
                            </table>
                            
                <div class="col-md-12 mb-4">
                    <center>
                        <p></p>
                        <p></p>
                    <button alt="imprimer le rapport" class="btnblue" name="view" role="button"><i class="las la-print"></i>Imprimer</button>
                                </form>
                    </center>
                </div>
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
</body>
</html>