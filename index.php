<?php
// getting API
$_GET['pokemon'];

$poke_url = 'https://pokeapi.co/api/v2/pokemon/' . $_GET['pokemon']; // Pokemon API url + search
$poke_json = file_get_contents($poke_url); // to get data from API
$result_array = json_decode($poke_json , true); // 'true' converts objects into associative arrays
//var_dump($result_array);

// variable for name
$poke_name = $result_array['name'];
var_dump($poke_name);

// ID variable
$poke_id = $result_array['id'];
var_dump($poke_id);

// Main pic poke variable
$poke_main_pic = $result_array['sprites']['front_default'];
echo "<img src='{$poke_main_pic}'";

// weight variable
$poke_weight = $result_array['weight'];
var_dump($poke_weight);

// abilities variable

$array_abilities = array();

for ($x = 0; $x < count($result_array['abilities']); $x++) {
    array_push($array_abilities, $result_array['abilities'][$x]['ability']['name']);
    $random_abilities = array_rand($array_abilities); // to fetch random numbers from the array
}
echo $array_abilities[$random_abilities];

// poke moves

$array_moves = array();

for ($x = 0; $x < 4; $x++) {
    array_push($array_moves, $result_array['moves'][$x]['move']['name']);
}
var_dump($array_moves);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <title>Pokedex on PHP</title>
</head>
<body>
<form name="form" action="" method="get">
    <input type="text" name="pokemon" id="poke-input" placeholder="Type your favorite pokemon">
    <button type="submit" name="">Click here</button>
</form>
<img src=""
</body>
</html>

