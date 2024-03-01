<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops mit PHP</title>
</head>
<body>
    <h1>Schleifen</h1>
    <?php
    //limitiert Ausführungszeit auf 1 sekunde
    set_time_limit(1);

    //1-10 ausgeben mit einer while-schleife
    $zahl = 1;
    while ($zahl <= 10){
        echo $zahl++ . " ";
    }

    echo "<br/>";
    echo "<br/>";

    //array der reihe nach ausgeben mit foreach
    $staedte = array("Bregenz", "Innsbruck", "Salzburg", "Klagenfurt", "Linz", "Graz", "St.Polten", "Wien", "Eisenstadt");
    asort($staedte);
    foreach ($staedte as $index => $stadt) {
        echo $index . " ";
        echo $stadt;
        echo "<br/>";
    }

    for ($i = 1; $i < 50; $i++){
        if ($i == 3)continue;
        if ($i >= 10)break;
        echo $i;
    }
    ?>
</body>
</html>