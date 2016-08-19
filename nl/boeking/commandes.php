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
        <p style="text-align: center"><h1>Mijn bestelling</h1></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
        <div class="panel panel-warning">
            <div class="panel-heading">Informatie</div>
            <div class="panel-body">
                <p><strong>Goedendag Mijnheer/Mevrouw <?= $_SESSION['auth']->lastname; ?></strong></p>
                <p>Uw reservering werd wel degelijk geregistreert.</p>
                <p></p>

                <p>Het bedrag van uw bestelling zal op de rekering van:<br />
                <b>CAPella - Ch. ZIRBES</b><br />
                betaald moeten<br />
                <b>IBAN: BE54 0017 9153 1897 - BIC: GEBABEBB</b><br />
                met in mededeling: <b><?= $reservationId; ?> - <?= $_SESSION['auth']->lastname; ?></b></p>
                <p>binnen de 3 dagen. Bij het overschrijden van deze termijn , zal uw reservering automatisch geannuleerd worden.</p>
                <p>Uw tickets zal u per post ontvangen, na 15/09 na ontvangst van uw betaling.</p>
                <p>*** Gelieve dit document af te drukken aub. ***</p>
                <p>BEDANKT VOOR UW BESTELLING</p>
                
                <p class=" small text-danger"><b>Dit geldt als bevestiging. U zult geen e-mail ontvangen.<br/> Om uw bestelling te volgen, klik op MIJN RESERVERINGEN</b></p>
            </div>
            <div class="panel-footer text-center">
                <a href="reservations.php"  class="btn btn-info btn-lg">zee mijn reserveringen</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-left">
        <div class="panel panel-success">
            <div class="panel-heading">Bestelling : </div>
            <div class="panel-body">
                <table class="table">
                    <tr><th>N°</th><th><?= $reservationId; ?></th></tr>
                    <tr><th>Bloc</th><th><?= $_SESSION['placeBloc']; ?></th></tr>
                    <tr><th><?= $_SESSION['placeFullNb']; ?></th><td>plaats(en)</td></tr>
               </table>
            </div>
            <div class="panel-footer text-right">
                Voor een totaal van: <b><?= $_SESSION['priceTot']; ?> €</b>
            </div>
        </div>
    </div>

</div>
<?php require 'inc/footer.php';