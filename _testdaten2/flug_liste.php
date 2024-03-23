<?php
include "funktionen.php";
include "kopf.php";
?>
  <h1>Alle Flüge</h1>
<?php
$currentDateTime = date("Y-m-d H:i:s");
$result = query("SELECT * FROM fluege WHERE abflug > '$currentDateTime' ORDER BY abflug ASC");

echo "<div class='row font-weight-bold border-bottom text-center'>";
echo "<div class='col-2'>Flugnummer</div>";
echo "<div class='col-3'>Abflug</div>";
echo "<div class='col-3'>Ankunft</div>";
echo "<div class='col-2'>Startflughafen</div>";
echo "<div class='col-2'>Zielflughafen</div>";
echo "</div>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='row text-center'>";
  echo "<div class='col-2'>" . $row['flugnr'] . "</div>";
  echo "<div class='col-3'>" . $row['abflug'] . "</div>";
  echo "<div class='col-3'>" . $row['ankunft'] . "</div>";
  echo "<div class='col-2'>" . $row['start_flgh'] . "</div>";
  echo "<div class='col-2'>" . $row['ziel_flgh'] . "</div>";
  echo "</div>";
  echo "<div class='col-2'>"
          . "<a href='fluege_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>-"
          . "<a href='fluege_anlegen.php?id={$row["id"]}'>Anlegen</a>" . "</div>";
    echo "</tr>";
}
include "fuss.php";


?>

    

