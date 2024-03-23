<?php
include "funktionen.php";

$erfolg = false;

$sql_id = escape($_GET["id"]);

//Prüfen ob das formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_flugnr = escape($_POST["flugnummer"]);
    $sql_abflug = escape($_POST["abflug"]);
    $sql_ankuft = escape($_POST["ankunft"]);
    $sql_start_flgh = escape($_POST["start_flgh"]);
    $sql_ziel_flgh = escape($_POST["ziel_flgh"]);

    
    //wenn keine fehler existieren, dann können wir die Zutat in der DB speichern
   if(!empty ($errors)) {
        if($sql_flugnr == "") {
            $sql_flugnr = "NULL";
        }
        if($sql_abflug == "") {
            $sql_abflug = "NULL";
        }
        if($sql_ankuft == "") {
            $sql_ankuft = "NULL";
        }
        if($sql_start_flgh == "") {
            $sql_start_flgh = "NULL";
        }
        if($sql_ziel_flgh == "") {
            $sql_ziel_flgh = "NULL";
        }
        
        query("UPDATE `fluege`SET 
        Flugnummer = '$sql_flugnr', 
        Abflug = {$sql_abflug}, 
        Ankunft = {$sql_ankuft}, 
        Startflughafen = '{$sql_start_flgh}'
        Zielflughafen = '{$sql_ziel_flgh}'
        WHERE id = '{$sql_id}'");

        $erfolg = true;
    }
}


include "kopf.php";
?>
    <h1>Neue Flüge anlegen</h1>

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
            Der Flüg wurde erfolgreich gespeichert.<br>
            <a href='flug_liste.php'>Zurück zur Liste</a>
        </p>";
    }

    //Datenbank fragen nach Zutat-Datensatz zur Vorausfüllung
    $result = query("SELECT * FROM fluege WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="fluege_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <label for="flugnr">Flugnummer</label>
            <input type="text" name= "föugnr" id="flugnr" value= "<?php 
            if(!$erfolg && !empty($_POST["flugnr"])) {
                //für den Fehlerfall - alter/falscher Wert wieder in das feld geschrieben
                echo htmlspecialchars($_POST["flugnr"]);
            } else {
                //Datenbank Wert wird in das feld eingetragen (Vorausfüllung)
                echo htmlspecialchars($row["flugnr"]);
            }
            ?>"/>
        </div>
        <div>
            <label for="Abflug">Abflug</label>
            <input type="date" name= "Abflug" id="Abflug" value= "<?php 
             if(!$erfolg && !empty($_POST["Abflug"])) {
                echo ($_POST["Abflug"]);
            } else {
                echo ($row["Abflug"]);
            }
            ?>"/>
        </div>
        <div>
            <label for="ankuft">Ankunft</label>
            <input type="date" name= "ankuft" id="menge" value= "<?php 
             if(!$erfolg && !empty($_POST["ankuft"])) {
                echo htmlspecialchars($_POST["ankuft"]);
            } else {
                echo htmlspecialchars($row["ankuft"]);
            }
            ?>"/>
        </div>
        <div>
        <label for="start_flgh">Startflughafen</label>
            <input type="text" name= "start_flgh" id="start_flgh" value= "<?php 
             if(!$erfolg && !empty($_POST["start_flgh"])) {
                echo htmlspecialchars($_POST["start_flgh"]);
            } else {
                echo htmlspecialchars($row["start_flgh"]);
            }
            ?>"/>
        </div>
        <div>
        <label for="ziel_flgh">Zielflughafen</label>
            <input type="text" name= "ziel_flgh" id="ziel_flgh" value= "<?php 
             if(!$erfolg && !empty($_POST["ziel_flgh"])) {
                echo htmlspecialchars($_POST["ziel_flgh"]);
            } else {
                echo htmlspecialchars($row["ziel_flgh"]);
            }
            ?>"/>
        </div>
        <div>
            <button type="submit">Flüge speichern</button>
         </div>
    </form>
<?php
     include "fuss.php";
?>
?>