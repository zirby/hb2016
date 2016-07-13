<?php
$pdo = new PDO('mysql:dbname=hb2016;host=localhost', 'root', 'root'); // Mac
//$pdo = new PDO('mysql:dbname=hb2016;host=localhost', 'root', 'admin');  // Win 10
//$pdo = new PDO('mysql:dbname=countrytickets_eu_hand2016;host=countrytickets.eu.mysql', 'countrytickets_eu_hand2016', 'handadmin'); // one.com



$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
