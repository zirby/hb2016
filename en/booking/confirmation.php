<?php 
require 'inc/function.php';
auth_needed();

//$j = substr($_SESSION['jour'], 3);
$index = "index.php";
//var_dump($_SESSION['auth']);
//die();

?>
<?php require 'inc/header.php'; ?>
<div class="row">
    <div class="col-md-4 text-left">
        <a href="<?= $index ?>" class="btn btn-primary btn-lg" title="<retour"  role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
    </div>
    <div class="col-md-4">
        <p style="text-align: center"><h1>Bevestiging</h1></p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 text-left">
        <div class="panel panel-info">
            <div class="panel-heading">Verzonden : </div>
            <div class="panel-body">
                <?= $_SESSION['auth']->firstname; ?>  <b><?= $_SESSION['auth']->lastname; ?></b><br>
                <?= $_SESSION['auth']->address; ?><br>
                <?= $_SESSION['auth']->code; ?> <?= $_SESSION['auth']->localite; ?><br>
                <?= $_SESSION['auth']->country; ?><br><br>
            </div>
            <div class="panel-footer text-right">
                <a href="account.php" role="button" class="btn btn-info">Verandering</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-left">
        <div class="panel panel-success">
            <div class="panel-heading">Bestelling : </div>
            <div class="panel-body">
                <table class="table">
                    <tr><th><?= $_SESSION['placeBloc']; ?></th><th><?= $_SESSION['placeFullNb']; ?> plaats(en)</th></tr>
               </table>
            </div>
            <div class="panel-footer text-right">
                Voor een totaal van: <b><?= $_SESSION['priceTot']; ?> €</b>
            </div>
        </div>
    </div>

</div>


<form action="commandes.php" method="POST">
        <button type="submit" id="btnPrePayer" name="btnPrePayer"  class="btn btn-primary btn-lg">Bevestigen</a>
</form>




<?php require 'inc/footer.php';