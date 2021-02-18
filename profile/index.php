<?php
require_once '../session.php';
require_once '../database/connect.php';

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}elseif(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
}

$query = "SELECT `id`, `name`, `email`, `cname`, `admin`, `phone`, `functie` FROM `members` WHERE `id` = '" . $user_id . "'";

$execute = mysqli_query($db,$query);

$result = mysqli_fetch_assoc($execute);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Co-Connect</title>
        <link rel="stylesheet" href="../style/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/style.css">

    </head>
    <body>
        <div class="menu3 min-100 add-space">
            <div class="container">
                <div class="d-flex flex-row justify-content-between">
                    <a href="../index.php" class="no-deco-link">
                        <i class="fa fa-mail-reply" style="font-size: 6vh; color: white;"></i>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>Welkom op je profiel, <?=$result['name']?></h1>
                        <hr>
                        <p>Naam: <?= $result['name']?></p>
                        <p>Wachtwoord: **********</p>
                        <p>Email: <?= $result['email']?></p>
                        <p>Bedrijfsnaam: <?= $result['cname']?></p>
                        <p>Telefoon: <?= $result['phone']?></p>
                        <p>Functie: <?= $result['functie']?></p>

                    </div>
                </div>
        </div>
    </body>
</html>