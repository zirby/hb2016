<?php 
require 'inc/function.php';
auth_needed();
require_once '../../inc/conn.php';
    
    $req = $pdo->prepare("SELECT * FROM hb16_reservations WHERE user_id = ? AND supprime_le IS NULL");
    $req->execute([$_SESSION['auth']->id]);
    //$j = substr($_SESSION['jour'], 3);
    $index = "index.php";

?>

<?php require 'inc/header.php'; ?>
        <div class="row">
            <div class="col-md-4 text-left">
                <a href="<?= $index ?>" class="btn btn-primary btn-lg" title="<retour" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4">
                <p style="text-align: center"><h1>Mijn reserveringen</h1></p>
            </div>
        </div>
<div class="col-md-12">
    <table class="table">
        <thead>
            <th>#</th>
            <th>Type</th>
            <th>Blok</th>
            <th>Zitplaats</th>

            <th style="text-align: right;">Bedrag</th>
            <th style="text-align: right;">Voorbehouden de</th>
            <th style="text-align: right;">Betaalde de</th>
            <th style="text-align: right;">Gepost de</th>
        </thead>
        <tbody>
            <?php while($res = $req->fetch()): ?>
            <tr>
                <td style="text-align: left;"><?= $res->id; ?></td>
                <td style="text-align: left;"><?= $res->type; ?></td>
                <td style="text-align: left;"><?= $res->bloc; ?></td>
                <td style="text-align: left;"><?= $res->nbplaces; ?></td>

                <td style="text-align: right;"><?= $res->montant; ?> €</td>
                <td style="text-align: right;"><?= $res->reserve_le; ?></td>
                <td style="text-align: right;"><?= $res->paye_le; ?></td>
                <td style="text-align: right;"><?= $res->envoye_le; ?></td>
             </tr>
             <?php endwhile; ?>
        </tbody>
    </table>
</div>
<p class=" small text-primary">Het bedrag van uw bestelling zal worden gestort op de rekening:<br />
                <b>CAPella - Ch. ZIRBES</b><br />
                <b>IBAN: BE54 0017 9153 1897 - BIC: GEBABEBB</b><br />
                met in mededeling: <b>Reserveringsnummer - <?= $_SESSION['auth']->lastname; ?></b></p>
<!-- <p class=" small text-primary"><b>A partir du 28/02, le montant des commandes est à payer au guichet le jour de la rencontre.</b></p> -->

<?php require 'inc/footer.php'; ?>
