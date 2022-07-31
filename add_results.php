<!DOCTYPE html>
<html>
<style>
    table{
        visibility: hidden;
    }
    #result_add_button
    {
    position: absolute;
    top: 35%;
    left: 40%;
    }
</style>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$id=intval($_GET['id']);
?>
<body>
    <form action='insert_results.php' method='post'>
        <h2>Dodaj wyniki</h2>
        <?php
            $id=intval($_GET['id']);
            echo("<input type='hidden' name='id' value='$id'>")
        ?>
        <input type='text' name='hgb' placeholder='HGB'>
        <input type='text' name='hct' placeholder='HCT'>
        <input type='text' name='rbc' placeholder='RBC'>
        <input type='text' name='wbc' placeholder='WBC'>
        <input type='text' name='plt' placeholder='PLT'>
        <button id="result_add_button" type=submit name=submit>DODAJ</button>
    </form>
</body>
</html>