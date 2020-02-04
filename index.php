<?php

$poke_data = file_get_contents('https://pokeapi.co/api/v2/pokemon/'); // to get API file
$result = json_decode($poke_data, true); // 'true' converts objects into associative arrays
var_dump($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex on PHP</title>
</head>
<body>
<form name="form" action="" method="get">
    <input type="text" name="subject" id="subject" value="Type a pokemon name">
    <button type="submit" name="">Click here</button>
</form>
</body>
</html>

