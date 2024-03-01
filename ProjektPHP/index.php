

<?php
//primero va a leer de arriba hacia abajo y despues de izquierda a derecha 
if (empty($_GET["seite"]) ){
    $site = "home";
} else {
    $site = $_GET["seite"];
}


if ( $site == "home"){
    $include_datei = "home.php";
    $seitentitel = "Frisseur erzeugt kurze Haare";
    $description = "p";
} elseif ($site == "leistungen") {
    $include_datei = "leistungen.php";
    $seitentitel = "Gunstiger Preis";
    $description = "u";
} elseif ($site == "oeffnungszeiten") {
    $include_datei = "oeffnungszeiten.php";
    $seitentitel = "Immer für Sie da";
    $description = "t";
} elseif ($site == "kontakt") {
    $include_datei = "kontakt.php";
    $seitentitel = "Fragen Sie uns";
    $description = "o";
} else {
    //seite gibt es bei uns nicht (mehr) -> error ausgeben
    $include_datei = "error404.php";
}



//$include_datei = "leistungen.php"; 
//asi se puede agregar tambien haciendo una variable


include "kopf.php";

include "inhalte/" . $include_datei;

include "fuss.php";

?>