<?php

require 'conn.php';
$result = array();

$bloc = $_GET['bloc'];



$req = $pdo->prepare("SELECT * FROM cd16_blocs WHERE name=? ");
$req->execute([$bloc]);
$places = $req->fetch();


$result['bloc']= $places->name;
$result['nb']= $places->places;
$result['price']= $places->price;
$result['price_half']= $places->price_half;
$result['price_abn']= $places->price_abn;
$result['price_abn_half']= $places->price_abn_half;
$result['color']= $places->color;

echo json_encode($result);