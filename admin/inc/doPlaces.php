<?php

$result = array();
$reserv = $_POST['reserv'];

require_once '../../inc/conn.php';
$req = $pdo->prepare("SELECT * FROM hb16_reservations  WHERE id= ? ");
$req->execute([$reserv]);
$laReserv = $req->fetch();

$bloc = $laReserv->bloc;


$reqP = $pdo->prepare("SELECT * FROM hb16_places  WHERE bloc= ? AND spectateurs_id = 0");
$reqP->execute([$bloc]);
while ($row = $reqP->fetch()) {
    $myrow = array();
    $myrow = array('label' => $row->id,
        'title' => $row->id,
        'value' => $row->id);
    array_push($result, $myrow);
};
echo json_encode($result);
