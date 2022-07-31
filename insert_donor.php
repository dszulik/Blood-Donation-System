<?php
include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$plec = $_POST['plec'];
$pesel = $_POST['pesel'];
$grupa_krwi = $_POST['grupa_krwi'];
$data_urodzenia = $_POST['data_urodzenia'];
$miasto = $_POST['miasto'];
$adres = $_POST['adres'];
$telefon = $_POST['telefon'];

$result = mysqli_query($conn, "SELECT * FROM krwiodawca WHERE pesel = '$pesel'");

if($result->num_rows > 0) //walidacja po peselu 
{
    echo("Krwiodawca juz istnieje w bazie");
}
else
{
    $qry = "INSERT INTO `krwiodawca`(`krwiodawca_imie`, `krwiodawca_nazwisko`, `plec`, `pesel`, `grupa_krwi`, `data_urodzenia`, `miasto`, `adres`, `telefon`) 
    VALUES ('$imie', '$nazwisko', '$plec', '$pesel', '$grupa_krwi', '$data_urodzenia', '$miasto', '$adres', '$telefon')";

    $insert = mysqli_query($conn, $qry);

    if(!$insert){
        echo("Error: " . $sql . "<br>" . $conn->error);
    } else {
        echo("Poprawnie dodano");
    }
}
CloseCon($conn);
// header("location:.");
?>