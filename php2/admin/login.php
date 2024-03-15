<?php
include "funktionen.php";
//wurde das formular abgeschickt
//print_r($_POST);
if (! empty($_POST)) {
    //validierung
    if (empty ($_POST["benutzername"]) || empty($_POST["passwort"])) {
        $error = "Benutzername oder Passwort ist leer";
    } else {
        //Benutzername und Passwort werden übergeben
        //-->in der DB nachsehen ob der Benutzer existiert

        //diese funktion bewahrt uns vor jeglicher sqli injection
        //alle Daten aus $_Post u. $_GET (alle benutzer bzw. formulardaten)
      //$sql_benutzername =  mysqli_real_escape_string($db, $_POST["benutzername"]);
      sql_benutzername = escape($_POST["benutzername"]);

       //Datenbak zugriff und abfrage
       $result = mysqli_query($db, "SELECT * FROM benutzer WHERE benutzername = '$sql_benutzername'");
       
    //print_r($result);
         //Datensatz aus mysqli in ein Array umwandeln
         $row = mysqli_fetch_assoc($result);

    //print_r($row);
    if ($row) {
        //benutzer existiert ->Passwort prüfen

        if (password_verify($_POST["passwort"], $row["passwort"])) {
            //Passwort ist richtig
            //Session starten
           $_SESSION["eingeloggt"] = true;
           $_SESSION["benutzername"] = $row["benutzername"];

           //Anzahl login in DB speichern
           mysqli_query($db, "UPDATE benutzer SET 
                      anzahl_logins = anzahl_logins + 1,
                      letzte_logins = NOW() 
                      WHERE id = {$row["id"] } ");

         
          

           //umleitung in admin-system
              header("Location: index.php");
              exit;
        } else {
            //passwort war falsh
            $error = "Benutzername oder Passwort ist falsch";

        }
           
        } else { 
            //Benutzername wurde nicht in der DB gefunden
            $error = "Benutzername oder Passwort ist falsch";
        }
    }
}
/* session_start();
            $_SESSION["benutzername"] = $row["benutzername"];
            $_SESSION["benutzer_id"] = $row["id"];
            //weiterleitung auf die Startseite
            header("Location: index.php");
        } else {
            //Passwort ist falsch
            $error = "Benutzername oder Passwort ist falsch";*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich zur Rezepteverwaltung</title>
</head>
<style>
    body {
        background-color: "blue";
    }
</style>
<body>
    <h1>Loginbereich zur Rezepteverwaltung</h1>
    <?php
    if (! empty($error)) {
        echo "<p>$error</p>";
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
