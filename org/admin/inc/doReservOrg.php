<?php
require_once '../../../inc/conn.php';


// créer le user avec lastname=AFT et firstname=leBeneficiaire et récupérer le id
$owner = $_POST['inputBeneficiaire'];
$org = $_POST['inputOrganisateur'];

//echo $owner . "--" . $org;

$req = $pdo->prepare("INSERT INTO hb16_users SET lastname = ?, firstname = ?");
$req->execute([$org, $owner]);
$user_id = $pdo->lastInsertId();



$places = $_POST['inputPlaces'];




$type = $_POST['inputType'];


$bloc = $_POST['bloc'];




$req = $pdo->prepare("INSERT INTO hb16_reservations SET user_id = ?, type = ?, bloc = ?, nbplaces = ?, reserve_le = NOW()");
$req->execute([$user_id,  $type, $bloc, $places]);

echo json_encode(array('msg'=>"success"));