<?php

include "setup.php";
ist_eingeloggt();
use WIFI\Php3\Fdb\Model\Row\Fahrzeug;


include "kopf.php";

echo "<h1>Fahrzeug Entfernen</h1>";

$fahrzeug = new Fahrzeug($_GET ["id"]);



if(!empty($_GET["doit"])) {
    //Bestätigungslink wurde geclickt-> wirklich in BD löschen
    $fahrzeug->entfernen();

    echo "<p> Fahrzeug wurde erfolgreich entfernt.<br> 
    <a href='fahrzeuge_liste.php'>Zurück zur Liste</a></p>";
    
} else {
    //Benutzer fragen, ob die FAHRZEUG wirklich entfernt werden soll
    echo "<p>Sind Sie sicher, dass Sie das Fahrzeug entfernen möchten?</p>";
    echo"<strong>Kennzeichnen: </strong>". $fahrzeug->kennzeichen ."<br>";
    echo"<strong>Marke: </strong>". $fahrzeug->get_marke()->hersteller."<br>";
    echo"<strong>Farbe: </strong>". $fahrzeug->farbe ."<br>";
    echo"<strong>Baujahr: </strong>". $fahrzeug->baujahr ."<br>";
    echo "<p>"

    . "<a href='fahrzeuge_liste.php'>Nein, zurück zur Liste</a> <br>"
    . "<a href='fahrzeuge_entfernen.php?id={$fahrzeug->id}&amp;doit=1'>Ja, entfernen</a> <br> "
    . "</p>";


}

include "fuss.php";

