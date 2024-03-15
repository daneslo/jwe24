<?php
include "funktionen.php";
ist_eingeloggt();

$errors = array ();

//Prüfen ob das formular abgeschickt wurde
if( !empty ($_POST)) {

    $sql_titel = escape($_POST["titel"]);

    //felder validieren
    if(empty($sql_titel)) {
        $errors[]= "Bitte geben Sie einen Name für die Zutat an.";
    } else {
        //prüfen ob die Zutat schon existiert
        $result = mysqli_query($db, "SELECT * FROM zutaten WHERE titel = '$sql_titel'");
        $row = mysqli_fetch_assoc($result);
        
        if($row) {
            $errors[] = "Die Zutat existiert bereits";
        }
    
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
    ?>
    <form action="zutaten_neu.php" method="post">
        <div>
            <label for="titel">Zutat:</label>
            <input type="text" name= "titel" id="titel" />
        </div>
        <div>
            <label for="kcal_pro_100">Kcal/100</label>
            <input type="number" name= "kcal_pro_100" id="kcal_pro_100" />
        </div>
        <div>
            <label for="menge">Menge</label>
            <input type="text" name= "menge" id="menge" />
        </div>
        <div>
        <label for="einhalt">Einhalt</label>
            <input type="text" name= "einhalt" id="einhalt" />
        </div>
        <div>
            <button type="submit">Zutat anlegen</button>
         </div>
    </form>
<?php
     include "fuss.php";
?>

</body>
</html>