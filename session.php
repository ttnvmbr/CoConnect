<?php 
session_start();

require_once "authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ../login.php");
    exit();
}


if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

?>