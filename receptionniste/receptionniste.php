<?php

include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css ">
    <link rel="stylesheet" href="style2.css">
    <script src="https://kit.fontawesome.com/96a5bdc11d.js" crossorigin="anonymous"></script>
    <title> Espace receptionniste</title>
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
                    <h3>Aya Zm</h3>
                    <small>receptionniste</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
            <div class="card-single" style="background-color: #c4c6f9;">
                    <div> 
                        <span>
<?php

$demandes=getAlldemandes();
$demandescnt=mysqli_num_rows($demandes);
?>
                        </span>
                        <h1> 
                        <?php echo $demandescnt;?>
</h1>
                        <h4><span>Toutes les demandes</span></h4>

                    </div>
                    <div>
                        <span class="las la-clipboard">
                            
                        </span>
                    </div>
                </div>
                <div class="card-single" style="background-color: #fcddec;">
                    <div> 
                        <span>
<?php

$demandes1=getEnAttente();
$demandescnt1=mysqli_num_rows($demandes1);
?>
                        </span>
                        <h1> 
                        <?php echo $demandescnt1;?>
</h1>
                        <h4><span>Demandes en attente</span></h4>

                    </div>
                    <div>
                        <span class="las la-clipboard">
                            
                        </span>
                    </div>
                </div>
                <div class="card-single">
                    <div> 
                    <span>
<?php


$demandes2=getConfirmed();
$demandescnt2=mysqli_num_rows($demandes2);
?>
                        <h1>
                            <?php echo $demandescnt2;?>
                        </h1>
                        <h3><span>Inscriptions</span></h3gfw>
                    </div>
                    <div>
                        <span class="las la-users"></span>
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