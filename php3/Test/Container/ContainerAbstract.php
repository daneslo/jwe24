<?php

namespace WIFI\Php3\Test\Container;

abstract class ContainerAbstract {

    private float $cargo_weight;
    private array $errors = array();

    public function __construct(float $weight) {
        if ($weight > $this->payload_capacity) {
            throw new \Exception("The entered weight of " . $weight . 
            " tons exceeds the allowable payload of " . $this->payload_capacity . " tons.");
        }
        $this->cargo_weight = $weight;
    }

    public function calculate_actual_weight(): float {
        $total_weight = $this->empty_weight + $this->cargo_weight;
        return $total_weight;
    }

    public function calculate_max_total_weight(): float {
        $max_total_weight = $this->empty_weight + $this->payload_capacity;
        return $max_total_weight;
    }

    // Method for counting the number of loaded containers 
    public function get_name(): string {
        return $this->container_name;
    }

}

   
