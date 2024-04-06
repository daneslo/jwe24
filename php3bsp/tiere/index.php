<?php

//Der Autoloader erhält Klassennamen (mmit namespace), die noch nicht includet wurden.
//Diesen könne wir in einen Dateipfad umwandeln und die Datei danach einbinden.
//Wird für jede Klasse bei der ersten Verwendung automatisch aufgerufen.
spl_autoload_register(
    function(string $klasse) {
        //Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\JWE\\";

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

use WIFI\JWE\Tier\Hund\Dogge;
use WIFI\JWE\Tier\Katze;
use WIFI\JWE\Tier\Maus;
use WIFI\JWE\Tiere;

$dogge = new Dogge("Spike");
$katze = new Katze("Tom");
$maus = new Maus("Jerry");


$tiere = new Tiere();
$tiere->add($dogge);
$tiere->add($katze);
$tiere->add($maus);
$tiere->add(new Maus("Mickey"));

echo $tiere->ausgabe();

foreach($tiere as $tier) {
      echo "<br>";
      echo $tier->get_name();
}
