<?php

include "setup.php";

use WIFI\Php3\Fdb\Validieren;
use WIFI\Php3\Fdb\Mysql;

//wurde das formular abgeschickt

if (! empty($_POST)) {
    //validierung
    $validieren = new Validieren();
    $validieren -> ist_ausgefuellt($_POST["benutzername"], "Benutzername");
    $validieren -> ist_ausgefuellt($_POST["passwort"], "Passwort");

    //wenn keine fehler aufgetreten sind
    if (!$validieren->fehler_aufgetreten()) {
        //witere machen mit einloggen
        
        $db = new Mysql();
        $sql_benutzername = $db->escape($_POST ["benutzername"]);
        $ergebnis = $db->query("SELECT * FROM benutzer WHERE benutzername = '{$sql_benutzername}'");
        $benutzer = $ergebnis -> fetch_assoc();
        //echo "<pre>"; print_r($benutzer); echo "</pre>";

        if (empty($benutzer)|| !password_verify($_POST["passwort"], $benutzer["passwort"])) {
            //fehler: eingegebener benutzer existiert nicht
            $validieren->fehler_hinzu("Benutzer oder Passwort war falsch.");
       } else {
              //alles ok -> einloggen
              $_SESSION["eingeloggt"] = true;
              $_SESSION["benutzername"] = $benutzer["benutzername"];
              $_SESSION["benutzer_id"] = $benutzer["id"];

              //umleitung zum Admin-System
              header("Location: index.php");
              exit;
       }
}
}






    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich zur Fahrezeug-DB</title>
</head>
<style>
    body {
        background-color: beige;
    }
    h1{
        color: purple;
        text-align: center;
    }
    
    form {
    background-color: lightblue;
    width: 50%;
    padding: 20px;
    margin: 0 auto;
    border: 5px solid grey;
    border-radius: 5px;
    color: purple;
    font-size: 20px;
    
    }
</style>
<body>
    <h1>Loginbereich zur Fahrezeug-DB</h1>
    <?php
    if (! empty($validieren)) {
        echo $validieren->fehler_html();
    }
    ?>
    <form action="login.php" method= "post">
        <div>
            <label for="benutzername">Benutzername</label>
            <input type="text" name="benutzername" id="benutzername" placeholder="">
        </div>
        <div>
            <label for="passwort">Passwort</label>
            <input type="password" name="passwort" id="passwort" placeholder="">
        </div>
        <div>
            <button type="submit">Einloggen</button>
        </div>
    </form>
    
</body>
</html>