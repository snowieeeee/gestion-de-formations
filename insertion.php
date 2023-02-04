<?php

include('receptionniste/dbcon.php');



$session = $_POST["session"];
$formation=$_POST["titreFormation"];
$client=$_POST["nomClient"];
$idFormation = $_POST["idFormation"];
$idClient = $_POST["idClient"];

if(!$session){
    die("Terms must be accepted");
}
$host = "localhost";
$dbname = "gestion_de_formation";
$username = "root";
$password = "";


$con = mysqli_connect( $host , $username,  $password,  $dbname);

if(mysqli_connect_errno()){
    die("Connection error :" . mysqli_connect_error());
}
if(isset($_POST['envoyer'])){
$sql = "INSERT INTO inscription (session,client,formation,idFormation,idClient) VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($con));
}
mysqli_stmt_bind_param(  $stmt, "sssss"  , $session,$client,$formation,$idFormation,$idClient);
mysqli_stmt_execute($stmt);



echo "Record saved .";
}

/*if(isset($_POST['envoyer'])){
   
    $formationQuery="UPDATE inscription SET formation='$_POST[titreFormation]'";
    $formationResult=mysqli_query($con,$formationQuery);
    $utilisateurQuery="UPDATE inscription SET client='$_POST[nomClient]'";
    $userResult=mysqli_query($con,$utilisateurQuery);
 }*/

?> 




