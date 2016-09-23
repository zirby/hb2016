<?php

require_once '../inc/conn.php';

/* ********************************* 25 ***************************/
$req = $pdo->prepare("select sum(r.nbplaces) as nb25 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 25 and supprime_le is null " );
$req->execute();
$pl25 = $req->fetch();
$nb25 = intval($pl25->nb25);

$req = $pdo->prepare("select sum(r.nbplaces) as nbp25, sum(r.montant) as mnt25 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 25 and r.paye_le is not null" );
$req->execute();
$pl25 = $req->fetch();
$mnt25 = floatval($pl25->mnt25);
$nbp25 = intval($pl25->nbp25);
$cap25 = floatval($nbp25)*2.42;
$org25 = floatval($mnt25)-floatval($cap25);


/* ********************************* 20 ***************************/
$req = $pdo->prepare("select sum(r.nbplaces) as nb20 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 20 and supprime_le is null " );
$req->execute();
$pl20 = $req->fetch();
$nb20 = intval($pl20->nb20);

$req = $pdo->prepare("select sum(r.nbplaces) as nbp20, sum(r.montant) as mnt20 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 20 and r.paye_le is not null" );
$req->execute();
$pl20 = $req->fetch();
$mnt20 = floatval($pl20->mnt20);
$nbp20 = intval($pl20->nbp20);
$cap20 = floatval($nbp20)*2.42;
$org20 = floatval($mnt20)-floatval($cap20);

/* ********************************* 15 ***************************/
$req = $pdo->prepare("select sum(r.nbplaces) as nb15 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 15 and supprime_le is null " );
$req->execute();
$pl15 = $req->fetch();
$nb15 = intval($pl15->nb15);

$req = $pdo->prepare("select sum(r.nbplaces) as nbp15, sum(r.montant) as mnt15 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 15 and r.paye_le is not null" );
$req->execute();
$pl15 = $req->fetch();
$mnt15 = floatval($pl15->mnt15);
$nbp15 = intval($pl15->nbp15);
$cap15 = floatval($nbp15)*2.42;
$org15 = floatval($mnt15)-floatval($cap15);

/* ********************************* 10 ***************************/
$req = $pdo->prepare("select sum(r.nbplaces) as nb10 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 10 and supprime_le is null " );
$req->execute();
$pl10 = $req->fetch();
$nb10 = intval($pl10->nb10);

$req = $pdo->prepare("select sum(r.nbplaces) as nbp10, sum(r.montant) as mnt10 from hb16_reservations as r, hb16_blocs as b where r.bloc = b.name and b.price = 10 and r.paye_le is not null" );
$req->execute();
$pl10 = $req->fetch();
$mnt10 = floatval($pl10->mnt10);
$nbp10 = intval($pl10->nbp10);
$cap10 = floatval($nbp10)*2.42;
$org10 = floatval($mnt10)-floatval($cap10);

/* ********************************* org ***************************/
$req = $pdo->prepare("select sum(nbplaces) as nborg from hb16_reservations  where  type like 'VIP' " );
$req->execute();
$plorg = $req->fetch();
$nborg = intval($plorg->nborg);
$caporg = floatval($nborg)*1.21;

/* ********************************* SUM ***************************/
$sumnb = $nb25 + $nb20 + $nb15 + $nb10;
$sumnbp = $nbp25 + $nbp20 + $nbp15 + $nbp10;
$summnt = $mnt25 + $mnt20 + $mnt15 + $mnt10;
$sumcap = $cap25 + $cap20 + $cap15 + $cap10;
$sumcapcap = $sumcap + $caporg;
$sumorg = $org25 + $org20 + $org15 + $org10;
$sumorgorg = $summnt - $sumcapcap;

?>
<?php require 'inc/header.php'; ?>

<div class="row text-center">
    <div class="col-md-12">
        <button type="button" class="btn btn-default"><h2>Rapport billetterie - Organisateurs - <?= $org; ?></h2></button>
    </div>
    <div class="col-md-12" style="height: 20px;"></div>
</div>
<div class="row">

</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Vente des tickets</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
        </ul>

    </div><!-- /.navbar-collapse -->
  </div>
</nav>
<div class="col-md-12">
    <table class="table table-striped table-hover ">
        <thead>
            <th>Catégorie</th>
            <th>Nb. tickets ORG</th>
            <th>Nb. tickets réservés</th>
            <th>Nb. tickets payés</th>

            <th style="text-align: right;">Montants encaissés</th>
            <th style="text-align: right;">Montants pour ORG</th>
            <th style="text-align: right;">Montants pour CAPella.</th>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;">Cat. 1 (25€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><?= $nb25; ?></td>
                <td style="text-align: left;"><?= $nbp25; ?></td>

                <td style="text-align: right;"><?= $mnt25; ?>€</td>
                <td style="text-align: right;"><?= $org25; ?>€</td>
                <td style="text-align: right;"><?= $cap25; ?>€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 2 (20€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><?= $nb20; ?></td>
                <td style="text-align: left;"><?= $nbp20; ?></td>

                <td style="text-align: right;"><?= $mnt20; ?>€</td>
                <td style="text-align: right;"><?= $org20; ?>€</td>
                <td style="text-align: right;"><?= $cap20; ?>€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 3 (15€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><?= $nb15; ?></td>
                <td style="text-align: left;"><?= $nbp15; ?></td>

                <td style="text-align: right;"><?= $mnt15; ?>€</td>
                <td style="text-align: right;"><?= $org15; ?>€</td>
                <td style="text-align: right;"><?= $cap15; ?>€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 4 (10€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><?= $nb10; ?></td>
                <td style="text-align: left;"><?= $nbp10; ?></td>

                <td style="text-align: right;"><?= $mnt10; ?>€</td>
                <td style="text-align: right;"><?= $org10; ?>€</td>
                <td style="text-align: right;"><?= $cap10; ?>€</td>
             </tr>
            <tr  class="success">
                <th colspan="2" style="text-align: right;"><b>TOTAL: </b></th>

                <th style="text-align: left;"><?= $sumnb; ?></th>
                <th style="text-align: left;"><?= $sumnbp; ?></th>
                <th style="text-align: right;"><?= $summnt; ?>€</th>
                <th style="text-align: right;"><?= $sumorg; ?>€</th>
                <th style="text-align: right;"><?= $sumcap; ?>€</th>
             </tr>
            <tr>
                <td style="text-align: left;">ORG</td>
                <td style="text-align: left;"><?= $nborg; ?></td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"></td>

                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;"><?= $caporg; ?>€</td>
             </tr>
            <tr  class="danger">
                <th colspan="6" style="text-align: right;"><b>TOTAL COUNTRYTICKETS.EU: </b></th>
                <th style="text-align: right;"><?= $sumcapcap; ?>€</th>
             </tr>
           <tr class="danger">
                <th colspan="6" style="text-align: right;"><b>TOTAL ORGANISATEURS: </b></th>
                <th style="text-align: right;"><?= $sumorgorg; ?>€</th>
             </tr>


        </tbody>
    </table>
</div>

<div class="col-md-12">
    <ul class="list-group">
    <li class="list-group-item">
        <span class="badge">30.000,00 €</span>
        Versement organisateur (31/08/2016)
    </li>
    <li class="list-group-item">
        <span class="badge">10.000,00 €</span>
        Versement organisateur (23/09/2016)
    </li>
    </ul>
</div>

<?php require 'inc/footer.php';
