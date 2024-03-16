<?php
include "funktionen.php";
ist_eingeloggt();

include "kopf.php";

echo "<h1>Zutat Entfernen</h1>";

$sql_id = escape($_GET["id"]);

if(!empty($_GET["doit"])) {
    //Bestätigungslink wurde geclickt-> wirklich in BD löschen
    query("DELETE FROM zutaten WHERE id = '$sql_id'");
    echo "<p>Die Zutat wurde erfolgreich entfernt.<br> <a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
    
} else {
    //Benutzer fragen, ob die Zutate wirklich entfernt werden soll
    $result = query("SELECT * FROM zutaten WHERE id = '$sql_id'");
    $row = mysqli_fetch_assoc($result);

    //Prüfen ob die Zutat noch in einem Rezept vorkommt
    $result2 = query("SELECT * FROM zutaten_zu_rezepte WHERE zutaten_id = '$sql_id'");
    $ist_mit_rezepte_verknüpft = mysqli_fetch_assoc($result2);


 if(empty ($row)) {
    echo "<p>Die Zutat existier nicht (mehr).
    <br> <a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
 } elseif ($ist_mit_rezepte_verknüpft) {
    echo "<p>Die Zutat <strong>".htmlspecialchars($row["titel"]). "</strong> ist noch in einem Rezept verknüpft und kann nicht entfernt werden.</p>";
    echo "<p><a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
 } else {
    echo "<p>Wollen Sie die Zutat <strong>".htmlspecialchars($row["titel"]). "</strong> wirklich entfernen?"."</p>";
    echo "<p><a href='zutaten_entfernen.php?id={$row["id"]}&amp;doit=1'>Ja, entfernen</a> <br> 
    <a href='zutaten_liste.php'>Nein, zurück zur Liste</a></p>";

}

}


include "fuss.php";