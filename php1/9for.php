<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For-Schleifen</title>
</head>
<body>
    <h1>For mit PHP</h1>
    <?php
    echo "<table border='1'>";
    for ($zeile = 1; $zeile <=10; $zeile++) {
        if ($zeile == 6)continue;
        echo "<tr>";
    for ($spalte=1; $spalte <= 10; $spalte++) {
        echo "<td>";
        
        //division durch 7 : wenn nicht (!=)0,
        //dann wird die zelle mit einem Wert befüllt
        if (($spalte * $zeile) % 7 != 0 ) echo $spalte * $zeile;
        echo "</td>";
    
    }
    echo "</tr>";
    } 

    echo "</table>";

    //$datum = "24.12.2022";
    //if (preg_match (
      //  "/^[0-9] + \ . [0-9] + \ .20[0-9] + $datum/"
    //)); {
      //  echo "Datum ist Korrekt";
    //}

    ?>
    <br/></br>
    <table border="1">
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>...</td>
        </tr>
        <tr>
            <td>2</td>
            <td>4</td>
            <td>6</td>
            <td>...</td>
        </tr>
        <tr>
            <td>3</td>
            <td>6</td>
            <td>9</td>
            <td>...</td>
        </tr>
        <tr>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
        </tr>
    </table>
    
    
</body>
</html>