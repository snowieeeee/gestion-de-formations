<?php

include "..\model/utilisateur.php";

class DaoUtilisateur
{
    private $dbh;

    public function __construct()
    {
        try{
            $this->dbh = new PDO('mysql:host=localhost;dbname=gestion_de_formation',"root",""); 
        }catch(PDOException $e){
            print "ERREUR ! :".$e->getMessage() ."</br>";
            die();
        }
    }

    public function save(Utilisateur $utilisateur)
    {
        $stm = $this->dbh->prepare("INSERT INTO utilisateur(firstName,lastName,telephone,email,password,CIN,birthdate,adress,status,profession) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    
        $stm->bindValue(1, $utilisateur->getFirstName()); 
        $stm->bindValue(2, $utilisateur->getLastName()); 
        $stm->bindValue(3, $utilisateur->getTelephone());
        $stm->bindValue(4, $utilisateur->getEmail()); 
        $stm->bindValue(5, $utilisateur->getPassword());
        $stm->bindValue(6, $utilisateur->getCIN()); 
        $stm->bindValue(7, $utilisateur->getBirthdate());
        $stm->bindValue(8, $utilisateur->getAdress());
        $stm->bindValue(9, $utilisateur->getStatus());
        $stm->bindValue(10, $utilisateur->getProfession());

        $stm->execute();
    }


    public function findClient($email,$password)
    {
        $utilisateur=NULL;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur where email=? AND password =?"); 
        
        $stm->bindValue(1,$email); 
        $stm->bindValue(2,$password); 

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($result)) { 
        $utilisateur = new Utilisateur($result['firstName'], $result['lastName'], $result['telephone'], $result['email'],$result['password'],$result['CIN'],$result['birthdate'],$result['adress'],$result['status'],$result['profession']);
        $utilisateur->Id =$result['id'];//ajoutée
        }
    return $utilisateur;
    }
    public function findPersonnel($password)
    {
        $utilisateur=NULL;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur where password =?"); 
        
        $stm->bindValue(1,$password); 

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (!empty($result)) { 
        $utilisateur = new Utilisateur($result['firstName'], $result['lastName'], $result['telephone'], $result['email'],$result['password'],$result['CIN'],$result['birthdate'],$result['adress'],$result['status'],$result['profession']);
    }
    return $utilisateur;
    }
    public function espaceRedirection($password){
        $utilisateur=NULL;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur where password =?"); 
        $stm->bindValue(1,$password);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if($result['status'] == 0){
            switch ($result['profession']) {
                case 'Formateur':
                    header('location:../../espFormateur/pages/formations.php');
                    break;
                case 'Comptable':
                    header('location: ../../comptable/comptable.php');
                    break;
                case 'Receptionniste':
                    header('location:../../receptionniste/receptionniste.php');
                    break;
                case 'Responsable de formation':
                    header('location:../view/RF_dashboard.php');
                    break;
                case'Admin':
                    header('location:../../adminn/administrateur_accueil.php');
                    break;
            }
        }
    }
    public function updateUser($firstName, $lastName,$telephone, $email, $password,$CIN, $birthdate,$adress,$status,$profession,$Id)
    {
        $sql = "UPDATE utilisateur SET 
        firstName=?,
        lastName=?,
        telephone=?,
        email=?,
        password=?,
        CIN=?,
        birthdate=?,
        adress=?,
        status=?,
        profession=?
        WHERE id = ? ";

        $stm = $this->dbh->prepare($sql);
        $stm->bindValue(1, $firstName);
        $stm->bindValue(2,$lastName);
        $stm->bindValue(3,$telephone);
        $stm->bindValue(4,$email);
        $stm->bindValue(5,$password);
        $stm->bindValue(6,$CIN);
        $stm->bindValue(7,$birthdate);
        $stm->bindValue(8,$adress);
        $stm->bindValue(9,$status);
        $stm->bindValue(10,$profession);
        $stm->bindValue(11,$Id);
        $stm->execute();

    }


}

?>