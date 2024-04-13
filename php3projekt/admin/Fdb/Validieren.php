<?php
namespace WIFI\Php3\Fdb;

class Validieren 
{
    private array $errors = array ();

    public function ist_ausgefuellt(string $wert, string $feldname): bool 
    {
        if (empty($wert)) {
            $this->errors[] = $feldname ." war leer.";
            return false;
      }
          return true;
      }
      public function ist_kennzeichen(string $wert, string $feldname): bool 
      {
          //nach irgendeinem Zeichen im Kennwort suchen, das nicht A-Z, 0-9 oder - ist.
          if (preg_match("/[^A-Z0-9\-]/i", $wert)) {
              $this->errors[] ="Im " . $feldname . " sind nur Buchstaben, Zahlen und Minus erlaubt.";
              return false;
          }
          //auf korrekte laenge prüfen
          if (strlen($wert) > 8 || strlen($wert) < 3) {
              $this->errors[] = "Die Länge von ". $feldname . " scheint falsh zu sein.";
              return false;
          }
              
          return true;
      }
      public function ist_jahr(string $wert, string $feldname): bool 
      {
          //prüfen ob der wert eine zahl ist
          if (!is_numeric($wert)) {
              $this->errors[] ="Im" . $feldname . " dürfen nur Zahlen verwendet sein.";
              return false;
          }
            //prüfen ob der wert zwischen 1890 und dem aktuellen jahr liegt
            if ($wert > date("Y")|| $wert < 1890) {
                $this->errors[] = $feldname . " muss größer als 1890 sein und darf nicht in der Zukunft liegen.";
                return false;
            }

          return true;
      }
      
      public function fehler_hinzu(string $fehler ): void
      {
          $this-> errors[] = $fehler;
      }

      public function fehler_aufgetreten(): bool 
      {
        if (empty($this->errors)) {
            return false;
        } return true;
      }
 
        public function fehler_html(): string 
        {
            //ausnahme: ohne fehler leeren string züruck geben
            if (!$this->fehler_aufgetreten()) {
                return "";
            }
            //eigentliche fehlermeldung zusammenbauen
            $ret = "<ul style= 'border:1px solid red;'>";
            foreach ($this->errors as $error) {
                $ret .= "<li>". $error . "</li>";
            }
            $ret .= "</ul>";
            return $ret;
        }
}
