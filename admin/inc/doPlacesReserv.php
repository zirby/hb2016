<?php
require_once '../../inc/conn.php';

$places = array();
$reserv = $_POST['NPreserve'];

$places = $_POST['selPlaces'];

$date_pack = date("Y-m-d H:i:s");

    foreach ($places as $place) {
        $req = $pdo->prepare("UPDATE hb16_places SET spectateurs_id =?  WHERE id= ? ");
        $req->execute([$reserv, $place]);
    }

$req = $pdo->prepare("UPDATE hb16_reservations SET pack_le =?  WHERE id= ? ");
$req->execute([$date_pack, $reserv]);

header('Location:../index.php');
    exit();