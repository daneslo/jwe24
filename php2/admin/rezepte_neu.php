<?php
include "funktionen.php";
ist_eingeloggt();

$errors = array ();
$erfolg = false;

//echo "<pre>"; print_r($_POST); echo "</pre>";



//Prüfen ob das formular abgeschickt wurde
if( !empty ($_POST)) {
    $sql_benutzer_id = escape($_POST["benutzer_id"]);
    $sql_titel = escape($_POST["titel"]);
    $sql_beschreibung = escape($_POST["beschreibung"]);
    
    


    //felder validieren
    if(empty($sql_titel)) {
        $errors[]= "Bitte geben Sie einen Name für die Rezept an.";
    } else {
        //prüfen ob die Zutat schon existiert
        $result = query("SELECT * FROM rezepte WHERE titel = '$sql_titel'");

        //datensatz aus mysqli in ein php array umwandeln
        $row = mysqli_fetch_assoc($result);
        
        if($row) {
            //wenn die zutat bereits existiert -> fehlermeldung bzw. Hinweis
            $errors[] = "Die Rezept existiert bereits";
        }
    
    }
    //valiedierung wenn keine fehler dann in DB speichern
    if(empty($errors)) {
        
        
        /*
        query("INSERT INTO `zutaten`SET 
        titel = '$sql_titel', 
        kcal_pro_100 = {$sql_kcal_pro_100}, 
        menge = {$sql_menge}, 
        einheit = '{$sql_einheit}'
        ");*/

        //echo "<pre>"; print_r($_POST); echo "</pre>";
        //die();

        //Wenn keine validierungsfehler DB speichern
        query( "INSERT INTO `rezepte` SET 
        titel = '$sql_titel',
        beschreibung = '$sql_beschreibung',
        benutzer_id = '$sql_benutzer_id'
        ");
        //gibt zurück welche ID zuletzt vergeben wurde
        $neue_rezepte_id = mysqli_insert_id($db);
        
        //zuordnung zu zutaten anlegen
        foreach($_POST["zutaten_id"] as $zutatNr) {
            if(empty($zutatNr)) continue;

           
           $sql_zutaten_id = escape($zutatNr);

           query("INSERT INTO `zutaten_zu_rezepte` SET
           zutaten_id = '$sql_zutaten_id',
           rezepte_id = '$neue_rezepte_id'");
        }

        
        $erfolg = true;
    }
    
}

include "kopf.php";
?>

    <h1>Neues Rezept anlegen</h1>

    <?php
    if(!empty($errors)) {
        foreach($errors as $key => $error) {
            echo "<li>". $error."</li>";
        }
        echo "</ul>";
        
    }
    if ($erfolg) {
        echo "<p>Rezept wurde erfolgreich angelegt<br>
        <a href='rezepte_liste.php'>Zurück zur Liste</a></p>";
        
    }
    ?>
    <form action="rezepte_neu.php" method="post">
        <div>
            <label for="benutzer_id">Benutzer</label>
            <select name="benutzer_id" id="benutzer_id">
               <!--<option>Name</option>-->
                 <?php 
                    $user_result = query("SELECT * FROM benutzer ORDER BY benutzername ASC");
                    while ($user = mysqli_fetch_assoc($user_result)) {
                       echo "<option value='{$user["id"]}'";
                       if(!empty($_POST["benutzer_id"]) && !$erfolg && $_POST["benutzer_id"] == $user["id"]) {
                           echo "selected";
                       } elseif(empty($_POST["benutzer_id"]) && !$erfolg && $user["id"] == $_SESSION["benutzer_id"]) {
                        echo "selected";
                       }
                        echo  ">{$user["benutzername"]}</option>";
                    }
                ?>
            </select>
        </div>
        <br>
        <div>
            <label for="titel">Rezept Titel</label>
            <input type="text" name= "titel" id="titel" value="<?php 
            if(!empty($_POST["titel"]) && !$erfolg) {
                echo htmlspecialchars($_POST["titel"]);
            }
            ?>"/>
        </div>
        <br>

        <div>
            <label for="beschreibung">Beschreibung</label>
            <textarea name= "beschreibung" id="beschreibung" value="<?php
            if(!empty($_POST["beschreibung"]) && !$erfolg) {
                echo htmlspecialchars($_POST["beschreibung"]);
            }
            ?>"></textarea>
        </div> <br>
        <div class="zutatenliste">
            <?php
            $bloecke = 1;
            for ( $i=0; $i < $bloecke; $i++ ) {
            ?>
            <div class= "zutatenblock">
                <div>
                    <label for="zutaten_id">Zutat</label>
                    <select name="zutaten_id[]" id="zutaten_id">
                        <option>--Bitte wählen--</option>
                        <?php
                        $zutaten_result = query ("SELECT * FROM zutaten ORDER BY titel ASC");
                        while($zutat = mysqli_fetch_assoc($zutaten_result)) {
                            echo "<option value='{$zutat["id"]}'";
                            echo ">{$zutat["titel"]}</option>";                         
                        }
                            
                        ?>
                    </select>
                 </div>
            </div>
        <?php
        } //ende for schleife
        ?>
        </div>
        <br>
        <a onclick="neueZutat();">Zutat hinzufügen</a>
        <div>
            <button type="submit">  Rezept anlegen</button>
         </div>
    </form>
<?php
     include "fuss.php";
?>

</body>
</html>