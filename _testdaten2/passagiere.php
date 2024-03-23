<?php
include "funktionen.php";
include "kopf.php";
?>
<h1>Passagiere</h1>
<p><a href="passagiere_neu.php">Neues Passagiere anlegen </a> </p>
<?php 
$result = query("SELECT * FROM passagiere ORDER BY nachname ASC");

echo "<div class='row font-weight-bold border-bottom text-center'>";
echo "<div class='col-2'>Passagiere_id</div>";
echo "<div class='col-3'>Vorname</div>";
echo "<div class='col-3'>Nachname</div>";
echo "<div class='col-2'>Geburtsdatum</div>";
echo "<div class='col-2'>Flugsangst</div>";
echo "</div>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='row text-center'>";
  echo "<div class='col-2'>" . $row['passagiere_id'] . "</div>";
  echo "<div class='col-3'>" . $row['vorname'] . "</div>";
  echo "<div class='col-3'>" . $row['nachname'] . "</div>";
  echo "<div class='col-2'>" . $row['geburtsdatum'] . "</div>";
  echo "<div class='col-2'>" . $row['flugangst'] . "</div>";
  echo "</div>";
  echo "<td>"
          . "<a href='rezepte_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>-"
          . "<a href='rezepte_entfernen.php?id={$row["id"]}'>Entfernen</a>" . "</td>";
    echo "</tr>";
}
include "fuss.php";
?>







