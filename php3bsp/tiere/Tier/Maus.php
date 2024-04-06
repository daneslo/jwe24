<?php

namespace WIFI\JWE\Tier;

//Tierabstract es la clase padre y maus la clase hija
//"extend TierAbstract" kopiert alle Eigenschaften und Methoden von der 
//übergeordneten "Tierabstract" Klasse (die nicht private sind)
//Somit hat diese Klassse alle Möglichkeiten der Eltern-Klasse.
class Maus extends TierAbstract {

    //Wenn eine Methode definiert wird die mit selben namen in der
    //elternklasse (tierabstract) bereits existiert, so wird diese überschrieben
    public function get_name() : string {
        //parent::get_name ruf von der Elternklasse (TierAbstract) 
        //die Methode "get_name()" auf und wir können den rückgabewert.
        return parent::get_name() . " (Maus)";
    }

    
    public function gib_laut(): string {
        return "Piep!!";
    }
}