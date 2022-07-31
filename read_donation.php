<link rel="stylesheet" href="style.css">
<?php
include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

if($_POST){
    $wartosc_podana = $_POST['wartosc'];
    $co = $_POST['co'];
    switch($co)
    {
        case "pesel":
            $co = 'krwiodawca_id';
            $result = mysqli_query($conn,"SELECT `id_krwiodawcy` FROM `krwiodawca` WHERE pesel = '$wartosc_podana'" );
            while ($row = $result->fetch_assoc())
            {
                $wartosc = $row['id_krwiodawcy'];
            }
            break;
        case "data_donacji":
            $co = 'kiedy';
            $wartosc = $wartosc;
            break;
        case "pracownik_nazwisko":
            $co = 'pracownik_id';
            $result = mysqli_query($conn,"SELECT `id_pracownika` FROM `pracownicy` WHERE pracownik_nazwisko = '$wartosc_podana'" );
            while ($row = $result->fetch_assoc())
            {
                $wartosc = $row['id_pracownika'];
            }
            break;
        case "oddzial":
            $co = 'oddzial_id';
            $result = mysqli_query($conn,"SELECT `id_oddzialu` FROM `oddzial` WHERE miasto = '$wartosc_podana'" );
            while ($row = $result->fetch_assoc())
            {
                $wartosc = $row['id_oddzialu'];
            }
            break;
        default:
            $wartosc = "0";
            $co = "id_donacji";
            break;
    }
}
else
{
    $wartosc = "0";
    $co = "id_donacji";
}

$result = mysqli_query($conn,"SELECT * FROM `donacja` WHERE $co = '$wartosc'");

echo "<table id='results'>";
echo "<tr><th>Id donacji<th>Krwiodawca</th><th>Data</th><th>Pracownik</th><th>Oddział</th><th>Ml</th><th>Wyniki</th>"; //tworzy nagłówki kolumn

while ($row = $result->fetch_assoc()) {
    $imie_q = $conn -> query("SELECT krwiodawca_imie, krwiodawca_nazwisko FROM krwiodawca WHERE id_krwiodawcy = '$row[krwiodawca_id]'");
    $pracownik_q = $conn -> query("SELECT pracownik_nazwisko FROM pracownicy WHERE id_pracownika = '$row[pracownik_id]'");
    $oddzial_q = $conn -> query("SELECT miasto FROM oddzial WHERE id_oddzialu = '$row[oddzial_id]'");
    while($imie=$imie_q->fetch_assoc())
        while($pracownik=$pracownik_q->fetch_assoc())
            while($oddzial=$oddzial_q->fetch_assoc())
    {
    echo "<tr onclick=\"location='?id=$row[id_donacji]'\">
			<td>$row[id_donacji]</td>
			<td>$imie[krwiodawca_imie] $imie[krwiodawca_nazwisko]</td> 
			<td>$row[kiedy]</td>
			<td>$pracownik[pracownik_nazwisko]</td>
			<td>$oddzial[miasto]</td>
            <td>$row[ml]</td>";

            $results = mysqli_query($conn, "SELECT * FROM `wyniki` WHERE `id_wynikow` = '$row[id_donacji]'");
            if($results->num_rows > 0)
            {
                echo("<td>TAK</td></tr>");
            }
            else{
                echo("<td>NIE</td></tr>");
            }
    }
}

echo "</table>";

if($_GET)
{
    if(intval($_GET['id']))
		include "add_results.php";
}

CloseCon($conn);   
?>