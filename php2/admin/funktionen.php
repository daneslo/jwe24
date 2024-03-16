<?php

//ist notwendig um auf die $_SESSION zur Verfügung zu haben.
session_start();


//verbindung zur datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "php2");
//MySQLI mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");

//funtion für mysqli_query
function query ($sql_befehl) {
    global $db; //keyword global um die $DB variable
    $result = mysqli_query($db, $sql_befehl) or die(mysqli_error($db) . "<br/>" . $sql_befehl);
    
    return $result;
}
//funktion um SQL-Injections zu vermeiden
function escape($post_var) {
    global $db; //keyword global um die 4DB Variable vom globalen scope zu übernehmen
    return mysqli_real_escape_string($db, $post_var);
}

//dies funktion überprüft ob der benutzer eingeloggt ist
//Falls nicht, dann wird er automatisch auf die Login-Seite umgeleitet
function ist_eingeloggt() {
    if (empty($_SESSION["eingeloggt"])) {
        header("Location: login.php");
        exit; //beendet das Skript, damit der teil darunter nicht mehr zum browser geschickt wird.
    }
}