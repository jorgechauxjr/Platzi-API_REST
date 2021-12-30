<?php

// avisar al cliente que la respuesta la envío en un json
header( 'Content-Type: application/json');

// Defino los recursos disponibles
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

//  Levantamos el id del recurso buscado
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';


switch ( strtoupper($_SERVER['REQUEST_METHOD']) ) {
  case 'GET':
    if( empty( $resourceId)) {
      echo json_encode( $books );
    } else {
      // si el resourceId existe dentro de el arreglo books, entonces...
      if (array_key_exists($resourceId, $books) ) {
        echo json_encode ( $books[$resourceId] );
      }
    }
    
    break;
  case 'POST':
    // file_get_content() lee archivo completo y devuelve su contenido
    $json  = file_get_contents('php://input');
    
    $books[] = json_decode($json, true);

    // echo array_keys($books)[count($books) - 1];
    echo json_encode($books);
    break;
  case 'PUT':
    // Validamos que el recurso buscado exista
    if ( !empty($resourceId) && array_key_exists( $resourceId, $books ) ) {
			// Tomamos la entrada cruda
      $json = file_get_contents( 'php://input' );
			
			$books[ $resourceId ] = json_decode( $json, true );
      // retornamos la coleccion modifiada en formato json
			echo $resourceId;
		}
    break;
  case 'DELETE':
    // validamos que el recurso exista
    if ( !empty($resourceId) && array_key_exists( $resourceId, $books ) ) {
      // eliminamos el recurso
			unset( $books[ $resourceId ] );
		}
		break;
	default:
		http_response_code( 404 );

		echo json_encode(
			[
				'error' => $method.' not yet implemented :(',
			]
		);
    
    break;
}
