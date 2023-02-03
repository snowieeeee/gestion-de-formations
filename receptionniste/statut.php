<?php

session_start();

include "dbcon.php";

if (isset($_POST['confirmed']))
{
    $appUpdateQuery = "UPDATE inscription SET statut='1' WHERE id='".$_POST['item_id']."'";
    $appUpdateResult = mysqli_query($con, $appUpdateQuery);
    //$appInsertQuery = "INSERT INTO approved(id,status) VALUES ('".$_POST['row_id']."','Approved')";
    //$appInsertResult = mysqli_query($conn, $appInsertQuery);
}
    
if (isset($_POST['rejected']))
{
    $rejUpdateQuery = "UPDATE inscription SET statut='2' WHERE id='".$_POST['item_id']."'";
    $rejUpdateResult = mysqli_query($con,$rejUpdateQuery);
    //$rejInsertQuery = "INSERT INTO rejected(id,status) VALUES ('".$_POST['row_id']."','Rejected')";
    //$rejInsertResult = mysqli_query($conn, $rejInsertQuery);
}

?>
