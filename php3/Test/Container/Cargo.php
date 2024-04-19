<?php

namespace WIFI\Php3\Test\Container;

class CargoShip implements \Iterator {

    private array $container_list = array();
    private float $travel_speed_in_kmh;

    public function __construct(float $speed) {
        $this->travel_speed_in_kmh = $speed;
    }

    // Method: Calculate travel time

    public function travel_time(float $distance_in_kilometers): float {
        $travel_time_in_hours = $distance_in_kilometers / $this->travel_speed_in_kmh;
        return $travel_time_in_hours;
    }

    // Method: Store containers in the list

    public function add(ContainerAbstract $container): void {
        $this->container_list[] = $container;
    }

    // Method: Calculate loaded total weight

    public function loaded_total_weight(): float {
        $total_weight = 0;
        foreach ($this->container_list as $container) {
            $total_weight += $container->calculate_actual_weight();
        }
        return $total_weight;
    }

    // Method: Calculate number of containers on the cargo ship

    public function loaded_container_count(): int {
        $count = 0;
        foreach ($this->container_list as $container) {
            if ($container->get_name() == "Large Container") {
                $count += 2;
            } else {
                $count += 1;
            }
        }
        return $count;
    }

    // Iterator Interface

    private int $index = 0;

    public function current(): mixed {
        return $this->container_list[$this->index];
    }

    public function key(): mixed {
        return $this->index;
    }

    public function next(): void {
        ++$this->index;
    }

    public function valid(): bool {
        return isset($this->container_list[$this->index]);
    }

    public function rewind(): void {
        $this->index = 0;
    }

}
