<?php
include "..\model/formation.php";

class DaoFormation
{
    private $dbh;

    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=gestion_de_formation', "root", "");
        } catch (PDOException $e) {
            print "ERREUR ! :" . $e->getMessage() . "</br>";
            die();
        }
    }

    public function addCourse(Formation $formation)
    {
        $stm=$this->dbh->prepare("INSERT INTO formation(titre,prix,objectif,plan,projet,evaluation,session,image,statut,nbreplacestot) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stm->bindValue(1, $formation->getTitre());
        $stm->bindValue(2,$formation->getPrix());
        $stm->bindValue(3,$formation->getObjectif());
        $stm->bindValue(4,$formation->getPlan());
        $stm->bindValue(5,$formation->getProjet());
        $stm->bindValue(6,$formation->getEvaluation());
        $stm->bindValue(7,$formation->getSession());
        $stm->bindValue(8,$formation->getImage());
        $stm->bindValue(9,$formation->getStatut());
        $stm->bindValue(10,$formation->getNbreplaces());

        $stm->execute();
    }
    

    public function updateCourse($titre, $prix, $objectif, $plan, $projet, $evaluation,$session,$statut,$nbreplaces ,$Id)
    {
        $sql = "UPDATE formation SET 
        titre=?,
        prix=?,
        objectif=?,
        plan=?,
        projet=?,
        evaluation=?,
        session=?,
        statut=?,
        nbreplacestot=? 
        WHERE Id = ? ";

        $stm = $this->dbh->prepare($sql);
        $stm->bindValue(1, $titre);
        $stm->bindValue(2,$prix);
        $stm->bindValue(3,$objectif);
        $stm->bindValue(4,$plan);
        $stm->bindValue(5,$projet);
        $stm->bindValue(6,$evaluation);
        $stm->bindValue(7,$session);
        $stm->bindValue(8,$statut);
        $stm->bindvalue(9,$nbreplaces);
        $stm->bindValue(10,$Id);
        $stm->execute();

    }

    public function deleteCourse($Id)
    {
        $sql = "DELETE FROM formation WHERE Id=?";
        $stm = $this->dbh->prepare($sql);
        $stm->bindValue(1, $Id);
        $stm->execute();
    }

}
?>