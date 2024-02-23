<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen mit PHP</title>
</head>
<body>
    <h1>Variable mit PHP</h1>
    <?php 
    //Ganzzahl ( integer) definieren
    $alter = 47;
    // result ich bin 47 using variable
    echo "Ich bin ";
    echo $alter;
    echo "<br/>";

    //Kommazahl (float) definieren und ausgeben
    $kontostand = 9.81;
    echo "Meine Kontostand ist ";
    echo $kontostand;

    echo "<br/>";
    //text (string) eine variable zuweisen und ausgeben
    $name = "Daniela";
    //ich heiße Daniela
    echo "Ich heiße $name";
    echo "<br/>";
    echo'Ich heiße ';
    echo $name;
    echo "<br/>";
    echo 'Ich heiße ' . $name ;
    echo "<br/>";
    //ich habe Daniela Stift.
    echo 'Ich habe ' . $name . 's Stift.';
    echo "<br/>";

    //Datentyp: boolean (kurz: bool)
    $wahr = true;
    echo ">" . $wahr . "<";
    echo "<br/>";

    $falsch = false;
    echo ">" . $falsch . "<";
    echo "<br/>";

    //null: "nichts" oder "undefiniert"
    $nichts = null;
    echo ">". $nichts . "<";
    echo "<br/>";

    //Eine Konstante definieren und verwenden
    define("datenbank", "php23");
    echo datenbank;
    echo "<br/>";
    //Neuere Schreibweise
    const datenbank2 = "php24";
    echo datenbank2;
    echo "<br/>";


    

    ?>
</body>
</html>