<?php
    //try{
     //   $pdo=new PDO("mysql:host=localhost ; dbname=gestion_de_formation" , "root" ,"");
   // }catch(Exception $e){
    //    die('Erreur de connexion : ' .$e->getMessage());
    //}
    

      //l'objet instancié de classe PDO permet de se connecter à une base de données quelque soit son type

?>
<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'gestion_de_formation';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$dbname);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
        ?>