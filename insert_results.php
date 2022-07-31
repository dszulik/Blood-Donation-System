<?php
include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

$id = $_POST['id'];
$hgb = $_POST['hgb'];
$hct = $_POST['hct'];
$rbc = $_POST['rbc'];
$wbc = $_POST['wbc'];
$plt = $_POST['plt'];

$qry = "INSERT INTO `wyniki`(`id_wynikow`, `hgb`, `hct`, `rbc`, `wbc`, `plt`) 
        VALUES ('$id','$hgb','$hct','$rbc','$wbc','$plt')";

$insert = mysqli_query($conn, $qry);

if(!$insert){
    echo("Error: " . $qry . "<br>" . $conn->error);
} else {
    echo("Poprawnie dodano");
}

CloseCon($conn);
?>