<?php 
require 'inc/function.php';
auth_needed();
require_once '../../inc/conn.php';

//$j = substr($_SESSION['jour'], 3);
$index = "index.php";



if(isset($_SESSION['resId'])){
    header('Location: '.$index);
}else{
    $req = $pdo->prepare("INSERT INTO hb16_reservations SET user_id = ?, type = ?, bloc = ?, nbplaces = ?, nbplaces_half = ?, montant = ?, reserve_le = NOW()");
    $req->execute([$_SESSION['auth']->id,$_SESSION['type'],$_SESSION['placeBloc'],$_SESSION['placeFullNb'],$_SESSION['placeHalfNb'],$_SESSION['priceTot']]);
    $reservationId = $pdo->lastInsertId();
    
    if($reservationId > 0){
         $_SESSION['resId']=$reservationId;
    }
}
?>
<?php require 'inc/header.php'; ?>
<div class="row">
    <div class="col-md-4 text-left">
        <a href="<?= $index ?>" class="btn btn-primary btn-lg" title="<retour" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
    </div>
    <div class="col-md-4">
        <p style="text-align: center"><h1>Meine Bestellung</h1></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
        <div class="panel panel-warning">
            <div class="panel-heading">Informationen</div>
            <div class="panel-body">
                <p><strong>Guten Tag sehr geehrter Herr/sehr geehrte Frau <?= $_SESSION['auth']->lastname; ?></strong></p>
                <p>Ihre Reservierung wurde registriert.</p>
                <p></p>

                <p>Die Höhe Ihrer Bestellung muss überwiesen werden auf dem Konto von:<br />
                <b>CAPella - Ch. ZIRBES</b><br />
                <b>IBAN: BE84 XXXX XXXX XXXX - BIC: GEBA BE BB</b><br />
                Mit Referenz: <b><?= $reservationId; ?> - <?= $_SESSION['auth']->lastname; ?></b></p>
                <p>Innerhalb von 3 Tagen. Bei Verstreichung diese Frist wird Ihre Reservierung automatische annulliert.</p>
                <p>Ihre Tickets werden Ihnen auf dem Postweg in etwa acht Tage nach Eingang Ihrer Zahlung gesendet.</p>
                <p>*** Drucken Sie bitte dieses Dokument aus. ***</p>
                <p>DANKE FüR IHRE BESTELLUNG</p>
                
                <p class=" small text-danger"><b>Dies gilt als Bestätigung. Sie werden keine Mail erhalten.<br/> Um ihre Bestellung fortzusetzen, klicken auf MEINE RESERVIERUNG</b></p>
            </div>
            <div class="panel-footer text-center">
                <a href="reservations.php"  class="btn btn-info btn-lg">MEINE RESERVIERUNG</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-left">
        <div class="panel panel-success">
            <div class="panel-heading">Bestellung : </div>
            <div class="panel-body">
                <table class="table">
                    <tr><th>N°</th><th><?= $reservationId; ?></th></tr>
                    <tr><th>Bloc</th><th><?= $_SESSION['placeBloc']; ?></th></tr>
                    <tr><th><?= $_SESSION['placeFullNb']; ?></th><td>platz</td></tr>
               </table>
            </div>
            <div class="panel-footer text-right">
                Für eine Gesamtsumme von: <b><?= $_SESSION['priceTot']; ?> €</b>
            </div>
        </div>
    </div>

</div>
<?php require 'inc/footer.php';