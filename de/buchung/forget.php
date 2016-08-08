<?php require 'inc/function.php'; ?>
<?php 
session_start();
if(!empty($_POST) && !empty($_POST['email']) ){
    $errors = array();
    require '../../inc/conn.php';
    $req = $pdo->prepare("SELECT * FROM hb16_users WHERE email = ?");
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        $reset_token = str_random(60);
        $req = $pdo->prepare("UPDATE hb16_users SET reset_token = ? , reset_at = NOW() WHERE id = ?");
        $req->execute([$reset_token, $user->id]);
        // envoie du mail
        $destinataire = $_POST['email'];
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = 'reservation@countrytickets.eu';
        $objet = 'Resetten van het wachtwoord'; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
        $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
        $headers .= 'From: "Countrytickets.eu"<'.$expediteur.'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">Om uw wachtwoord opnieuw in te stellen, dank u om te klikken op deze link<br />http://Countrytickets.eu/Hand_2016/de/buchung/reset.php?id='.$user->id.'&token='.$reset_token.'</div>';
        if (mail($destinataire, $objet, $message, $headers)){        
            header('Location: login.php');
            exit();
        }else{
            $req = $pdo->prepare("INSERT INTO hb16_logs SET description = ?,user_id = ?,date_log = NOW()");
            $req->execute(["Mail reset mot de passe pas envoyé", $user->id ]);
            header('Location: login.php');
            exit();
        }
    }else{
        $errors['nomail']="<div class='alert alert-danger'>geen rekening overeenkomt met deze e-mail</div>";
    }
}
?>
<?php require 'inc/header.php'; ?>
<form action="" method="POST" class="form-horizontal">
  <fieldset>
    <legend><h1>Wachtwoord vergeten</h1></legend>
    <p>Wachtwoord herinnering aan de instructies zal worden verzonden per e-mail</p>
    <?php if(!empty($errors)):?>
            <?php  foreach($errors as $error): ?>
                <?= $error; ?>
            <?php  endforeach; ?>
    <?php endif; ?>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input class="form-control" name="email" id="email" placeholder="Email" type="email">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


<?php require 'inc/footer.php'; ?>
