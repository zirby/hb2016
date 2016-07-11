<?php 
require_once '../inc/conn.php';

?>
<?php require 'inc/header.php'; ?>
<div class="row">
<div class="col-md-12 page-header">
    <h3>Réservations</h3>
</div>

<div class="col-md-6">
    <table class="table table-striped table-hover ">
        <thead>
            <th>Bloc</th>
            <th style="text-align: right;">Nb. places réservées</th>
        </thead>
        <tbody>
            <?php $totPlaces = 0; ?>
            <?php $req = $pdo->prepare("SELECT bloc, SUM(nbplaces)+SUM(nbplaces_half) as tot FROM hb16_reservations WHERE  paye_le is  null and supprime_le is null GROUP BY bloc "); ?>
            <?php $req->execute(); ?>
            <?php while($res = $req->fetch()): ?>
            <?php $totPlaces = $totPlaces + intval($res->tot); ?>
            <tr>
                <td style="text-align: left;"><?= $res->bloc; ?></td>
                <td style="text-align: right;color:red;"><?= $res->tot; ?></td>
             </tr>
             <?php endwhile; ?>
            <tr>
                <td style="text-align: left;">Total</td>
                <td style="text-align: right;color:green;font-weight: bold;"><?= $totPlaces; ?></td>
             </tr>
        </tbody>
    </table>
</div>
<div class="col-md-6">
    <table class="table table-striped table-hover ">
        <thead>
            <th>Bloc</th>
            <th style="text-align: right;">Nb. places payées</th>
        </thead>
        <tbody>
            <?php $totPlaces = 0; ?>
            <?php $req = $pdo->prepare("SELECT bloc, SUM(nbplaces)+SUM(nbplaces_half) as tot FROM hb16_reservations WHERE  paye_le is not null and supprime_le is null GROUP BY bloc "); ?>
            <?php $req->execute(); ?>
            <?php while($res = $req->fetch()): ?>
            <?php $totPlaces = $totPlaces + intval($res->tot); ?>
            <tr>
                <td style="text-align: left;"><?= $res->bloc; ?></td>
                <td style="text-align: right;color:red;"><?= $res->tot; ?></td>
             </tr>
             <?php endwhile; ?>
            <tr>
                <td style="text-align: left;">Total</td>
                <td style="text-align: right;color:green;font-weight: bold;"><?= $totPlaces; ?></td>
             </tr>
        </tbody>
    </table>
</div>
</div>



<?php require 'inc/footer.php';