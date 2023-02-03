<?php

include('frais.php');

$top1=getTOP1();
if(mysqli_num_rows($top1) > 0)
{
    foreach($top1 as $item1) {

?>

<input type="hidden" name="nom1" value="<?=$item1['nomFormation'];?>">
<input type="hidden" name="rank1" value="<?=$item1['count(nomFormation)'];?>">

<?php
    }
}else{

}

?>

<?php

$top2=getTOP2();
if(mysqli_num_rows($top2) > 0)
{
    foreach($top2 as $item2) {

?>

<input type="hidden" name="nom2" value="<?=$item2['nomFormation'];?>">
<input type="hidden" name="rank2" value="<?=$item2['count(nomFormation)'];?>">

<?php
    }
}else{

}

?>

<?php

$top3=getTOP3();
if(mysqli_num_rows($top3) > 0)
{
    foreach($top3 as $item3) {

?>

<input type="hidden" name="nom3" value="<?=$item3['nomFormation'];?>">
<input type="hidden" name="rank3" value="<?=$item3['count(nomFormation)'];?>">

<?php
    }
}else{

}

?>

<?php

$pf = 0;
$jan=getJanProfit();
  
if(mysqli_num_rows($jan) > 0)
{
    foreach($jan as $item4) {
        $pf+=$item4['prixPaye'];
    }
?>

<input type="hidden" name="janvier" value="<?=$pf;?>">

<?php
    
}else{

}

?>

<?php

$pff = 0;
$feb=getFebProfit();
  
if(mysqli_num_rows($feb) > 0)
{
    foreach($feb as $item5) {
        $pff+=$item5['prixPaye'];
    }
?>

<input type="hidden" name="fevrier" value="<?=$pff;?>">

<?php
    
}else{

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
    <link rel="stylesheet" href="style2.css">
    <script src="https://kit.fontawesome.com/96a5bdc11d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
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
                <li><a href="comptable.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
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
            <li><a href="#" class="dropdown"><span class="las la-hand-holding-usd"> </span><span class="text">Paiements</span><span class="arrow"><i class="fas fa-angle-down"></i></span></a>
                <ul class="submenu">

                    <li>
                    </li>
                    
                    <li>
                        <a href="paiements.php" class="sub-item">
                        <i class="fa fa-list"></i>
                            Tous les paiements
                    </a></li>
                    <li>
                        <a href="enattente.php" class="sub-item">
                        <i class="fa fa-clock-o"></i>
                        En attente
                    </a></li>
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
            <div class="cards">
            <div class="card-single" style="background-color: #c4c6f9;">
                    <div> 
                        <span>
<?php

$pay=getAllPaiements();
$paycnt=mysqli_num_rows($pay);
?>
                        </span>
                        <h1> 
                        <?php echo $paycnt;?>
</h1>
                        <h4><span>Tous les paiements</span></h4>

                    </div>
                    <div>
                        <span class="las la-money-check-alt">
                            
                        </span>
                    </div>
                </div>
                <div class="card-single" style="background-color: #fcddec;">
                    <div> 
                        <span>
                    <?php

                        $pay1=getEnCours();
                        $paycnt1=mysqli_num_rows($pay1);
                    ?>
                        </span>
                        <h1> 
                        <?php echo $paycnt1;?>
</h1>
                        <h4><span>En attente de collection</span></h4>

                    </div>
                    <div>
                        <span class="las la-user-clock">
                            
                        </span>
                    </div>
                </div>
                <div class="card-single" style="background-color:#bbfae7;">
                    <div> 
                    <span>
                    <?php


                        $inscrit=getInscrits();
                        $inscritcnt=mysqli_num_rows($inscrit);
                    ?>
                        <h1>
                            <?php echo $inscritcnt;?>
                        </h1>
                        <h3><span>Inscrits</span></h3gfw>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single" style="background-color:#bed7ea;">
                    <div> 
                           <?php

                                    $profit = 0;
                                    $inscrits =getInscrits();
  
                                     if(mysqli_num_rows($inscrits) > 0)
                                     {
                                        foreach($inscrits as $item) {
                                            $profit+=$item['prixPaye'];
                                        }
                                    }
                            ?>
                        <h1>
                            <?php echo $profit;?>
                        </h1>
                        <h3><span>Revenu</span></h3gfw>
                    </div>
                    <div>
                        <span class="las la-file-invoice-dollar"></span>
                    </div>
                </div>
            </div>

            <div class="charts">
                <div class="chart">
                    <h2>Revenus</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>TOP Formations</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var janvier=document.querySelector('input[name="janvier"]').value;
        var fevrier=document.querySelector('input[name="fevrier"]').value;
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Revenus en MAD',
            data: [janvier, fevrier, 20500, 19500, 15900, 19900, 20000, 20500, 19000, 21000, 18400, 17000],
            backgroundColor: [
                'rgba(108, 212, 197, 1)'

            ],
            borderColor: '#5275fc',

            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
    </script>
    <script>
        var ctx2 = document.getElementById('doughnut').getContext('2d');
        var title1=document.querySelector('input[name="nom1"]').value;
        var title2=document.querySelector('input[name="nom2"]').value;
        var title3=document.querySelector('input[name="nom3"]').value;
        var top1=document.querySelector('input[name="rank1"]').value;
        var top2=document.querySelector('input[name="rank2"]').value;
        var top3=document.querySelector('input[name="rank3"]').value;
    var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        
        labels: [title1, title2, title3, 'Autres'],

        datasets: [{
            label: 'Formations',
            
            data: [top1, top2, top3, 1],
            backgroundColor: [
                'rgb(187, 250, 231, 1)',
                '#fcddec',
                '#C4C6F9',
                '#7eb0d5'

            ],
            borderColor: [
                'rgb(187, 250, 231, 1)',
                '#fcddec',
                '#C4C6F9',
                '#7eb0d5'

            ],
            borderWidth: 1
        }]

    },
    options: {
        responsive: true
    }
});
    </script>
</body>
</html>