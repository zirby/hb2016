<?php
//require 'inc/function.php';
session_start();
require_once '../../inc/conn.php';
//$j = substr($_SESSION['jour'], 3);
$index = "index.php";

if(!empty($_POST)){
    
    $errors = array();
    
    
    if(empty($_POST['lastname'])){$errors['lastname']="Entrez votre nom";}
    if(empty($_POST['firstname'])){$errors['firstname']="Entrez votre prénom";}
    if(empty($_POST['inputAdr'])){$errors['inputAdr']="Entrez votre adresse";}
    if(empty($_POST['inputZip'])){$errors['inputZip']="Entrez votre code postal";}
    if(empty($_POST['inputLocal'])){$errors['inputLocal']="Entrez votre localité";}
    if(empty($_POST['inputPhone'])){$errors['inputPhone']="Entrez votre n° de téléphone";}
    if(empty($_POST['inputEmail']) || !filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)){
        $errors['email']="Votre e-mail n'est pas valide";
    }else{
        $req = $pdo->prepare("SELECT id FROM hb16_users WHERE email = ?");
        $req->execute([$_POST['inputEmail']]);
        $user = $req->fetch();
        if($user){
            $errors['email']= "Ce mail est déjà utilisé";
        }
        
    }
   if(empty($_POST['password']) || $_POST['password'] != $_POST['passwordconfirm']){
        $errors['password']="Mot de passe non valide";
    }
    if (empty($errors)){
        
        $req = $pdo->prepare("INSERT INTO hb16_users SET firstname = ?,lastname = ?,address = ?,code = ?,localite = ?,country=?,telephone = ?, email = ?, password = ? ");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $req->execute([$_POST['firstname'],$_POST['lastname'],$_POST['inputAdr'],$_POST['inputZip'],$_POST['inputLocal'],$_POST['inputPays'],$_POST['inputPhone'], $_POST['inputEmail'], $password]);
        $user_id = $pdo->lastInsertId();
        //mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/coupe_davis_2016/confirm.php?id={$user_id}&token=$token");
        $reqS = $pdo->prepare("SELECT * FROM hb16_users WHERE id = ?");
        $reqS->execute([$user_id]);
        $user = $reqS->fetch();
        $_SESSION['auth'] = $user;
        //$_SESSION['flash']['success'] = "Un e-mail de confirmation vous a été envoyé";
        if(!$_SESSION['placeFullNb']){
            header('Location: '.$index);
        }else{
            header('Location: confirmation.php');
        }
        exit();

    }
}
?>
<?php require 'inc/header.php'; ?>
<form action="" method="POST" class="form-horizontal">
  <fieldset>
    <legend>
        <div class="row">
            <div class="col-md-4 text-left">
                <a href="<?= $index ?>" class="btn btn-primary btn-lg" title="<retour"  role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4">
                <p style="text-align: center"><h1>Inschrijven</h1></p>
            </div>
        </div>
    </legend>
    <p class="text-primary">Onthoud uw e-mail en uw wachtwoord. Zij zullen in geval van een bijkomende aanmelding worden gevraagd</p>
     <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <ul>
            <?php  foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php  endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="lastname" class="col-lg-3 control-label">Naam<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" style="text-transform: uppercase" name="lastname" id="lastname" placeholder="Naam">
        </div>
      </div>
      <div class="form-group">
        <label for="firstname" class="col-lg-3 control-label">Voornaam<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Voornaam">
          <span id="helpFirstName"></span>
        </div>
      </div>

    <div class="form-group">
        <label for="inputAdr" class="col-lg-3 control-label">Adres<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="inputAdr" id="inputAdr" placeholder="Adres">
          <span id="helpAdr"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="inputZip" class="col-lg-3 control-label">Postcode<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="inputZip" id="inputZip" placeholder="Postcode">
          <span id="helpZip"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="inputLocal" class="col-lg-3 control-label">Gemeente<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="inputLocal" id="inputLocal" placeholder="Gemeente">
          <span id="helpLocal"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPays" class="col-lg-3 control-label">Land<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="inputPays" id="inputPays" placeholder="Land">
          <span id="helpPays"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">E-Mail<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="E-Mail">
          <span id="helpEmail"></span>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmailConfirm" class="col-lg-3 control-label">Bevestiging e-mail<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="email" class="form-control" name="inputEmailConfirm" id="inputEmailConfirm" placeholder="E-Mail">
          <span id="helpEmailConfirm"></span>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPhone" class="col-lg-3 control-label">Telefoonnumber<sup style="color:red;">*</sup></label>
        <div class="col-lg-9">
          <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Telefoonnumber">
          <span id="helpPhone"></span>
        </div>
      </div>
    <div class="form-group">
      <label for="password" class="col-lg-3 control-label">Wachtwoord<sup style="color:red;">*</sup></label>
      <div class="col-lg-9">
        <input class="form-control" name="password" id="password"  type="password" placeholder="Wachtwoord">
      </div>
    </div>
    <div class="form-group">
      <label for="passwordconfirm" class="col-lg-3 control-label">Bevestig wachtwoord<sup style="color:red;">*</sup></label>
      <div class="col-lg-9">
        <input class="form-control" name="passwordconfirm" id="passwordconfirm"  type="password" placeholder="Wachtwoord">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

    </div>
</form>

<?php require 'inc/footer.php';