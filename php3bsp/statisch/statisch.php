<?php

class Statisch {
    
    //Eine statische Eigenschaft gehört zu einmal existierenden Klasse,
    //nicht zum erstellen Objekt.
    //Dadurch bleibt die Eigenschaft über die gesamte Laufzeit bestehen.
    public static int $id = 0;

    //Diese statische Methode wird auch direkt der Klasse zugeordnet.
    //Wie die Eigenschaft wird sie über Statisch:: setze_0() aufgerufen
    //und kan nicht auf $this zugreifen - sie ist nicht Teil des Objekts.
    public static function setze_0() {
        self::$id = 0;
    }

    public function __construct() {
        self::$id += 1;
    }

    public function mache_etwas() {
        
    }


}