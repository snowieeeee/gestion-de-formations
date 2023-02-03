<?php

include('dbcon.php');

function getAlldemandes()
{
    global $con;
    $query="SELECT * FROM inscription";
    return $query_run = mysqli_query($con,$query);
}

function getEnAttente()
{
    global $con;
    $query="SELECT * FROM inscription WHERE statut='0'";
    return $query_run = mysqli_query($con,$query);
}

function getConfirmed()
{
    global $con;
    $query="SELECT * FROM inscription WHERE statut='1'";
    return $query_run = mysqli_query($con,$query);
}

function getRejected()
{
    global $con;
    $query="SELECT * FROM inscription WHERE statut='2'";
    return $query_run = mysqli_query($con,$query);
}

?>