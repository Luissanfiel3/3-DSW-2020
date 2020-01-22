<?php

use function GuzzleHttp\json_decode;

require 'vendor/autoload.php';
require 'user.php';

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');

$responseServer = $response->getStatusCode(); # 200
//echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
//echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

if ($responseServer == 200) {
  $user_array = $response->getBody()->getContents();
  $userl = json_decode($user_array, true);

  $userList = array();
  $users = $userl;
  foreach ($users as $user) {
    $newUser = new User(
      $user['id'],
      $user['name'],
      $user['username'],
      $user['email'],
      $user['phone'],
      $user['website'],
      $user['address']['street'],
      $user['address']['suite'],
      $user['address']['city'],
      $user['address']['zipcode'],
      $user['address']['geo']['lat'],
      $user['address']['geo']['lng'],
      $user['company']['name'],
      $user['company']['catchPhrase'],
      $user['company']['bs']
    );

    array_push(
      $userList,
      $newUser
    );
  }
} else {
  echo "<h1>Fallo de conexión con a base de datos </h1>";
}
