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
     




    ?>
</body>
</html>