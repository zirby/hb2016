<?php require 'inc/function.php'; ?>
<?php 
session_start();

//$j = substr($_SESSION['jour'], 3);
$index = "index".$j.".php";
if(isset($_GET['id']) && isset($_GET['token'])){
    require '../../inc/conn.php';
    $req = $pdo->prepare("SELECT * FROM hb16_users WHERE id = ? and reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL '30' MINUTE)");
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if($user){
        if(!empty($_POST) && $_POST['password'] == $_POST['passwordConfirm']){
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $req = $pdo->prepare("UPDATE hb16_users SET password = ?, reset_token = NULL, reset_at = NULL  WHERE id=?");
            $req->execute([$password, $user->id]);
            $_SESSION['flash']['success'] = "het wachtwoord in om met succes opnieuw in te stellen";
            $_SESSION['auth'] = $user;
        if(!$_SESSION['placeNb']){
            header('Location: reservations.php');
            exit();
        }else{
            header('Location: commandes.php');
            exit();
        }
    }else{
            echo "Wachtwoorden zijn niet identiek";
        }
    }else{
        echo  "Deze token is ongeldig";
        header('Location: login.php');
        exit();
    }
}else {
    header('Location: login.php');
    exit();
}
?>
<?php require 'inc/header.php'; ?>
<form action="" method="POST" class="form-horizontal">
  <fieldset>
    <legend><h1>Het wachtwoord wijzigen</h1></legend>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Wachtwoord</label>
      <div class="col-lg-10">
        <input class="form-control" name="password" id="password" placeholder="wachtwoord wijzigen" type="password">
      </div>
    </div>
    <div class="form-group">
      <label for="passwordConfirm" class="col-lg-2 control-label">Bevestig wachtwoord</label>
      <div class="col-lg-10">
        <input class="form-control" name="passwordConfirm" id="password" placeholder="bevestig wachtwoord" type="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </fieldset>
</form>


<?php require 'inc/footer.php'; 
