<?php
include "../dao/dao-formation.php";

$action=$_GET["action"];
$dao=new DaoFormation();

switch ($action) {
    case 'create':
        $titre = $_POST["titre"];
        $prix = $_POST["prix"];
        $objectif = $_POST["objectif"];
        $plan = $_POST["plan"];
        $projet = $_POST["projet"];
        $evaluation = $_POST["evaluation"];
        $session = $_POST["session"];
        $image = $_POST["image"];
        $statut = $_POST["statut"];

        if (isset($titre, $prix, $objectif, $plan, $projet, $evaluation,$session,$image,$statut)) {
            $formation = new Formation($titre, $prix, $objectif, $plan, $projet, $evaluation,$session,$image,$statut);
            $dao->addCourse($formation);
            header('location:../view/formations.php');
        }
        break;
    case 'update':
        $Id=$_POST["Id"];
        $titre = $_POST["titre"];
        $prix = $_POST["prix"];
        $objectif = $_POST["objectif"];
        $plan = $_POST["plan"];
        $projet = $_POST["projet"];
        $evaluation = $_POST["evaluation"];
        $session = $_POST["session"];
        $statut = $_POST["statut"];

        if (isset($titre, $prix, $objectif, $plan, $projet, $evaluation,$session,$statut)) {
            //$formation = new Formation($titre, $prix, $objectif, $plan, $projet, $evaluation);
            $dao->updateCourse($titre, $prix, $objectif, $plan, $projet, $evaluation,$session,$statut,$Id);
            header('location:../view/formations.php');
            //$_SESSION['updateResponse'] = 'Formation modifié !';
        }else {
            header('location:../view/updateCourse.php');
            //$_SESSION['updateResponse'] = 'Erreur dans la modification !';
        }
        
        break;
    case 'delete':
        $Id=$_POST["Id"];
        if (isset($Id)) {
            $dao->deleteCourse($Id);
            header('location:../view/formations.php');
        }
        break;
}
?>