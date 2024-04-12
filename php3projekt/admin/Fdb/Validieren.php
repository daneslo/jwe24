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
