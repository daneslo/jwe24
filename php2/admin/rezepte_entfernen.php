<?php
include "funktionen.php";
ist_eingeloggt();

include "kopf.php";

echo "<h1>Rezepte Entfernen</h1>";

$sql_id = escape($_GET["id"]);

if(!empty($_GET["doit"])) {
    //Bestätigungslink wurde geclickt-> wirklich in BD löschen
    query("DELETE FROM rezepte WHERE id = '$sql_id'");
    echo "<p>Die Rezepte wurde erfolgreich entfernt.<br> <a href='rezepte_liste.php'>Zurück zur Liste</a></p>";
    
} else {
    //Benutzer fragen, ob die Zutate wirklich entfernt werden soll
    $result = query("SELECT * FROM rezepte WHERE id = '$sql_id'");
    $row = mysqli_fetch_assoc($result);

    


 if(empty ($row)) {
    echo "<p>Die Rezept existier nicht (mehr).
    <br> <a href='rezepte_liste.php'>Zurück zur Liste</a></p>";
 } elseif ($ist_mit_rezepte_verknüpft) {
    echo "<p>Die Rezept <strong>".htmlspecialchars($row["titel"]). "</strong> ist noch in einem Rezept verknüpft und kann nicht entfernt werden.</p>";
    echo "<p><a href='rezepte_liste.php'>Zurück zur Liste</a></p>";
 } else {
    echo "<p>Wollen Sie die rezept <strong>".htmlspecialchars($row["titel"]). "</strong> wirklich entfernen?"."</p>";
    echo "<p><a href='rezepte_entfernen.php?id={$row["id"]}&amp;doit=1'>Ja, entfernen</a> <br> 
    <a href='rezepte_liste.php'>Nein, zurück zur Liste</a></p>";

}

}


include "fuss.php";