<link rel="stylesheet" href="style.css">
<style>
    table{
        visibility: hidden;
    }
</style>
<?php
    $id=intval($_GET['id']);;
    $wynik=$conn->query("SELECT * FROM krwiodawca WHERE id_krwiodawcy ='$id'");
	$row=$wynik->fetch_assoc();
?>
<form action='data_edit.php' method='post'>
    <h2>Edytuj dawcę</h2>
        <input type="hidden" name='idk' value='<?=htmlentities($row['id_krwiodawcy'])?>'>
        <input type='text' name='imie' value='<?=htmlentities($row['krwiodawca_imie'])?>'>
        <input type='text' name='nazwisko' value='<?=htmlentities($row['krwiodawca_nazwisko'])?>'>
        <select type='varchar' name="plec" id="plec" value='<?=htmlentities($row['plec'])?>'>
            <option type='varchar' value="K">KOBIETA</option>
            <option type='varchar' value="M">MĘŻCZYZNA</option>
        </select>
        <input type='text' name='pesel' value='<?=htmlentities($row['pesel'])?>' >
        <input type='date' name='data_urodzenia' value='<?=htmlentities($row['data_urodzenia'])?>'>
        <select type='text' name="grupa_krwi" id="grupa_krwi" >
            <option type='text' value='<?=htmlentities($row['grupa_krwi'])?>'></option>
            <option type='text' value="ARh+">ARh+</option>
            <option type='text' value="ARh-">ARh-</option>
            <option type='text' value="BRh+">BRh+</option>
            <option type='text' value="BRh-">BRh-</option>
            <option type='text' value="ABRh+">ABRh+</option>
            <option type='text' value="ABRh-">ABRh-</option>
            <option type='text' value="0Rh+">0Rh+</option>
            <option type='text' value="0Rh-">0Rh-</option>
        </select>
        <input type='text' name='miasto' value='<?=htmlentities($row['miasto'])?>'>
        <input type='text' name='adres' value='<?=htmlentities($row['adres'])?>'>
        <input type='text' name='telefon' value='<?=htmlentities($row['telefon'])?>'>
        <input type=submit name=co value='Zapisz'>
	    <input type=submit name=co value='Usun'>
	    <input type=submit name=co value='Anuluj'>
</form>
