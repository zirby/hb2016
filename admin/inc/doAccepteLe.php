<?php

$reserv = $_GET['reserv'];
//echo $dtPayele;
    require_once '../../inc/conn.php';
    $req = $pdo->prepare("UPDATE hb16_reservations SET supprime_le =? WHERE id= ? ");
    $rs = $req->execute([$dtsupprimele, $reserv]);
    header('Location:../index.php');
    exit();
