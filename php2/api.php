<?php
require "admin/funktionen.php";

header("Content-Type: application/json");

function fehler($message){
    header("HTTP/1.1 404 Not Found");
    echo json_encode(array(
        "status" => 0, /*status gibt man meist mit, das man nicht in HTTP code analysieren muss, dann erkennt man gleich am status ob es funktionert hat*/
        "error" => $message
    ));
    exit;
}

//GET- parameter aus request uri

$request_uri_ohne_get = explode("?", $_SERVER['REQUEST_URI'])[0];


$teile = explode("/api/", $request_uri_ohne_get);
$parameter = explode("/", $teile[1]);

$api_version = ltrim(array_shift($parameter), "vV"); //kleines und großes V auf der linken seite entfernen

if(empty($api_version)){
    fehler("Bitte geben Sie eine API-Version an.");
}

//leere einträge aus parameter-array entfernen
foreach ($parameter as $k =>$v) {
    if(empty($v)){
        unset($parameter[$k]);
    } else {
        //Alle parameter in Kleinbuchstaben umwandeln; FALLS DIESE FALSCH DAHERKOMMEN
        $parameter[$k] = mb_strtolower($v);
}
}

//indizies neu zuordnen, falls mit doppelketen schrägstrichen aufgerufen wird
$parameter = array_values($parameter);
if(empty($parameter)){
    fehler("Nach der version wurde keine Methode übergreben. Prufen Sie Ihren Aufruf!");
}
//--bis hier eigentlich Gründlagen für alle APIs
//--ab hier Spezifizierung je nach Anwendungsbedarf

if ($parameter[0] == "zutaten") {
    //liste aller zutaten
    $ausgabe = array(
        "status" => 1,
        "result" => array()
    );
    $result = query("SELECT * FROM zutaten ORDER BY id ASC");
    while ($row = mysqli_fetch_assoc($result)) {
        $ausgabe["result"][] = $row;
    }
    echo json_encode($ausgabe); //umwandlung eines arrays in json
    exit;
}elseif ($parameter[0] == "rezepte") {
    if(!empty ($parameter[1])) {
        //ID wurde übergeben
        $ausgabe = array(
            "status" => 1,
            "result" => array()
        );
        //rezeptedaten ermitteln
        $sql_rezepte_id = escape($parameter[1]);
        $result = query("SELECT * FROM rezepte WHERE id = '$sql_rezepte_id'");
        $rezept = mysqli_fetch_assoc($result);
        if (!$rezept) {
            fehler("Mit dieser ID '$parameter[1]' wurde kein Rezept gefunden.");
        }
        $ausgabe ["result"] = $rezept;

        //benutzerdaten ermitteln und and die ausgabe anhängen
        $result = query ("SELECT id, benutzername, email FROM benutzer WHERE id = '".$rezept["benutzer_id"]."'");
        $ausgabe["benutzer"] = mysqli_fetch_assoc($result);

        //zutaten ermitteln und an ausgabe anhaengen
        $result = query("SELECT zutaten.* FROM zutaten_zu_rezepte JOIN zutaten ON zutaten_zu_rezepte.zutaten_id = zutaten.id WHERE zutaten_zu_rezepte.rezepte_id = '$sql_rezepte_id' ORDER BY zutaten_zu_rezepte.id");

        $ausgabe ["zutaten"] = array();
        while ($zutat = mysqli_fetch_assoc($result)) {
            $ausgabe["zutaten"][] = $zutat;
        }
        echo json_encode($ausgabe); //umwandlung eines arrays in json
        exit;

    } else {
        //liste aller rezepte}
        $ausgabe = array(
        "status" => 1,
        "result" => array()
        );
        $result = query("SELECT * FROM rezepte ORDER BY id ASC");
           while ($row = mysqli_fetch_assoc($result)) {
           $ausgabe["result"][] = $row;
        }
        echo json_encode($ausgabe); //umwandlung eines arrays in json
        exit;
    }
} else {
    fehler("Die Methode '$parameter[0]' ist nicht bekannt.");
}