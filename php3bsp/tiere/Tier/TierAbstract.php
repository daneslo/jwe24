<?php
namespace WIFI\JWE\Tier;
//Eigener Namensraum für das Projekt, bzw. diese Klasse.
//Wird verwendet um gleich bennante Klassen in verschiedenen Projekten zu erlauben.

//Abstract vor Klasse heißst:
//Diese Klasse muss "extended" werden.
//Sie kann nicht selbst als objekt erstellt werden (instanziert).
 abstract class TierAbstract  {

    //protected - the property or method can be accessed within the class and by classes derived from that class
    //Sichbarkeits-Modifikatoren
    //public: kann von "außen" (index.php) gelesen und geändert werden.
    //protected: diese klasse und kind-klassen können die Eigenschaft(property) verwenden.
    //private: ausschließlich diese klasse kann die Eigenschaft verwenden.
    private readonly string $name;
    //readonly bei Egeinschaften (seit PHP 8.1)
    //Die Eigenschaft kann einmalig gesetzt werden (construct) und danach
    //nicht mehr geändert werden- nur lesen.

    public function __construct(string $tiername) {
        $this->name = $tiername;
    }

    /**
     * Constructor promotion seit (PHP 8.0)
     * public function __construct(private string $name) {}
     * bei dieser Schreibweise muss man die Eigenschaft nicht mehr definieren
     * und die Zuweisung im konstruktor passiert auch automatisch
     *  Ansonsten ist das verhalten gleich wie oben.
     */

    //public final function get_name()
    //wenn etwas "final" ist, kann keine kind-klasse diese Methode überschreiben.
    //du kann die name wiederholen, aber nicht die Methode überschreiben.
    public function get_name (): string {
        return $this->name;
    }

     //Abstract vor Methode heißt:
     //Diese Methode muss in kind-klassen überschrieben werden (implementiert).
    abstract public function gib_laut(): string;

    

}