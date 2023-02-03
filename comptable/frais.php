<?php

include('dbcon.php');

function getAllFrais()
{
    global $con;
    $query="SELECT * FROM formation";
    return $query_run = mysqli_query($con,$query);
}

function getAllPaiements()
{
    global $con;
    $query="SELECT * FROM paiement";
    return $query_run = mysqli_query($con,$query);
}

function getEnCours()
{
    global $con;
    $query="SELECT * FROM paiement WHERE status='1'";
    return $query_run = mysqli_query($con,$query);
}

function getValides()
{
    global $con;
    $query="SELECT * FROM paiement WHERE status='2'";
    return $query_run = mysqli_query($con,$query);
}

function getInscrits()
{
    global $con;
    $query="SELECT * FROM paiement WHERE status='2'";
    return $query_run = mysqli_query($con,$query);
}

function getTOP1()
{
    global $con;
    $query="SELECT nomFormation, count(nomFormation) FROM paiement GROUP BY nomFormation ORDER BY count(nomFormation) DESC LIMIT 1";
    return $query_run = mysqli_query($con,$query);
}

function getTOP2()
{
    global $con;
    $query="SELECT nomFormation, count(nomFormation) FROM paiement GROUP BY nomFormation ORDER BY count(nomFormation) DESC LIMIT 1 OFFSET 1";
    return $query_run = mysqli_query($con,$query);
}

function getTOP3()
{
    global $con;
    $query="SELECT nomFormation, count(nomFormation) FROM paiement GROUP BY nomFormation ORDER BY count(nomFormation) DESC LIMIT 1 OFFSET 2";
    return $query_run = mysqli_query($con,$query);
}

function getJanProfit()
{
    global $con;
    $query="SELECT *FROM paiement WHERE status='2' AND MONTH(datePaiement)='1'";
    return $query_run = mysqli_query($con,$query);
}

function getFebProfit()
{
    global $con;
    $query="SELECT *FROM paiement WHERE status='2' AND MONTH(datePaiement)='2'";
    return $query_run = mysqli_query($con,$query);
}

?>