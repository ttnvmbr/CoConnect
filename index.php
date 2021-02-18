<?php

session_start();

require_once "authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: login.php");
}

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
    <title>Co-Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body class="h-100">
<div class="height10">
<div class="d-flex justify-content-end position-absolute fixed-top mt-0">
        <a style="font-size: 20px;" class="m-0 no-deco-link align-self-end" href="logout.php"><i class="d-flex justify-content-end align-self-center fa fa-sign-out" style="font-size: 50px;" alt="log-out"></i></a>

</div>
<div class="d-flex justify-content-center h-100">
    <img class="img-fluid max20" src="images/logo_blue.png" alt="App logo">
</div>
</div>
<div class="menu1 height30 d-flex justify-content-around">
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="diary/diary.php"><i class="d-flex justify-content-center align-self-center fa fa-book" style="font-size: 70px;"alt="icon"></i><br>Privé dagboek</a>
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="message_board/message-board.php"><i class="d-flex justify-content-center align-self-center fa fa-comments-o" style="font-size: 70px;"alt="icon"></i><br>Berichtenbord</a>

</div>
<div class="menu2 height30 d-flex justify-content-around">
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="contacts/contacts_menu.php"><i class="d-flex justify-content-center align-self-center fa fa-address-book-o" style="font-size: 70px;"alt="icon"></i><br>Contacten</a>
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="info/infoHome.php"><i class="d-flex justify-content-center align-self-center fa fa-info" style="font-size: 70px;"alt="icon"></i><br>Informatie</a>
</div>
<div class="menu3 height30 d-flex justify-content-around">
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="profile/"><i class="d-flex justify-content-center align-self-center fa fa-user-circle-o" style="font-size: 70px;"alt="icon"></i><br>Profiel</a>
    <a style="font-size: 20px;"class="no-deco-link align-self-center" href="settings/settings.php"><i class="d-flex justify-content-center align-self-center fa fa-gear" style="font-size: 70px;"alt="icon"></i><br>Instellingen</a>
</div> 



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>