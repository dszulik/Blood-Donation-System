<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="read_donor.php" method="post">
        <h2> Wyszukaj dawcę</h2>
        <input type="text" id = "wartosc" name="wartosc" placeholder="WPISZ WYSZUKIWANĄ WARTOŚĆ"><br>

    <select name="co" id="co">
        <option value="krwiodawca_imie">Imię</option>
        <option value="krwiodawca_nazwisko">Nazwisko</option>
        <option value="plec">Płeć</option>
        <option value="pesel">Pesel</option>
        <option value="data_urodzenia">Data urodzenia</option>
        <option value="grupa_krwi">Grupa krwi</option>
        <option value="miasto">Miasto</option>
        <option value="adres">Adres</option>
        <option value="telefon">Telefon</option>
	</select><br>
    <button id="action_button" type=submit name=submit>WYSZUKAJ</button>
</form>

</body>
</html>