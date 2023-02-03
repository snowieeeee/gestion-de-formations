<?php

include "C:/xampp/htdocs/gestionFormation/adminn/admin/dao_utilisateur.php";

$action = $_GET['action'];
$dao = new DaoUtili();

switch($action){
    case 'ajouter':
        $email = $_POST['email'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $profession = $_POST['profession'];
        $birthdate = $_POST['birthdate'];
        $telephone = $_POST['telephone'];
        $CIN = $_POST['CIN'];
        $adress = $_POST['adress'];

        if (isset($email, $status, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress)){
            $utilisateur = new utilisateur($email, $status, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress);
            $dao->ajouter($utilisateur);
        header('Location: ../view/personnels.php');    
        }

        else{
            echo 'Erreur d\'insertion';
        }
    break;

    case 'supprimer':
        $id = $_POST['id'];

        if (isset($id)){
            $dao->supprimer($id);
            header('Location: ../administrateur_accueil.php'); 
        }
        else{
            echo 'Erreur de suppression';
        }
        

    case 'modifier':
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $profession = $_POST['profession'];
        $birthdate = $_POST['birthdate'];
        $telephone = $_POST['telephone'];
        $CIN = $_POST['CIN'];
        $adress = $_POST['adress'];

        if (isset($id, $email, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress)){
            $dao->modifier($id, $email, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress);
            header('Location: ../view/personnels.php');  
     }
     else{
        echo 'Erreur de modification';
     }
    
     break;

    

    
    
    

}



?>