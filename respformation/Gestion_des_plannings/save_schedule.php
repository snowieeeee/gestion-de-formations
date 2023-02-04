<?php 
require_once('database_connection.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `planification` (`title`,`formateur`,`description`,`session`,`start_datetime`,`end_datetime`) VALUES ('$title','$formateur','$description','$session','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `planification` set `title` = '{$title}', `formateur` = '{$formateur}', `description` = '{$description}', `session` = '{$session}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Planification bien enregistrée !'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>