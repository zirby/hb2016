<?php

$locale = locale_get_default();
$langue = locale_get_primary_language ($locale );
$localel = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hand_2016</title>
</head>
<body>

    <h1>Page Hand_2016</h1>
    <p>Première page.</p>
    <p>La locale est: <?= $locale; ?>
    <p>La langue est: <?= $langue; ?>
    <p>La locale langue est: <?= $localel; ?>

</body>
</html>