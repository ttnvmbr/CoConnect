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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Instellingen</title>
</head>
<body class="menu2">

<div class="container">
    <a href="../index.php" class="no-deco-link">
        <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
    </a>
            <div class="card">
                <div class="card-body">
                    <h1>Welkom <?=$result['name']?></h1>
                    <p>Dit is uw instellingen pagina. U kunt hier uw instellingen aanpassen die met de applicatie te maken hebben.
                    </p>
                </div>
            </div>
            <div class="d-flex flex-column" style="font-size: 3vh">
                <div class="p-2 m-0 alert alert-primary">
                    <li class="fa fa-arrow-right"><a class="no-deco-link" href="tips.php"> Notificaties aan/uit</a>

                    </li><label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="p-2 m-0 alert alert-primary">
                    <li class="fa fa-arrow-right"><a class="no-deco-link" href="applicatieInfo.php"> Algemene informatie over deze
                            applicatie </a></li>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>