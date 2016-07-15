<?php


$localel = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

switch (substr($localel, 0, 2)) {
    case 'fr':
        header('Location: fr/reservation/index.php');
        break;
    case 'nl':
        header('Location: nl/boeking/index.php');
        break;
    case 'de':
        header('Location: de/buchung/index.php');             
        break;
    case 'en':
        header('Location: en/booking/index.php');
        break;
    
    default:
        header('Location: fr/reservation/index.php');
        break;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hand_2016</title>
</head>
<body>

    <h1>Page Hand_2016</h1>


    <p>Locale language: <?= $localel; ?>

</body>
</html>