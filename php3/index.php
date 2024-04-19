<!DOCTYPE html>
<html>
    <head>
        <title>PHP 3 </title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h2>Testing Containers</h2>

        <?php

        // Autoloader
        spl_autoload_register(
          function (string $class) {
              // Project-specific namespace prefix
              $prefix = "WIFI\\Php3\\";


              // Base directory for the project
              $base = __DIR__ . "/";

              // If the class does not use the prefix, abort
              $length = strlen($prefix);
              if (substr($class, 0, $length) !== $prefix) {
                  return;
              }

              // Class without prefix
              $class_without_prefix = substr($class, $length);

              // Create file path
              $file = $base . $class_without_prefix . ".php";
              $file = str_replace("\\", "/", $file);

              // If the file exists, include it
              if (file_exists($file)) {
                  include $file;
              }
          }
        );

        // Output
        // Task 1
        echo "<h2>Task 1</h2>";

        use WIFI\Php3\Test\Container\LargeContainer;
        use WIFI\Php3\Test\Container\SmallContainer;
        use WIFI\Php3\Test\Container\CargoShip;

        try {
          $container_1 = new SmallContainer(200);
          echo "Container was created!";
        } catch (Exception $ex) {
            echo "Wrong input: " . $ex->getMessage();
            echo "<br><br>";
        }

        $container_1 = new SmallContainer(20);
        $container_2 = new SmallContainer(10);
        $container_3 = new LargeContainer(10);

        echo "Actual weight of Container 1:<br>";
        echo $container_1->calculate_actual_weight() . " tons";
        echo "<br><br>";
        echo "Maximum weight of Container 1:<br>";
        echo $container_1->calculate_max_total_weight() . " tons";
        echo "<br>";

        // Task 2
        echo "<h2>Task 2</h2>";

        $cargo_ship_1 = new CargoShip(80);
        echo "Travel time of Cargo Ship 1:<br>";
        echo $cargo_ship_1->travel_time(500) . " hours";
        echo "<br><br>";

        $cargo_ship_1->add($container_1);
        $cargo_ship_1->add($container_2);
        $cargo_ship_1->add($container_3);
        
        // Iterator
        echo "The actual weight of individual containers in Cargo Ship 1 (Iterator):<br>";
        foreach ($cargo_ship_1 as $container) {
            echo $container->calculate_actual_weight() . " tons";
            echo "<br>";
        }

        echo "<br>";
        echo "The loaded total weight of Cargo Ship 1: <br>";
        echo $cargo_ship_1->loaded_total_weight() . " tons";

        echo "<br><br>";
        echo "The number of containers on Cargo Ship 1: <br>";
        echo $cargo_ship_1->loaded_container_count() . " containers";

        // Task 3
        echo "<h2>Task 3</h2>";

        $cargo_weight = 12.55;
        // Create any container with $cargo_weight
        // and output its actual weight, and maximum total weight
        $container_z = new SmallContainer($cargo_weight);

        echo "The actual weight of Container Z:<br>";
        echo $container_z->calculate_actual_weight();
        echo "<br><br>";

        echo "The Maximum total weight of Container Z:<br>";
        echo $container_z->calculate_max_total_weight();

        ?>


        <h2>Testing Cargo Ship</h2>
        <?php
        if (!empty($_POST)) {
            // - Create a Cargo Ship
            $cargo_ship_z = new CargoShip($_POST["speed"]);
            // - Add given number of containers (using for loop)
            for ($i = 1; $i <= $_POST["container_count"]; $i++) {
              // Add container to the ship
              $cargo_ship_z->add(new SmallContainer($_POST["container_weight"]));
            }
            // - Output travel time, container count, loaded weight
            echo "Travel time of Cargo Ship Z:<br>";
            echo $cargo_ship_z->travel_time($_POST["distance"]) . " hours";
            echo "<br><br>";
            echo "Number of loaded containers on Cargo Ship Z:<br>";
            echo $cargo_ship_z->loaded_container_count() . " containers";
            echo "<br><br>";
            echo "Loaded total weight on Cargo Ship Z:<br>";
            echo $cargo_ship_z->loaded_total_weight() . " tons";
            echo "<br><br>";
        }

        ?>
        <form action='index.php' method='post'>
            <div>
                <label for='speed'>Speed in km/h:</label>
                <input type='number' name='speed' id='speed' min='0.0' max='100.0' step='0.1' value='<?php
                  if (!empty($_POST["speed"])) {
                    echo $_POST["speed"];
                  } else {
                    echo 23;
                  } ?>' />
            </div>
            <div>
                <label for='distance'>Distance in km:</label>
                <input type='number' name='distance' id='distance' min='0' max='40000' step='1' value='<?php
                  if (!empty($_POST["distance"])) {
                    echo $_POST["distance"];
                  } else {
                    echo 4669;
                  } ?>' />
            </div>
            <div>
                <label for='container_count'>Number of Containers:</label>
                <input type='number' name='container_count' id='container_count' min='0' max='10000' step='1' value='<?php
                  if (!empty($_POST["container_count"])) {
                    echo $_POST["container_count"];
                  } else {
                    echo 8400;
                  } ?>' />
            </div>
            <div>
                <label for='container_weight'>Cargo Weight per Container:</label>
                <input type='number' name='container_weight' id='container_weight' min='0.0' max='100.0' step='0.01' value='<?php
                  if (!empty($_POST["container_weight"])) {
                    echo $_POST["container_weight"];
                  } else {
                    echo 8.64;
                  } ?>' />
            </div>
            <div>
                <button type='submit'>Calculate</button>
            </div>
        </form>
    </body>
</html>
