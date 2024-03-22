<?php
include "funktionen.php";
ist_eingeloggt();
$erfolg = false;

$sql_id = escape($_GET["id"]);

//Prüfen ob das formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_titel = escape($_POST["titel"]);
    $sql_kcal_pro_100 = escape($_POST["kcal_pro_100"]);
    $sql_menge = escape($_POST["menge"]);
    $sql_einheit = escape($_POST["einheit"]);

    //validierung der felder
    if (empty($sql_titel)) {
        $errors[] = "Bitte geben Sie einen Name für die Zutat an.";
    } else {
        //prüfen ob die Zutat schon existiert (nicht sich selbst)
        $result = query("SELECT * FROM zutaten WHERE titel = '$sql_titel' AND id != '{$sql_id}'");

        //Datensatz aus mysqli in ein php array umwandeln
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            //wenn die zutat bereits existiert -> fehlermeldung bzw. Hinweis
            $errors[] = "Die Zutat existiert bereits";
        }
    }
    
    //wenn keine fehler existieren, dann können wir die Zutat in der DB speichern
   if(empty($errors)) {
        if($sql_kcal_pro_100 == "") {
            $sql_kcal_pro_100 = "NULL";
        }
        if($sql_einheit == "") {
            $sql_einheit = "NULL";
        }
        if($sql_menge == "") {
            $sql_menge = "NULL";
        }
        
        query("UPDATE `zutaten`SET 
        titel = '$sql_titel', 
        kcal_pro_100 = {$sql_kcal_pro_100}, 
        menge = {$sql_menge}, 
        einheit = '{$sql_einheit}'
        WHERE id = '{$sql_id}'");

        $erfolg = true;
    }
}


include "kopf.php";
?>
    <h1>Neue Zutat anlegen</h1>

    <?php
    if(!empty($errors)) {
        foreach($errors as $key => $error) {
            echo "<li>". $error."</li>";
        }
        echo "</ul>";
        
    }

    //erfolgsmeldung
    if ($erfolg) {
        echo
        "<p>
            Die Zutat wurde erfolgreich gespeichert.<br>
            <a href='zutaten_liste.php'>Zurück zur Liste</a>
        </p>";
    }

    //Datenbank fragen nach Zutat-Datensatz zur Vorausfüllung
    $result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="zutaten_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <label for="titel">Zutat:</label>
            <input type="text" name= "titel" id="titel" value= "<?php 
            if(!$erfolg && !empty($_POST["titel"])) {
                //für den Fehlerfall - alter/falscher Wert wieder in das feld geschrieben
                echo htmlspecialchars($_POST["titel"]);
            } else {
                //Datenbank Wert wird in das feld eingetragen (Vorausfüllung)
                echo htmlspecialchars($row["titel"]);
            }
            ?>"/>
        </div>
        <div>
            <label for="kcal_pro_100">Kcal/100</label>
            <input type="number" name= "kcal_pro_100" id="kcal_pro_100" value= "<?php 
             if(!$erfolg && !empty($_POST["kcal_pro_100"])) {
                echo htmlspecialchars($_POST["kcal_pro_100"]);
            } else {
                echo htmlspecialchars($row["kcal_pro_100"]);
            }
            ?>"/>
        </div>
        <div>
            <label for="menge">Menge</label>
            <input type="text" name= "menge" id="menge" value= "<?php 
             if(!$erfolg && !empty($_POST["menge"])) {
                echo htmlspecialchars($_POST["menge"]);
            } else {
                echo htmlspecialchars($row["Menge"]);
            }
            ?>"/>
        </div>
        <div>
        <label for="einhalt">Einheit</label>
            <input type="text" name= "einheit" id="einheit" value= "<?php 
             if(!$erfolg && !empty($_POST["einheit"])) {
                echo htmlspecialchars($_POST["einheit"]);
            } else {
                echo htmlspecialchars($row["einheit"]);
            }
            ?>"/>
        </div>
        <div>
            <button type="submit">Zutat speichern</button>
         </div>
    </form>
<?php
     include "fuss.php";
?>
?>