<?php

$reserv = $_GET['reserv'];
$dtPayele = $_GET['payele'];
//echo $dtPayele;
    require_once '../../inc/conn.php';
    $req = $pdo->prepare("UPDATE hb16_reservations SET paye_le =? WHERE id= ? ");
    $rs = $req->execute([$dtPayele, $reserv]);
if ($rs){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>$sql));
}
