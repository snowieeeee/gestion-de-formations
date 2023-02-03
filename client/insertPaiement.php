<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=gestion_de_formation', "root", "");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$nomFormation = $_POST['nomFormation'];
$prixFormation = $_POST['prixFormation'];
$nom = $_POST['lastName'];
$prenom = $_POST['firstName'];
$nomClient = $nom." ".$prenom ; //Nom Complet
$modePaiement = $_POST['modePaiement'];
$prixPaye = $_POST['prixPaye'];
$codeCC = $_POST['codeCC'];
$numCC = $_POST['numCC'];
$session = $_POST['session'];
$idFormation = $_POST['idFormation'];
$idClient = $_POST['idClient'];

// $email = $_POST['email']; non ajouté
$status = $_POST['status'];

$stmt = $connection->prepare("INSERT INTO paiement (nomClient,nomFormation,prixFormation,modePaiement,prixPaye,status,codeCC,numCC,session,idClient,idFormation,datePaiement) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())");

$stmt->bindParam(1,$nomClient);
$stmt->bindParam(2,$nomFormation);
$stmt->bindParam(3,$prixFormation);
$stmt->bindParam(4,$modePaiement);
$stmt->bindParam(5,$prixPaye);
$stmt->bindParam(6,$status);
$stmt->bindParam(7,$codeCC);
$stmt->bindParam(8,$numCC);
$stmt->bindParam(9,$session);
$stmt->bindParam(10,$idClient);
$stmt->bindParam(11,$idFormation);


$stmt->execute();


if ($stmt->rowCount() > 0) {
    echo "<script>alert('Demande envoyée!');</script>";
    //header("location:../respformation/index1.php");
} else {
    echo "<script>alert('Echec de l'envoi');</script>";
}

?>