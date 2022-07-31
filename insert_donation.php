<?php
include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

$pesel = $_POST['pesel'];
$kto = $conn->query("SELECT id_krwiodawcy FROM krwiodawca WHERE pesel = '$pesel'");
$kiedy = date("Y/m/d");
$miasto = $_POST['oddzial'];
$oddzial = $conn->query("SELECT id_oddzialu FROM oddzial WHERE miasto = '$miasto'");
$pracownik = $_POST['pracownik'];
$pobierajacy = $conn->query("SELECT id_pracownika FROM pracownicy WHERE pracownik_nazwisko = '$pracownik'");
$ml = $_POST['ml'];

$qry = "";

while ($dawca = $kto->fetch_assoc())
    while($gdzie = $oddzial->fetch_assoc())
        while($pracownik = $pobierajacy->fetch_assoc())
{
    $qry = "INSERT INTO `donacja`(`krwiodawca_id`, `kiedy`, `pracownik_id`, `oddzial_id`, `ml`) VALUES ('$dawca[id_krwiodawcy]', '$kiedy' ,'$pracownik[id_pracownika]','$gdzie[id_oddzialu]', '$ml')";
}

$insert = mysqli_query($conn, $qry);

if(!$insert){
    echo("Error: " . $sql . "<br>" . $conn->error );
} else {
    echo("Poprawnie dodano");
}

CloseCon($conn);
?>