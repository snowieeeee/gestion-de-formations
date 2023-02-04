<?php
include "../dao/dao-utilisateur.php";

$action=$_GET["action"];
$dao=new DaoUtilisateur();

switch($action){
    case 'insert':
        $firstName=$_POST["firstName"];
        $lastName=$_POST["lastName"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $CIN=$_POST["CIN"];
        $birthdate=$_POST["birthdate"];
        $telephone=$_POST["telephone"];
        $adress=$_POST["adresse"];
        $status = $_POST["status"];
        $profession = $_POST["profession"];
        
        if(isset($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession)){
            $utilisateur = new Utilisateur($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession);
            $dao->save($utilisateur);
            header('location:../index.html');
        }
        break;
    
    case 'login':
        $email=$_POST["email"];
        $password=$_POST["password"];
        $utilisateur=$dao->findClient($email,$password);
        if($utilisateur!=NULL){
            session_start();
            $_SESSION['utilisateur']=$utilisateur;
            //$_SESSION['idUser']=$utilisateur->Id;
            header('location:../index1.php');
        }else{
            header('location:../view/login.html');
        }
        break;
        //Login pour les personnels 
    case 'loginp':
        $password=$_POST["password"];
        $utilisateur=$dao->findPersonnel($password);
        if($utilisateur!=NULL){
            session_start();
            $_SESSION['utilisateur']=$utilisateur;
            $dao->espaceRedirection($password);
            
        }else{
            header('location:../view/login personnel.html');
        }
        break;
    case 'update':
        $id = $_POST["id"];
        $firstName=$_POST["firstName"];
        $lastName=$_POST["lastName"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $CIN=$_POST["CIN"];
        $birthdate=$_POST["birthdate"];
        $telephone=$_POST["telephone"];
        $adress=$_POST["adress"];
        $status = $_POST["status"];
        $profession = $_POST["profession"];
        if(isset($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession)){
            $utilisateur = new Utilisateur($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession);
            $dao->updateUser($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession,$id);
            header('location:../index1.php');
        }
        
        break;
    case 'deconnexion':
        session_start();
        session_destroy();
        header('location:../index.html');
        break;
}

?>