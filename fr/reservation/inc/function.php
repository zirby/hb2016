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