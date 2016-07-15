<?php

require_once '../../inc/conn.php';

// faire doDispo ORG avec IDENTIFIANT de ORGANISATEUR
$org = 'URBH'; // id de l'organisateur
$req = $pdo->prepare("SELECT * FROM hb16_blocs" );
$req->execute();

while($res = $req->fetch()){
    $reqReserv = $pdo->prepare("SELECT SUM(r.nbplaces) as splaces, SUM(r.nbplaces_half) as splaces_half FROM hb16_reservations as r, hb16_users as u WHERE r.user_id= u.id AND r.bloc=? AND u.lastname=?  GROUP BY r.bloc ");
    //$reqReserv = $pdo->prepare("SELECT SUM(nbplaces) as splaces, SUM(nbplaces_half) as splaces_half FROM cd16_reservations WHERE (bloc=? AND jour =? AND supprime_le IS NULL) OR (bloc=? AND jour='ABN3J' AND supprime_le IS NULL)");
    $reqReserv->execute(array($res->name, $org));
    $resReserv = $reqReserv->fetch();
    if($resReserv){
        $somme = intval($resReserv->splaces) + intval($resReserv->splaces_half);
        $valeur = intval($res->max_org) - intval($somme);
        $reqUpdate=$pdo->prepare("UPDATE hb16_blocs SET places_org=? WHERE name=?" );
        $reqUpdate->execute(array($valeur, $res->name));
    }else{
        $reqUpdate=$pdo->prepare("UPDATE hb16_blocs SET places_org=max_org WHERE name=?" );
        $reqUpdate->execute(array($res->name));
    }
   
}

// faire la liste des réservations
$req = $pdo->prepare("SELECT  *, r.id as rid FROM hb16_reservations as r, hb16_users as u WHERE r.user_id= u.id AND u.lastname='".$org."'  ORDER BY r.id DESC  ");
$req->execute();


if(isset($_POST['btnSearchNom'])){
    $req = $pdo->prepare("SELECT  *, r.id as rid FROM hb16_reservations as r, hb16_users as u WHERE r.user_id= u.id AND u.firstname like '".$_POST['searchNom']."%' AND u.lastname='".$org."'  ORDER BY r.id DESC  ");
    $req->execute();
}


?>
<?php require 'inc/header.php'; ?>

<div class="row text-center">
    <div class="col-md-12">
        <button type="button" class="btn btn-default"><h2>Rapport billeterie - Organisateurs - <?= $org; ?></h2></button>
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
            <th style="text-align: right;">Montants pour Country.</th>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;">Cat. 1 (25€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">1</td>
                <td style="text-align: left;">1</td>

                <td style="text-align: right;">25.00€</td>
                <td style="text-align: right;">22.58€</td>
                <td style="text-align: right;">2.42€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 2 (20€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">2</td>
                <td style="text-align: left;">1</td>

                <td style="text-align: right;">20.00€</td>
                <td style="text-align: right;">17.58€</td>
                <td style="text-align: right;">2.42€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 3 (15€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">3</td>
                <td style="text-align: left;">1</td>

                <td style="text-align: right;">15.00€</td>
                <td style="text-align: right;">12.58€</td>
                <td style="text-align: right;">2.42€</td>
             </tr>
            <tr>
                <td style="text-align: left;">Cat. 4 (10€)</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;">4</td>
                <td style="text-align: left;">1</td>

                <td style="text-align: right;">10.00€</td>
                <td style="text-align: right;">7.58€</td>
                <td style="text-align: right;">2.42€</td>
             </tr>
            <tr  class="success">
                <th colspan="2" style="text-align: right;"><b>TOTAL: </b></th>

                <th style="text-align: left;">10</th>
                <th style="text-align: left;">4</th>
                <th style="text-align: right;">70.00€</th>
                <th style="text-align: right;">60.32€</th>
                <th style="text-align: right;">9.68€</th>
             </tr>
            <tr>
                <td style="text-align: left;">ORG</td>
                <td style="text-align: left;">1</td>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"></td>

                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;">1.21€</td>
             </tr>
            <tr  class="danger">
                <th colspan="6" style="text-align: right;"><b>TOTAL COUNTRYTICKETS.EU: </b></th>
                <th style="text-align: right;">10.89€</th>
             </tr>
           <tr class="danger">
                <th colspan="6" style="text-align: right;"><b>TOTAL ORGANISATEURS: </b></th>
                <th style="text-align: right;">59.11€</th>
             </tr>


        </tbody>
    </table>
</div>



<?php require 'inc/footer.php';
