<?php
// getting API

if (isset($_GET['pokemon']))
{
    $pokenameGet = $_GET['pokemon'];
}
else
{
    $pokenameGet = 151;
}


$poke_url = 'https://pokeapi.co/api/v2/pokemon/' . $pokenameGet; // Pokemon API url + search
$poke_json = file_get_contents($poke_url); // to get data from API
$result_array = json_decode($poke_json , true); // 'true' converts objects into associative arrays
//var_dump($result_array);

$poke_name = ucfirst(strtolower($result_array['name'])); // variable for name = 'ucfirst' + (strtolower) to make first letter uppercase
$poke_id = $result_array['id']; // ID variable

// Main pic poke variable
$poke_main_pic = $result_array['sprites']['front_default'];
//echo "<img src='{$poke_main_pic}'";

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
$array_count_moves = count($result_array['moves']);
for ($x = 0; $x < 4; $x++) {
    $random_moves = rand(0, $array_count_moves);
    array_push($array_moves, $result_array['moves'][$random_moves]['move']['name']);
}

// evolutions

$evolution_url = 'https://pokeapi.co/api/v2/pokemon-species/' . $pokenameGet;
$evolution_json = file_get_contents($evolution_url);
$result_evolution = json_decode($evolution_json , true);

$previous_evolution_name = $result_evolution['evolves_from_species']['name']; // to get name of the previous evolution

if ($previous_evolution_name === null) {
    $previous_evolution_name = 'none';
} else {
    $previous_evolution_name = $result_evolution['evolves_from_species']['name']; // to get name of the previous evolution
    $evolution_url_sprite = 'https://pokeapi.co/api/v2/pokemon/' . $previous_evolution_name;
    $evolution_new_json = file_get_contents($evolution_url_sprite);
    $result_evolution_sprite = json_decode($evolution_new_json , true);

    $previous_evo_name = $result_evolution_sprite['sprites']['front_default']; // to get previous poke evo image
}

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
    <div id="ask">
        <form name="form" action="" method="get">
            <input type="text" name="pokemon" id="poke-input" placeholder="Type your favorite pokemon">
            <button type="submit" name="">Click here</button>
        </form>
    </div>
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
    <p id="prevEvolution"><strong>Previous evolution: </strong><?php echo $previous_evolution_name ?></p>
    <img src="<?php echo $previous_evo_name ?>" alt="" id="evoImg"/>
    <img src="<?php echo $poke_main_pic ?>" alt="" id="pokeImg"/>

</section>
</body>
</html>

