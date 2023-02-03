<?php
include('frais.php');

?>
<script>
var ctx2 = document.getElementById('doughnut').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        <?php 
            $top=getTOPFormations();
            if(mysqli_num_rows($top) > 0)
            {
                foreach($top as $item) {

            ?>
        labels: [<?=$item['nomFormation']?>, 'Non-Academic', 'Administration', 'Others'],

        datasets: [{
            label: 'Employees',
            data: [<?=$item['count(nomFormation)'] ?>, 12, 8, 6], 
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
        <?php

                }
            }else{
                                        
                }
        ?>

    },
    options: {
        responsive: true
    }
});
</script>