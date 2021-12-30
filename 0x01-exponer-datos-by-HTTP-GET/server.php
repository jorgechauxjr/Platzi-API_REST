<?php

// Defino los recursos disponibles
$allowedResourceTypes = [
  'books',
  'authors',
  'genres'
];

// Validar si el tipo de recurso que me están solicitando está disponible o dentro del arreglo de recursos posibles

$resourceType = $_GET['resource_type'];

// Defino los recursos
$books = [
  1 => [
    'titulo' => 'Lo que el viento se llevó',
    'id_autor' => 2,
    'id_genero' => 2,
  ],
  2 => [
    'titulo' => 'La Iliada',
    'id_autor' => 1,
    'id_genero' => 1,
  ],
  1 => [
    'titulo' => 'La Odisea',
    'id_autor' => 2,
    'id_genero' => 2,
  ],
];

// avisar al cliente que la respuesta la envío en un json
header( 'Content-Type: application/json');

// si resourcetype no pertenece al arreglo allowed...
if (!in_array( $resourceType, $allowedResourceTypes ) ) {
  die;
}

switch ( strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case 'GET':
    echo json_encode( $books );
    break;
  case 'POST':
    break;
  case 'PUT':
    break;
  case 'DELETE':
    break;
}
