<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if-Abfrage</title>
</head>
<body>
    <h1>If-Abfrage</h1>
    <?php
    //0-5:Schlaft gut!
    //6-9: Guten Morgen
    //12/18: Mahlzeit
    //19-23: Gute Nach
    //sonst: Hallo

    $stunde = date("G");

    if ($stunde <= 5) {
        echo "Schlaft gut";
    } else if ($stunde >= 6 && $stunde <= 9) {
        echo "Guten Morgen";
    } else if ($stunde == 12 || $stunde == 18) {
        echo "Mahlzeit";
    } else if ($stunde >= 19) {
        echo "Gute Nacht";
    }
     else {
        echo "Hallo";
    }

    
    




    ?>
</body>
</html>