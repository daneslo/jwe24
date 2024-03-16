<style>
form {
    background-color: lightpink;
    padding: 20px;
    margin: 20px;
    border: 1px solid grey;
    border-radius: 10px;
}
</style>

<?php
include "funktionen.php";
ist_eingeloggt();

$errors = array ();
$erfolg = false;

//Prüfen ob das formular abgeschickt wurde
if( !empty ($_POST)) {

    $sql_titel = escape($_POST["titel"]);
    $sql_kcal_pro_100 = escape($_POST["kcal_pro_100"]);
    $sql_menge = escape($_POST["menge"]);
    $sql_einheit = escape($_POST["einheit"]);


    //felder validieren
    if(empty($sql_titel)) {
        $errors[]= "Bitte geben Sie einen Name für die Zutat an.";
    } else {
        //prüfen ob die Zutat schon existiert
        $result = query("SELECT * FROM zutaten WHERE titel = '$sql_titel'");

        //datensatz aus mysqli in ein php array umwandeln
        $row = mysqli_fetch_assoc($result);
        
        if($row) {
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
        
        query("INSERT INTO `zutaten`SET 
        titel = '$sql_titel', 
        kcal_pro_100 = {$sql_kcal_pro_100}, 
        menge = {$sql_menge}, 
        einheit = '{$sql_einheit}'
        ");
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
    if ($erfolg) {
        echo "<p>Die Zutat wurde erfolgreich angelegt<br>
        <a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
        
    }
    ?>
    <form action="zutaten_neu.php" method="post">
        <div>
            <label for="titel">Zutat:</label>
            <input type="text" name= "titel" id="titel" />
        </div>
        <br>

        <div>
            <label for="kcal_pro_100">Kcal/100</label>
            <input type="number" name= "kcal_pro_100" id="kcal_pro_100" />
        </div> <br>

        <div>
            <label for="menge">Menge</label>
            <input type="text" name= "menge" id="menge" />
        </div><br>

        <div>
        <label for="einhalt">Einheit</label>
            <input type="text" name= "einheit" id="einheit" />
        </div><br>

        <div>
            <button type="submit">Zutat anlegen</button>
         </div>
    </form>
<?php
     include "fuss.php";
?>

</body>
</html>