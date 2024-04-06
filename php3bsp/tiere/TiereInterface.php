<?php
namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;

//ein interface gibt einen "Bauplan" für eine klasse vor.
//Wenn eine Klasse diese interface implementiert, MUSS die Klasse
//all hier enthaltenen Methoden einbauen.
interface TiereInterface {
    

    public function add (TierAbstract $tier): void;

    
}