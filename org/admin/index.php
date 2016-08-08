<?php

require_once '../../inc/conn.php';

// faire doDispo ORG avec IDENTIFIANT de ORGANISATEUR
$org = 'URBH'; // id de l'organisateur
$req = $pdo->prepare("SELECT * FROM hb16_blocs" );
$req->execute();

while($res = $req->fetch()){
    $reqReserv = $pdo->prepare("SELECT SUM(r.nbplaces) as splaces, SUM(r.nbplaces_half) as splaces_half FROM hb16_reservations as r, hb16_users as u WHERE r.user_id= u.id AND r.bloc=? AND u.lastname=?  GROUP BY r.bloc ");
    //$reqReserv = $pdo->prepare("SELECT SUM(nbplaces) as splaces, SUM(nbplaces_half) as splaces_half FROM hb16_reservations WHERE (bloc=? AND jour =? AND supprime_le IS NULL) OR (bloc=? AND jour='ABN3J' AND supprime_le IS NULL)");
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
        <button type="button" class="btn btn-default"><h2>Tickets - Organisateurs - <?= $org; ?></h2></button>
    </div>
    <div class="col-md-12" style="height: 20px;"></div>
</div>
<div class="row">

<div class="col-md-6">
    <img src="../../img/hb2016_600_z.jpg" alt="la salle" class="img-rounded displayed" usemap="#map-hb2016_600"/>
<map name="map-hb2016_600" id="map-hb2016_600">
<area id="bloc_a" alt="" title="" href="#" shape="rect" coords="155,266,209,345" />
<area id="bloc_b" alt="" title="" href="#" shape="rect" coords="158,223,207,260" />
<area id="bloc_c" alt="" title="" href="#" shape="rect" coords="160,181,205,218" />
<area id="bloc_d" alt="" title="" href="#" shape="rect" coords="156,91,209,175" />
<area id="bloc_e" alt="" title="" href="#" shape="rect" coords="218,180,245,221" />
<area id="bloc_f" alt="" title="" href="#" shape="rect" coords="217,265,244,324" />
<area id="bloc_g" alt="" title="" href="#" shape="rect" coords="153,61,228,85" />
<area id="bloc_h" alt="" title="" href="#" shape="rect" coords="229,60,304,84" />
<area id="bloc_i" alt="" title="" href="#" shape="rect" coords="307,60,382,84" />
<area id="bloc_j" alt="" title="" href="#" shape="rect" coords="383,59,458,83" />
<area id="bloc_k" alt="" title="" href="#" shape="rect" coords="458,60,533,84" />
<area id="bloc_l" alt="" title="" href="#" shape="rect" coords="479,90,533,138" />
<area id="bloc_m" alt="" title="" href="#" shape="rect" coords="478,142,532,190" />
<area id="bloc_n" alt="" title="" href="#" shape="rect" coords="478,196,532,244" />
<area id="bloc_o" alt="" title="" href="#" shape="rect" coords="478,246,532,294" />
<area id="bloc_p" alt="" title="" href="#" shape="rect" coords="478,299,532,347" />
<area id="bloc_q" alt="" title="" href="#" shape="rect" coords="442,123,472,213" />
<area id="bloc_r" alt="" title="" href="#" shape="rect" coords="442,225,472,315" />
<area id="bloc_s" alt="" title="" href="#" shape="rect" coords="463,356,526,381" />
<area id="bloc_t" alt="" title="" href="#" shape="rect" coords="388,369,437,400" />
<area id="bloc_u" alt="" title="" href="#" shape="rect" coords="300,368,387,399" />
<area id="bloc_v" alt="" title="" href="#" shape="rect" coords="253,367,302,398" />
<area id="bloc_x" alt="" title="" href="#" shape="rect" coords="160,357,220,381" />
<area id="bloc_a_sup" alt="" title="" href="#" shape="rect" coords="94,312,130,374" />
<area id="bloc_b_sup" alt="" title="" href="#" shape="rect" coords="94,245,130,307" />
<area id="bloc_c_sup" alt="" title="" href="#" shape="rect" coords="94,178,130,240" />
<area id="bloc_d_sup" alt="" title="" href="#" shape="rect" coords="94,109,130,171" />
<area id="bloc_e_sup" alt="" title="" href="#" shape="rect" coords="93,43,129,105" />
<area id="bloc_g_sup" alt="" title="" href="#" shape="rect" coords="135,13,214,43" />
<area id="bloc_h_sup" alt="" title="" href="#" shape="rect" coords="219,15,298,45" />
<area id="bloc_i_sup" alt="" title="" href="#" shape="rect" coords="305,14,384,44" />
<area id="bloc_j_sup" alt="" title="" href="#" shape="rect" coords="388,15,467,45" />
<area id="bloc_k_sup" alt="" title="" href="#" shape="rect" coords="473,15,552,45" />
<area id="bloc_l_sup" alt="" title="" href="#" shape="rect" coords="560,42,592,103" />
<area id="bloc_m_sup" alt="" title="" href="#" shape="rect" coords="561,109,593,170" />
<area id="bloc_n_sup" alt="" title="" href="#" shape="rect" coords="560,177,592,238" />
<area id="bloc_o_sup" alt="" title="" href="#" shape="rect" coords="558,242,590,303" />
<area id="bloc_p_sup" alt="" title="" href="#" shape="rect" coords="558,315,590,376" />
<area id="bloc_e0" alt="" title="" href="#" shape="rect" coords="217,118,244,177" />
<area id="bloc_f0" alt="" title="" href="#" shape="rect" coords="217,222,244,263" />
</map>

</div>
<div class="col-md-6">
    <div class="row">
        <div class="col-md-12"><p style="font-size: 1em;"><hr /></b></p></div>
    </div>
    <div class="row">
        <div class="col-md-7 text-left"  ><p style="font-size: 1em;"><b> PLACES DISPONIBLES ORGANISATEUR:</b></p></div>
        <div class="col-md-5" id="pBloc"></div>
    </div>
    <div class="row">
        <div class="col-md-12"><p style="font-size: 1em;"><hr /></b></p></div>
    </div>
    <div class="row">
        <div class="col-md-12"><p style="font-size: 1em;"><b> INDIQUEZ LE NOMBRE DE PLACES</b></p></div>
        <div class="col-md-12 ">
            <div class="input-group">
                <span class="input-group-addon">Place organisateur: </span>
                <input id="inputPlaces" type="text" class="form-control" value="0">
            </div>
        </div>

        <div class="col-md-12"><p style="font-size: 1em;"><b> PRECISEZ LE BENEFICIAIRE</b></p></div>
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon">Bénéficiaire: </span>
                <input id="inputBeneficiaire" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-12"><p style="font-size: 1em;"><b> TYPE DE TICKET</b></p></div>

        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon">Type: </span>

                <!--<input id="inputType" type="text" class="form-control" value="0">-->
                <select id="inputType" class="form-control">
                    <option>VIP</option>
                     <option>Guest</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><p style="font-size: 1em;"><hr /></b></p></div>
        </div>
        <input type="hidden" name="inputOrganisateur" id="inputOrganisateur" value="<?= $org; ?>">
        <p id="salleHelp" style="font-size: 1em;"></p>
         <button id="btnReservOrg" type="button" class="btn btn-primary btn-lg">Réserver</button>
    </div>

</div>
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
      <a class="navbar-brand" href="#">Réservations</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
        </ul>
        <form action="" method="POST" class="navbar-form navbar-right" role="search">
          <div class="form-group">
              <input name="searchNom" type="text" class="form-control" placeholder="Search">
          </div>
              <button name="btnSearchNom" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
        </form>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
<div class="col-md-12">
    <table class="table table-striped table-hover ">
        <thead>
            <th>N°</th>
            <th>Bénéficiaire</th>
            <th>Type</th>
            <th>Bloc</th>
            <th>Nb. places</th>
            <th style="text-align: right;">Réservé le</th>
            <th style="text-align: right;">Action</th>
        </thead>
        <tbody>
            <?php while($res = $req->fetch()): ?>
            <?php $totPlaces = intval($res->nbplaces)+intval($res->nbplaces_half); ?>
            <tr>
                <td style="text-align: left;"><?= $res->rid; ?></td>
                <td style="text-align: left;color:red;"><?= strtoupper($res->firstname); ?></td>
                <td style="text-align: left;"><?= $res->type; ?></td>
                <td style="text-align: left;"><?= $res->bloc; ?></td>
                <td style="text-align: left;"><?= $res->nbplaces; ?></td>
                <td style="text-align: right;"><?= $res->reserve_le; ?></td>
                <td style="text-align: right;">
                    <a href="inc/doSupprimeOrg.php?reserv=<?= $res->rid; ?>" class="btn btn-danger btn-xs" title="supprimer"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                </td>
             </tr>
             <?php endwhile; ?>
        </tbody>
    </table>
</div>



<?php require 'inc/footer.php';
