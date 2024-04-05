<?php
include "kreis.php";


$k = new Kreis(3);

echo "Fläche: " . $k->flaeche() . "<br>";

echo "Durchmesser: " . $k->durchmesser() . "<br>"; //2 * r

echo "Umfang: " . $k->umfang() . "<br>"; //2 * r * PI //d * PI

$k->set_radius(5);
echo "Durchmesser NEU: " . $k->durchmesser() . "<br>"; 

$benutzer_eingabe = 1;

//Wird in einem Try-Block eine Exception geworfen
//hat mam mit "catch" die Möglichkeit darauf zu reagieren.
try {
    $k->set_radius($benutzer_eingabe);
echo "Durchmesser zum Schluss: " . $k->durchmesser() . "<br>";
} catch (Exception $ex) {
    //Fängt alle exception objekte ab, die im try-block
    //gewürfen wurden: throw new Exception("..")
    echo "Da war was falsch: " . $ex->getMessage();
    echo "<br>";
} finally {
    //Dieser Code wird in jedem Fall ausgeführt.
    echo "Das wars wohl.";
    echo "<br>";
}

unset($k);

echo "Letzte Ausgabe<br>";