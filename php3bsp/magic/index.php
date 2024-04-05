<?php
error_reporting(E_ALL);

include 'magic.php';

$m = new Magic ();

//Magic Method: __set()
$m->vorname = "Maria";
$m->nachname = "Hauser";

//Magic Method: __get()
echo $m->nachname;
echo "<br>";

//Magic Method; __call()
$m->speichern("benutzer", "insert", 5);

//Magic Method: __toString()
echo $m;

