<?php
/**
 * Diese blöcken sind Beispiele für "phpDoc" / "DocBlock"
 * und können mit php Documentor verarbeitet werden.
 */
class Kreis {
    //Konstante, die fix einer Klasse zugeordnet ist 
    const PI = 3.141592654;

    private float $radius;

    public function __construct(float $r) {
        $this->set_radius($r);
    }

    //Der Destruktor wird auf jeden fall ausgeführt wenn das Objekt gelöscht wird.
    //Dies kann über unset($k) durch den Programmierer passieren.
    //oder automatischdurch PHP, wenn das Programm zu Ende durchgelaufen ist.
    public function __destruct() {
        echo "Kreis mit Radius " . $this->radius . " wurde zerstört . <br>";
    }

    public function flaeche(): float{
        //r*r (r2) * pi
        //self ist ein fixer Platzhalter für den Klassennamen
      return  pow($this->radius, 2)  * self::PI;
    }
    public function durchmesser(): float{
        //2 * r
        return 2 * $this->radius;
    }
    /**
     * Berechnet anhand des gegebenen Radius den Umfang des Kreises.
     * @return float der berechnete Umfang des kreises
     */
    public function Umfang(): float{
        //2 * r * pi
        return $this->durchmesser() * self::PI;
    }
    /**
     * Setzt einen neun Radius für den Kreis.
     * Auch wenn der Kreis bereits existiert und mit einem Radius im Konstruktor
     * befullt wurde, kann man so einen neun Radius setzen.
     * @param int|float $r der neue Radius der gesetzt werden soll.
     * @return void
     * @throws Exception wenn der Radius kleiner oder gleich 0 ist.
     */

    public function set_radius(float $r): void{
        	if($r <= 0){
                //Wirft eine Exception, die als Fehler am Bildschrim aufscheint.
                //Gibt Kollegen einen Hinweis, was sie falsch gemacht haben.
            throw new Exception("Radius muss größer als 0 sein");
            }
        $this->radius = $r;
    }
}