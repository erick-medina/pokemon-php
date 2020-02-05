<?php
// getting API
$_GET['pokemon'];

$poke_url = 'https://pokeapi.co/api/v2/pokemon/' . $_GET['pokemon']; // Pokemon API url + search
$poke_json = file_get_contents($poke_url); // to get data from API
$result_array = json_decode($poke_json , true); // 'true' converts objects into associative arrays
//var_dump($result_array);

$poke_name = ucfirst(strtolower($result_array['name'])); // variable for name = 'ucfirst' + (strtolower) to make first letter uppercase
$poke_id = $result_array['id']; // ID variable

// Main pic poke variable
$poke_main_pic = $result_array['sprites']['front_default'];
echo "<img src='{$poke_main_pic}'";

$poke_weight = $result_array['weight']; // weight variable

// abilities variable

$array_abilities = array();

for ($x = 0; $x < count($result_array['abilities']); $x++) {
    array_push($array_abilities, $result_array['abilities'][$x]['ability']['name']);
    $random_abilities = array_rand($array_abilities); // to fetch random numbers from the array
}
$poke_abilities = $array_abilities[$random_abilities];

// poke moves

$array_moves = array();

for ($x = 0; $x < 4; $x++) {
    array_push($array_moves, $result_array['moves'][$x]['move']['name']);
 //   $random_moves = array_rand($array_moves); I NEED TO MAKE A RANDOM ARRAY
}
//$poke_random_moves = $array_moves[$random_moves];


?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <title>Pokedex on PHP</title>
</head>
<body>
<section>
    <form name="form" action="" method="get">
        <input type="text" name="pokemon" id="poke-input" placeholder="Type your favorite pokemon">
        <button type="submit" name="">Click here</button>
    </form>
</section>
<section>
    <img src="<?php echo $poke_main_pic ?>" alt="" id="shinyImg"/>
    <p id="pokeName"><?php echo $poke_name ?></p>
    <p id="pokeId"><?php echo $poke_id ?></p>
    <p id="weightPoke"><strong>Weight: </strong><?php echo $poke_weight ?></p>
    <p id="abilitiesPoke"><strong>Ability: </strong><?php echo $poke_abilities ?></p>
    <p id="pokeMove1"><?php echo $array_moves[0] ?></p>
    <p id="pokeMove2"><?php echo $array_moves[1] ?></p>
    <p id="pokeMove3"><?php echo $array_moves[2] ?></p>
    <p id="pokeMove4"><?php echo $array_moves[3] ?></p>
</section>
<section>

</section>
</body>
</html>

