<?php

$reserv = $_GET['reserv'];
$today = date("Y-m-d");
//echo $dtEnvoyele;
require_once '../../inc/conn.php';
$req = $pdo->prepare("UPDATE hb16_reservations SET envoye_le =? WHERE id= ? ");
$rs = $req->execute([$today, $reserv]);
header('Location:../index.php');
exit();

