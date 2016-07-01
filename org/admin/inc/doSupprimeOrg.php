<?php
require_once '../../../inc/conn.php';
$reserv = $_GET['reserv'];


$req = $pdo->prepare("DELETE  FROM hb16_reservations WHERE id= ? ");
$rs = $req->execute(array($reserv));
header('Location:../index.php');
exit();

