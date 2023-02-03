<?php
include "C:/xampp/htdocs/gestionFormation/adminn/admin/utilisateur.php";

class DaoUtili{
    private $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=gestion_de_formation',"root",""); 
        }
        catch (PDOException $e) { print "Erreur !: " . $e->getMessage() . "<br/>";
            die(); 
        }
    }


public function ajouter(utilisateur $utilisateur){
    $stm = $this->dbh->prepare("INSERT INTO utilisateur (email, status, password, firstName, lastName, profession, birthdate, telephone, CIN, adress)
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stm->bindValue(1, $utilisateur->getEmail());
    $stm->bindValue(2, $utilisateur->getStatus());
    $stm->bindValue(3, $utilisateur->getPassword());
    $stm->bindValue(4, $utilisateur->getFirstName());
    $stm->bindValue(5, $utilisateur->getLastName());
    $stm->bindValue(6, $utilisateur->getProfession());
    $stm->bindValue(7, $utilisateur->getBirthdate());
    $stm->bindValue(8, $utilisateur->getTelephone());
    $stm->bindValue(9, $utilisateur->getCIN());
    $stm->bindValue(10, $utilisateur->getAdress());

    $stm->execute();

}

public function supprimer($id){
    $stm = $this->dbh->prepare("DELETE FROM utilisateur WHERE id = ?");

    $stm->bindValue(1, $id);
    $stm->execute();
}


public function modifier($id, $email, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress){
    $stm = $this->dbh->prepare("UPDATE utilisateur SET email = ?, password = ?, firstName = ?, lastName = ?, profession = ?,
    birthdate = ?, telephone = ?, CIN = ?, adress = ? WHERE id = ?");
    
    $stm->bindValue(1, $email);
    $stm->bindValue(2, $password);
    $stm->bindValue(3, $firstName);
    $stm->bindValue(4, $lastName);
    $stm->bindValue(5, $profession);
    $stm->bindValue(6, $birthdate);
    $stm->bindValue(7, $telephone);
    $stm->bindValue(8, $CIN);
    $stm->bindValue(9, $adress);
    $stm->bindValue(10, $id);
    $stm->execute();  

}




}
?>