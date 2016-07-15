<?php

function auth_needed() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "vous n'avez pas le droit d'accéder à cette page";
        header('Location: login.php');
        exit();
    }
}

function str_random($length) {
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}