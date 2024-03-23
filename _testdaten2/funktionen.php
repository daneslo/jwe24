<?php
// Verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "php2_pruefung");
// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");



//funtion für mysqli_query
function query ($sql_befehl) {
  global $db; //keyword global um die $DB variable
  $result = mysqli_query($db, $sql_befehl) or die(mysqli_error($db) . "<br/>" . $sql_befehl);
  
  return $result;
}
//funktion um SQL-Injections zu vermeiden
function escape($post_var) {
  global $db; //keyword global um die 4DB Variable vom globalen scope zu übernehmen
  return mysqli_real_escape_string($db, $post_var);
}

