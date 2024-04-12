<?php

session_start();

//veiner dieser drei befehle würde schon reichen 
unset($_SESSION["eingeloggt"]);

//löscht alle Session variablen
session_unset();

//vernichtet die Session samt Cookies
session_destroy();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus der Fahrzeug-BD</title>
</head>
<body>
    <h1>Logout aus der Fahrzeug-BD</h1>
    <p>Sie wurden ausgeloggt. </p>
    <p><a href="login.php">Hier gehts züruck nach login </p>
</body>
</html>
<?php
include "fuss.php";
?>