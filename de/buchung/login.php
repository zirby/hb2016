<?php 
session_start();

require_once '../../inc/conn.php';

//$j = substr($_SESSION['jour'], 3);
$index = "index.php";
if(isset($_SESSION['auth'])){
    $user = $_SESSION['auth'];
    $email = $user->email;
    $psswd = "";
}else{
    $email = "";
    $psswd = "";
}


if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
    $req = $pdo->prepare("SELECT * FROM hb16_users WHERE email = ?");
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user && password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success']="Sie sind verbunden";
        if(!$_SESSION['placeFullNb'] && !$_SESSION['placeHalfNb'] ){
            header('Location: reservations.php');
        }else{
            header('Location: confirmation.php');
        }
        exit();
    }else{
        $_SESSION['flash']['danger']="E-Mail oder Passwort falsch";
        //header('Location: login .php');
    }
}
?>
<?php require 'inc/header.php'; ?>
        <div class="row">
            <div class="col-md-4 text-left">
                <a href="<?= $index ?>" class="btn btn-primary btn-lg" title="<terug" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4">
                <p style="text-align: center"><h1>Einloggen</h1></p>
            </div>
        </div>
<div class="col-md-6">
    <div class="alert alert-success" role="alert">
        <p><strong>Zur Bestätigung Ihrer Buchung</strong><br /></p>
        Sie müssen angemeldet sein.
        <div style="height: 40px;"></div>
        <p>Noch nicht registriert?</p>
        <div style="height: 40px;"></div>
        <a href="register.php" id="btnSinscrire" type="button" class="btn btn-success btn-lg">Registrieren! </a>
    </div>
    
</div>
<div class="col-md-6">
<form action="" method="POST" class="form-horizontal">
  <fieldset>
    <legend><h3>Einloggen</h3></legend>
    <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <ul>
            <?php  foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php  endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="email" class="col-lg-4 control-label">E-Mail</label>
      <div class="col-lg-8">
          <input class="form-control" name="email" id="email" placeholder="E-Mail" type="text" value="<?= $email; ?>">
      </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-lg-4 control-label">Passwort</label>
      <div class="col-lg-8">
          <input class="form-control" name="password" id="password" placeholder="Passwort" type="password" value="<?= $psswd; ?>">
        <span class="help-block"><a href="forget.php">(Ich habe mein Passwort vergessen)</a></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-4">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php require 'inc/footer.php';