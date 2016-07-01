<?php

require_once '../../../inc/conn.php';
$result = array();

$bloc = $_GET['bloc'];

$bloc_name = strtoupper (str_replace("_", " ", $bloc));

$req = $pdo->prepare("SELECT * FROM hb16_blocs WHERE name=? ");
$req->execute([$bloc_name]);
$places = $req->fetch();



$result['bloc']= $places->name;
$result['max']= $places->max;
$result['max_org']= $places->max_org;
$result['nb']= $places->places;
$result['nb_org']= $places->places_org;
$result['price']= $places->price;
$result['price_half']= $places->price_half;

$result['color']= $places->color;

echo json_encode($result);
