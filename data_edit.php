<?php

include 'open_db.php';
$conn = OpenCon();
if(!$conn){
    echo("problem in reading database");
}

	foreach($_POST as $x=>$y)
		$r[$x]=$conn->real_escape_string($y);
	switch($_POST['co'])
	{
		case 'Usun':   
			$conn->query("DELETE FROM krwiodawca WHERE id_krwiodawcy=$r[idk]");
			break;
		case 'Zapisz': 
			$sql = "UPDATE `krwiodawca` SET 
			`id_krwiodawcy`='$r[idk]',
			`krwiodawca_imie`='$r[imie]',
			`krwiodawca_nazwisko`='$r[nazwisko]',
			`plec`='$r[plec]',
			`pesel`='$r[pesel]',
			`grupa_krwi`='$r[grupa_krwi]',
			`data_urodzenia`='$r[data_urodzenia]',
			`miasto`='$r[miasto]',
			`adres`='$r[adres]',
			`telefon`='$r[telefon]'
			 WHERE `id_krwiodawcy`='$r[idk]'";
			mysqli_query($conn, $sql);
		break;						 
	}

header("location:.");
