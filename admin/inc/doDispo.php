<?php
require_once '../../inc/conn.php';

$req = $pdo->prepare("SELECT * FROM hb16_blocs" );
$req->execute();

while($res = $req->fetch()){
    $reqReserv = $pdo->prepare("SELECT SUM(nbplaces) as splaces, SUM(nbplaces_half) as splaces_half FROM hb16_reservations WHERE bloc=?  AND supprime_le IS NULL");
    $reqReserv->execute(array($res->name));
    $resReserv = $reqReserv->fetch();
    $somme = intval($resReserv->splaces) - intval($resReserv->splaces_half);
    //echo $UBLOC." = ".$res->max org." & ".$somme."<br />";
    if($somme == 0){
        $reqUpdate=$pdo->prepare("UPDATE hb16_blocs SET places=max WHERE name=?" );
        $reqUpdate->execute(array($res->name));
    }else{
        $valeur = intval($res->max) - intval($somme);
        $reqUpdate=$pdo->prepare("UPDATE hb16_blocs SET places=? WHERE name=?" );
        $reqUpdate->execute(array($valeur, $res->name));
    }
}
header('Location:../blocs.php');
exit();