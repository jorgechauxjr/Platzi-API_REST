<?php

// Defino los recursos que serán posibles
$allowedResourceTypes = [
  'books',
  'authors',
  'genres'
];

// Validar si el tipo de recurso que me están solicitando está disponible o dentro del arreglo de recursos posibles

$resourceType = $_GET['resource_type'];

// si resourcetype no pertenece al arreglo allowed...
if (!in_array( $resourceType, $allowedResourceTypes ) ) {
  die;
}

switch ( strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case 'GET':
    break;
  case 'POST':
    break;
  case 'PUT':
    break;
  case 'DELETE':
    break;
}
