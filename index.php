<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="style.css">
</head>	
<body>
<img id='logo' src="logo.png"> 
<div id='menu'>
  
<?php

echo("<button onclick=\"location='?id=dodaj_krwiodawce'\">DODAJ KRWIODAWCĘ</button>
<button onclick=\"location='?id=dodaj_donacje'\">NOWA DONACJA</button>
<button onclick=\"location='?id=wyszukaj_dawce'\">WYSZUKAJ KRWIODAWCĘ</button>
<button onclick=\"location='?id=wyszukaj_donacje'\">WYSZUKAJ DONACJĘ</button>");
?>

<div id='zawartosc'>

<?php
if($_GET)
{
    if($_GET['id']=='dodaj_krwiodawce')
		include 'create_donor.html';
    else  if($_GET['id']=="dodaj_donacje")
		include "create_donation.php";
    else if($_GET['id']=='wyszukaj_dawce')
		include "search_donor.php";
    else if($_GET['id']=='wyszukaj_donacje')
		include "search_donation.php";
    else 
		include "index.php";
}
?>
</div> 
</div>
</body>
</html>
