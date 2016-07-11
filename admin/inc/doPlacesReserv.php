<?php
require_once '../../inc/conn.php';

$places = array();
$reserv = $_POST['NPreserve'];

$places = $_POST['selPlaces'];


    foreach ($places as $place) {
        $req = $pdo->prepare("UPDATE hb16_places SET spectateurs_id =?  WHERE id= ? ");
        $req->execute([$reserv, $place]);
    }


header('Location:../index.php');
    exit();