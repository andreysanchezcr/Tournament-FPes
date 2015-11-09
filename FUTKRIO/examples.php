<?php
	$varI = "Soy una variable feliz";

	echo ("My first PHP script! $varI !");
	echo ("<h1>Php is awesome</h1>");

class Car {
    function Car() {
        $this->model = "VW";
    }
}

// create an object
$herbie = new Car();

// show object properties
echo $herbie->model;
$herbie->model ="Bocho";
echo $herbie->model . "<br>";

echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
?> <div id="undiv"> <?php
for ($x = 0; $x <= 10; $x++) {
	?>
		<h1>hgola</h1>
	<?php
}
?></div><?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
    echo "$value <br>";
}


?>

