<?php
include "funktionen.php";
ist_eingeloggt();

include "kopf.php";
?>

<h1>REZEPTE</h1>


<?php


   $result = query("SELECT * FROM zutaten ORDER BY titel ASC");

   

echo "<table border='1'>"; 

   echo "<thread>";
      echo "<tr>";
          echo "<th>Titel</th>";
          echo "<th>Beschreibung</th>";
          echo "<th>Benutzer_id</th>";
          echo "<th>Aktionen</th>";
      echo "</tr>";
   echo "</thread>";
   echo "<tbody>";
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
         echo "<td>" . $row["titel"] . "</td>";
         echo "<td>" . $row["beschreibung"] . "</td>";
         echo "<td>" . $row["benutzer_id"] . "</td>";
         echo "<td>"
          . "<a href='zutaten_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>-"
          . "<a href='zutaten_entfernen.php?id={$row["id"]}'>Entfernen</a>" . "</td>";
    echo "</tr>";

   }
    echo "</tbody>";
  echo "</table>";

?>

<?php
include "fuss.php";

?>