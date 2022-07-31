<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

    <form action='insert_donation.php' method='post'>
    <h2>Dodaj donację</h2>
        <input type='text' name='pesel' placeholder='PESEL KRWIODAWCY'>
        <?php
        include "open_db.php";
        $conn = OpenCon();
        if(!$conn){
            echo("problem in reading database");
        }

        $oddzial = $conn->query('SELECT miasto FROM oddzial');
        
    ?>
        <select type="text" name="oddzial" id="oddzial" >;      
    <?php
        while($row = $oddzial->fetch_assoc())
        {   
            echo "<option type='text' value='$row[miasto]' name='oddzial'>$row[miasto]</option>"; //dodaje wiersz z zawartością danych komórek
        }
    ?>
       </select>

       <select type='text' name='pracownik' id='pracownik'>
    <?php
        $pracownicy = $conn->query("SELECT pracownik_nazwisko FROM pracownicy");
        while($row = $pracownicy->fetch_assoc())
        {   
            echo "<option type='text' value='$row[pracownik_nazwisko]' name='oddzial'>$row[pracownik_nazwisko]</option>"; //dodaje wiersz z zawartością danych komórek
        }
    ?>  
        </select>
        <input type='text' name='ml' placeholder='ML'>
        <button id="action_button" type=submit name=submit>DODAJ</button>
    </form>
</body>
</html>
