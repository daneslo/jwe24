<?php

namespace WIFI\JWE\Tier\Hund;

use WIFI\JWE\Tier\Hund;

//vererbungen könne über mehrere ebenen gehen
class Dogge extends Hund {

    public function gib_laut(): string {
        return "Grrrrrr!!";
    }
    
    //jede klasse kann beliebig Methode (und Eigenschaft) ergänzen
    public function beissen(): string {
        return "Aua!!";
    }
}