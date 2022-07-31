<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="read_donation.php" method="post">
    <h2>Wyszukaj donację</h2>
        <input type="text" id = "wartosc" name="wartosc" placeholder="WPISZ WYSZUKIWANĄ WARTOŚĆ"><br>

    <select name="co" id="co">
        <option value="pesel">Pesel krwiodawcy</option>
        <option value="data">Data donacji </option>
        <option value="pracownik_nazwisko">Nazwisko pracownika</option>
        <option value="oddzial">Oddział</option>
	</select><br>
    <button id="action_button" type=submit name=submit>WYSZUKAJ</button>
</form>

</body>
</html>