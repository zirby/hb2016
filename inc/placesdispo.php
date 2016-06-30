<?php

require 'conn.php';

$result = [];

$bloc = $_GET['bloc'];

$bloc_name = strtoupper (str_replace("_", " ", $bloc));

$req = $pdo->prepare("SELECT * FROM hb16_blocs WHERE name=? ");
$req->execute([$bloc_name]);
$places = $req->fetch();

//var_dump($places);
//die();

$result['bloc']= $places->name;
$result['nb']= $places->places;
$result['price']= $places->price;
$result['price_half']= $places->price_half;

$result['color']= $places->color;

echo json_encode($result);