<?php
// arreglo con username y password
$data = [
    'username' => 'tecadmin',
    'password' => '012345678'
];

// codifico la informacion en json
 
$payload = json_encode($data);
 
// inicia conexion al servidor
$ch = curl_init('https://api.example.com/api/1.0/user/login');

// que la info nos sea devuelta
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Que no nos muestre los headers
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// hacemos el POST
curl_setopt($ch, CURLOPT_POST, true);

// En el post va a viajar la info con el json generado arriba. payload
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// configurar headers para que servidor sepa que le estamos enviando
curl_setopt($ch, CURLOPT_HTTPHEADER,
	[ 
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($payload)
	]
);

// ejecuta la peticion y guarda resultado en result
$result = curl_exec($ch);
curl_close($ch);
