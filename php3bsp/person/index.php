<?php
//klassedefinition einbinden
include 'person.php';

//Objekt erzeugen aus der Klasse "Person"
//Instanzieren / Instanz erstellen
$ich = new Person('Markus'); 
echo $ich->vorstellen();
echo "<br>";

$ich ->set_vorname('Andrea');
echo $ich->get_vorname();
echo "<br>";


//weiteres Objekt erstellen
$sie = new Person('Sabrina');
echo $sie->vorstellen();
echo "<br>";
