<?php
namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;

class Tiere implements TiereInterface, \Iterator {

    private array $herde = array();
    
    //Typdeklaration (Type-Hint): Tier Abstract
    //Nur Objekte, die von TierAbstract erben, oder selbst "TierAbstract" sind,
    //dürfen als Argument an diese Methode übergeben werden.
    public function add (TierAbstract $tier): void {
    $this->herde[] = $tier;

    }
    public function ausgabe(): string {
         $ret = "";
            foreach ($this->herde as $tier) {
                $ret .= $tier->get_name();
                $ret .= " macht ";
                $ret .= $tier->gib_laut() . "<br>";
            }
            return $ret;
    }
    //Iterator- Interface implementierung
    private int $index = 0;

    public function current(): mixed {
        return $this->herde [$this->index];
    }
    public function key(): mixed {
        return $this->index;
    }
    public function next(): void {
        ++$this->index;
    }
    public function valid(): bool {
        return isset($this->herde[$this->index]);
    }
    public function rewind(): void {
        $this->index = 0;
    }

}
