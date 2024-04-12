<?php

//Konfiguration für das Projekt
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORT = "";
const MYSQL_DATENBANK = "php3";

//setup-code: Nur verändern wenn du weißt, was du tust.
session_start();

function ist_eingeloggt() {
    if (empty ($_SESSION["eingeloggt"])) {
        //benutzer nicht eingeloggt->umleiten zu login
        header("Location: login.php");
        exit;
    }
}
spl_autoload_register(
    function(string $klasse) {
        //Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\Php3\\";

        //Basisverzeichnis für das Projekt
        $basis = __DIR__ . "/";
       
        
        //Wenn ie Klasse das Prefix nicht verwendet, abbrechen
        //(Wir sind nicht für das Laden von Dateien anderer Projekte verantwortlich)
        
        $laenge = strlen($prefix);
        if (substr($klasse, 0, $laenge) !== $prefix) {
            return;
    }
    //Klassenname ohne Prefix
    $klasse_ohne_prefix = substr($klasse, $laenge);

    //Dateipfad erstellen
    $datei = $basis . $klasse_ohne_prefix . ".php";
    $datei = str_replace("\\", "/", $datei);

    //Wenn die Datei existiert, einbinden
   if (file_exists($datei)) {
       include $datei;
   }
   else {
       echo "Datei $datei nicht gefunden!";
   }

  }
);