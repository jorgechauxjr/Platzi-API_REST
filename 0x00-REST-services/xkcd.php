<?php

// guardo string en variable json
$json = file_get_contents('https://xkcd.com//info.0.json').PHP_EOL;

// creo arreglo
$data = json_decode( $json, true);

// mostrar la propiedad img de los dato obtenidos
// PHP_EOL es un enter
echo $data['img'].PHP_EOL;
