<?php
session_start();

require "login/Util.php";
$util = new Util();

//Clear Session
$_SESSION["id"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

header("Location: login.php");
?>