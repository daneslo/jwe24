<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen für Arrays</title>
</head>
<body>
    <h1>Funktionen für Arrays</h1>
    <?php
    $namen = array("Peter", "Franziska", "Mario", "Katharina", "Franziska", "Christian", "Katharina", "Markus");

    //Elemente (werte) in einem Array zählen
    echo count($namen);
    echo "<br/>";

    //Zufälligen Namen ausgeben
    //echo array_rand($namen);
    $index = array_rand($namen);
    echo $index;
    echo "<br/>";
    echo $namen[$index];//muestra el nombre que indica el index
    
    echo "<pre>";
    print_r($namen);
    echo "</pre>";
    echo count($namen);

    //Doppelten Namen entfernen
    $eindeutig = array_unique(
        $namen
    );
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    echo count($eindeutig);

    echo "<br/>";
    //beispiel 1
    $gesuchtrName = "Heidi";
    if (in_array($gesuchtrName, $eindeutig))
    {
        echo "Namen" . $gesuchtrName . "Gefunden";
    }else {
        echo "Nicht gefunden";
    }
    echo "<br/>";
    //Prüfen ob ein Wert im Array existiert
    
    if (in_array ("Markus", $eindeutig))
    {
        echo "Gefunden";
    }else {
        echo "Nicht gefunden";
    }

    //Aufsteigen nach Namen sortieren
    asort($eindeutig);
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";

    //Wert im Nachhinein hinzufügen
    $eindeutig[] = "Herbert";
    array_push($eindeutig, "Julia", "Fritz"); //to add more names
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";

    //Sortieren und Indizies neu zuweisen
    sort($eindeutig);
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";



    ?>
</body>
</html>