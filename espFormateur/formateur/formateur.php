<?php 
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='gestion_de_formation';

$connection = new mysqli($host, $username, $password, $dbname);
if(!$connection){
    die("Cannot connect to the database.". $connection->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter vos planifications</title>
    <link rel="shortcut icon" href="agenda.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
	
    <div class="container py-5" id="page-container">
        <header>
            <div class="row">
                <div class="col-md-9">
                    <?php 
                        include "../../respformation/model/utilisateur.php";
                        session_start();
                                                
                        if(isset($_SESSION['utilisateur'])){
                        $utilisateur=$_SESSION['utilisateur'];
                        $name = $utilisateur->getFirstName()." ".$utilisateur->getLastName();
                        echo "Bienvenue ".$name;}
                        ?>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" role="button" href="../../respformation/controller/utilisateur-controller.php?action=deconnexion">Déconnecter</a>
                </div>
            </div>
        </header><br>
        <div class="row">
            <div class="col-md-10">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Détails d'une planification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Formation</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Session</dt>
                            <dd id="session" class=""></dd>
                            <dt class="text-muted">Heure de début</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Heure de fin</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $connection->query("SELECT id, title, description, session, start_datetime, end_datetime FROM planification where formateur = '$name' ");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($connection)) $connection->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>