<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eigene Funktionen</title>
</head>
<body>
    <h1>Eigene Funktionen</h1>
    <?php
    //funktion zum Umrechnen von °C in °F
    //Formel: °F = °C * 1.8 + 32
function celsius_in_fahrenheit($celsius){
    $fahrenheit = $celsius * 1.8 + 32;
    return $fahrenheit;
}
    //todas son correctas 
    //$grad = 20;
    echo celsius_in_fahrenheit(0);
    echo "<br/>";
    echo celsius_in_fahrenheit(15);
    echo "<br/>";
    echo celsius_in_fahrenheit(-30);
    echo "<br/>";
    
    //Datum neu Formatieren
    //Ziel: 24.02.2024
    //beispiel 1
    $datum_mysql = "2024-02-24";
    function de_datum($datum_falsch){
        $tag = substr($datum_falsch, 8, 2);
        $monat = substr($datum_falsch, 5, 2);
        $jahr = substr($datum_falsch, 0, 4);
        return $tag . "." . $monat . "." . $jahr; 
    }
    echo de_datum($datum_mysql);
    echo "<br/>";

    //beispiel 2
    function de_datum_mit_date($datum_falsch) {
        $time = strtotime($datum_falsch);
        $d = date("d.m.Y", $time);
        return $d;
        return date_format($d, "d.m.Y");
    }
    echo de_datum_mit_date($datum_mysql);
    echo "<br/>";

    //Datum formatieren weitere variante
    function de_datum_weitere($datum_falsch){
        $teile = explode ('-', $datum_falsch);
        return $teile[2] . "." . $teile[1] . "." . $teile[0];
       
    }
    echo de_datum_weitere($datum_mysql);
    echo "<br/>";

    //Text nach 10 zeichen abschneiden und "..." anhängen
    $text = "lorem ipsum dolor";   
    echo "<br/>";
    /*function text_verkurz($text) {
        if (strlen($text) >= 10) {
            return substr ($text, 0, 10) . "..."
        } else {
            return $text;
        }
    }*/
    echo "<br/>";
    //1234567890 => 1234567890
    //123456789012345678 => 1234567890...
    function text_abschneiden($text_lang, $lange = 10){
        //$lange = 15;
        if (strlen($text_lang) >= $lange){
            $text_kurz = substr($text_lang, 0, $lange);
            return $text_kurz . "...";
        } else {
            return $text_lang;
        }
    }
    $text = "lorem ipsum dolor";
    echo $text;
    echo "<br/>";
    echo text_abschneiden($text);
    echo "<br/>";
    echo text_abschneiden($text);
    echo "<br/>";
    echo text_abschneiden($text, 45);
    echo "<br/>";
    echo text_abschneiden($text, 13);



    ?>
    
</body>
</html>