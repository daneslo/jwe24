<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    
    <title>Funktionen mit PHP</title>
</head>
<body>
    <h1>Funktionen für Strings</h1>
    <?php
     //String in kleinbuchstaben umwandeln
     $text = " Herzlich Willkömmen ";

     echo "<pre>";
     echo strtolower($text);
     echo "</pre>";

     echo "<br/>";

     //leerzeichen vor/nach einem text entfernen
     echo "<pre>";
     echo trim($text, "n e");
     echo "</pre>";
     
     //HTML-Tags aus einem String entfernen
     $text = "Das ist <strong>fett</strong> und <em>kursiv</em>.";
     echo $text. "</br>";
     echo strip_tags($text, "<strong>");

     echo "<br/>";

     //Länge eines Strings zählen
     echo strlen($text);
     echo "<br/>";
     echo mb_strlen($text, "utf-8");
     echo "<br/>";

     //teil aus einem extahieren
     $text = "Ich bin 43 Jahre alt.";
     echo substr($text, 8,2); //die zweite parameter ist der start und die dritte die lange
     echo "<br/>";


    // zeileumbrüche in <br/> umwandeln
     $text = "Herzlich Willkomen
     im WIFI
     Salzburg";
     echo nl2br($text);//le da espacio al texto




    ?>
</body>
</html>