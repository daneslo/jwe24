<?php
//Klasse definieren, die später als Objekt verwendet werden kann
class Person{

    //Eigenschaft (property) festlegen:
    //Platzhalter für spätere Werte (wie variable)
    //private Eigenschaften (oder Methoden) können nur innerhalb der Klasse angesprochen werden
    private $vorname;

    //Konstruktor: wird automatisch aufgerufen, sobald das objekt erzeugt wird.
    //z.B: new Person();
    public function __construct($name){
        $this->vorname = $name;
    }

    //Öffentlichen Methode (public), die von außen angesprochen werden kann
    public function vorstellen () {
        return "Hallo, ich bin " . $this->vorname;
    }

    // Methode zum holen des privaten Vornamens
    // ein sogennanter 'Getter'
    public function get_vorname () {
        return $this->vorname;
    }

    //Methode zum Ändern des privaten Vornamens
    //Ein sogennanter 'Setter'
    public function set_vorname ($neuer_name) {
        //Durch diese Methode haben wir die Möglichkeit, 
        //Überprüfungen vor dem setzen des neuen namens einzufüngen
        if ($this->vorname == $neuer_name) {
            echo "<strong> So heiße ich bereits! </strong> <br>";
        } else {
            $this->vorname = $neuer_name;
        }
    }

}