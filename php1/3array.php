<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        //php kann uberall stehen!
        echo "Array mit PHP";
        $cssClass = "red";
        ?></title>
</head>
<body class= "<?php echo $cssClass; ?>">
    
    <?php
    echo "<h1>Array mit PHP</h1>";
    ?>
    
    <?php
    //Numerische Array definieren
    $namen = array("Katharina","Jonathan", "Julia", "Peter");
    //Katharina und Julia
    echo $namen[0] . " und " . $namen[2];
    echo "<br/>";

    echo "<br/>";
    


    //Wert im Nachhinein an das Array anhängen
    $namen[] = "Mario";

    //index als variable
    $index = 3;
    echo $namen[$index+1];
    echo "<br/>";

    //Print the list of names with the value number
    echo "<pre>";
    print_r($namen);
    echo "</pre>";

    //Asoziatives Array definieren (index ist ein Text)
    $person = array(
        "name" => "Markus",
        "alter" => 63,
        "ort" => "Salzburg"

    );
    echo "<pre>";
    print_r($person);
    echo "</pre>";
    //Ausgabe: "Markus" (63) aus Salzburg 
    
    echo $person["name"] . "( "; //space
    echo $person["alter"] . ") ";
    echo "aus " . $person["ort"];
    echo "<br/>";

    echo "{$person ["name"]} ({$person["alter"]}) aus {$person["ort"]}";
    echo "<br/>";
    echo $person["name"] . " (" . $person ["alter"] . " ) aus " . $person["ort"];
    ?>

    <?php
    //im nachhinein einen wert dem array anfungen
    $person["guthaben"] = 100;
    /*
    echo "<pre>";
    print_r($person);*/

    //Mehrere dimensionen Array
    $personen = array ( //numeric array
        array( //asociatives array
            "name" =>"Herbert",
        "alter" => 33,
        "ort" => "Linz"
        ),
        array(
            "name" => "Sarah",
            "alter" => 27,
            "ort" => "Salzburg"
        ),
        $person
    );
    echo "<pre>";
    print_r($personen);
    echo "</pre>";

    echo $personen[0]["ort"];
    echo "<br/>";

    //Ich bin Herbert bin 27 und habe ein Guthaben von 100

    echo "Ich bin " . $personen[0] ["name"] . " bin " . $personen[1]["alter"] . "und habe ein Guthaben von " . $personen [2]["guthaben"];

    ?>
    
  </body>
</html>