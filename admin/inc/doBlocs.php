<?php
require_once '../../inc/conn.php';


$req = $pdo->prepare("UPDATE hb16_blocs SET max =?, max_org =?, price =?, price_half =? WHERE name= ? ");

$req->execute([
    $_POST['inputMax'], 
    $_POST['inputMaxOrg'], 
    $_POST['inputPrice'],
    $_POST['inputPriceHalf'], 
    $_POST['inputBloc']
        ]);


header('Location:../blocs.php');
exit();