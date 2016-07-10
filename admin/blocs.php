<?php 
require_once '../inc/conn.php';



$req = $pdo->prepare("SELECT  * FROM hb16_blocs  ORDER BY name  ");
$req->execute();


?>
<?php require 'inc/header.php'; ?>
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
        <a class="navbar-brand" href="#">Définition des blocs</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><button id="btnDoDispo" type="button" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Places disponibles</button></li>
      </ul>
    </div>
  </div><!-- /.container-fluid -->
</nav>
<div id="jour" hidden="true"><?= $jour; ?></div>
<div class="col-md-12">
    <table class="table table-striped table-hover ">
        <thead>
            <th>Bloc</th>
            <th>Max</th>
            <th>Max Org.</th>
            <th style="text-align: right;">Nb places</th>
            <th style="text-align: right;">Nb places Org.</th>
            <th style="text-align: right;">Prix</th>
            <th style="text-align: right;">Prix Enfant</th>
            <th style="text-align: right;">Prix Abonnement</th>
            <th style="text-align: right;">Prix Abn. Enfant</th>
            <th style="text-align: right;">Action</th>
        </thead>
        <tbody>
            <?php while($res = $req->fetch()): ?>
            <tr>
                <td style="text-align: left;color:red;"><?= $res->name; ?></td>
                <td style="text-align: left;"><?= $res->max; ?></td>
                <td style="text-align: left;"><?= $res->max_org; ?></td>
                <td style="text-align: right;color:red;"><?= $res->places; ?></td>
                <td style="text-align: right;color:red;"><?= $res->places_org; ?></td>
                <td style="text-align: right;"><?= $res->price; ?> €</td>
                <td style="text-align: right;"><?= $res->price_half; ?> €</td>
                <td style="text-align: right;"><?= $res->price_abn; ?> €</td>
                <td style="text-align: right;"><?= $res->price_abn_half; ?> €</td>
                <td style="text-align: right;">
                    <a href="#" class="btn btn-success btn-xs" title="modifier les blocs" 
                       data-toggle="modal" 
                       data-target=".bs-bloc-modal-sm" 
                       data-name="<?= $res->name; ?>" 
                       data-max="<?= $res->max; ?>" 
                       data-max_org="<?= $res->max_org; ?>" 
                       data-price="<?= $res->price; ?>" 
                       data-price_half="<?= $res->price_half; ?>" 
                       data-price_abn="<?= $res->price_abn; ?>" 
                       data-price_abn_half="<?= $res->price_abn_half; ?>" >
                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
             </tr>
             <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal doPlaces-->

<div class="modal fade bs-bloc-modal-sm" id="blocModal" tabindex="-1" role="dialog" aria-labelledby="placesModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Modifier le bloc</h4>
      </div>
     <form action="inc/doBlocs.php?jour=<?= $jour ?>" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="inputBloc" class="control-label">Bloc:</label>
                <input name="inputBloc" id="NPreserve" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="inputMax" class="control-label">Max places:</label>
                <input name="inputMax" id="jour" type="text" class="form-control" >
            </div>            
            <div class="form-group">
                <label for="inputMaxOrg" class="control-label">Max places Org:</label>
                <input name="inputMaxOrg" id="NPreserve" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="inputPrice" class="control-label">Prix places:</label>
                <input name="inputPrice" id="jour" type="text" class="form-control" >
            </div>            
            <div class="form-group">
                <label for="inputPriceHalf" class="control-label">Prix enfants:</label>
                <input name="inputPriceHalf" id="NPreserve" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="inputPriceAbn" class="control-label">Prix Abonnement:</label>
                <input name="inputPriceAbn" id="jour" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="inputPriceAbnHalf" class="control-label">Prix Abn. Enfant:</label>
                <input name="inputPriceAbnHalf" id="jour" type="text" class="form-control" >
            </div>
         </div>
        <div class="modal-footer">
            <button name="btnDoBlocs" id="btnDoBlocsVen" type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
     </form>
    </div>
  </div>
</div>
<?php require 'inc/footer.php';