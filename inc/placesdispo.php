<?php

require 'conn.php';
$result = array();

$bloc = $_GET['bloc'];

$bloc_name = strtoupper (str_replace("_", " ", $bloc));

$req = $pdo->prepare("SELECT * FROM hb16_blocs WHERE name=? ");
$req->execute([$bloc_name]);
$places = $req->fetch();



$result['bloc']= $places->name;
$result['nb']= $places->places;
$result['price']= $places->price;
$result['price_half']= $places->price_half;
$result['price_abn']= $places->price_abn;
$result['price_abn_half']= $places->price_abn_half;
$result['color']= $places->color;

echo json_encode($result);