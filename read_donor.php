<link rel="stylesheet" href="style.css">
<?php
include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

if($_POST){
    $wartosc = $_POST['wartosc'];
    $co = $_POST['co'];
}
else{
    $wartosc = "0";
    $co = "id_krwiodawcy";
}

$result = mysqli_query($conn,"SELECT * FROM krwiodawca WHERE $co = '$wartosc'");
?>
<table id='results'>
<?php
echo "<tr><th>Id<th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Pesel</th><th>Grupa krwi</th><th>Data urodzenia</th><th>Miasto</th><th>Adres</th><th>Telefon</th><th>Status</th>"; //tworzy nagłówki kolumn

while ($row = $result->fetch_assoc()) {
    echo "<tr onclick=\"location='?id=$row[id_krwiodawcy]'\">
			<td>$row[id_krwiodawcy]</td>
			<td>$row[krwiodawca_imie]</td> 
			<td>$row[krwiodawca_nazwisko]</td>
			<td>$row[plec]</td>
			<td>$row[pesel]</td>
			<td>$row[grupa_krwi]</td>
            <td>$row[data_urodzenia]</td>
            <td>$row[miasto]</td>
            <td>$row[adres]</td>
            <td>$row[telefon]</td>";

            $date = mysqli_query($conn, "SELECT DATEDIFF(CURDATE(), (SELECT MAX(kiedy) FROM donacja WHERE krwiodawca_id = '$row[id_krwiodawcy]'))" );

            while($row2 = $date->fetch_row())
            {
                if($row2[0] > 90 && $row['plec']=='K')
                {
                    echo("<td id=green>$row2[0]</td></tr>");
                }
                else if($row2[0] < 90 && $row['plec']=='K')
                {
                    echo("<td id=red>$row2[0]</td></tr>");
                }
                else if($row2[0] < 60 && $row['plec']=='M')
                {
                    echo("<td id=red>$row2[0]</td></tr>");
                }
                else if($row2[0] > 60 && $row['plec']=='M')
                {
                    echo("<td id=green>$row2[0]</td></tr>");
                }
            }    
}
echo("</table>");

if($_GET)
{
    if(intval($_GET['id']))
		include "edit_donor.php";
}

CloseCon($conn);  
?>