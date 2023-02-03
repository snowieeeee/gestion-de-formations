<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gestion_de_formation";

    $con = mysqli_connect($host,$username,$password,$database);

    if(!$con)
    {
        die("Connection Failed : ". mysqli_connect_error());
    }
    else
    {
    }

?>