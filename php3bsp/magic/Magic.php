<?php

class Magic {

    //Speichert alle eigenschaften über __set(), die nicht
    //als selbsständige Eigenschaften existieren.
    private array $daten = array ();

    //Wird von außen eine Eigenschaft gesetzt, die es hier
    //im Objekt nicht gibt, wir automatisch die 
    //__set()-Magic-Method verwendet.
    public function __set($variable, $wert) {
       $this->daten[$variable] = $wert;

    }

     //Wird von außen eine Eigenschaft VERWENDET, die es hier
     //im objekt nicht gibt, wird automatisch die
    //__get()-Magic-Method verwendet.
    public function __get ($variable) {
        return $this->daten[$variable];
        
    }

    //Wird von außen eine Methode (Funktion) aufgerufen
    //die es hier im Objekt nicht gibt, wird automatisch
    //die __call()-Magic-Method verwendet.
    public function __call($methode, $parameter) {
        echo "Es wurde die Methode " . $methode . " aufgerufen.<br>";
        echo "<pre>";
        print_r($parameter);
        echo "</pre>";

    }

    //Wird einkomplettes Objekt als String verwendet (z.B mit echo)
    //so verwendet PHP den Rückgabewert der __toString()-Magic-Method.
    public function __toString() {
        return print_r($this->daten, true);
    }

    
        
}