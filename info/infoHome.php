<?php require_once '../session.php'; ?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <title>Algemene informatie</title>
</head>
<body class="menu2">
<div class="alert alert-info alert-dismissable" role="alert">
    Hier vind u informatie over ongepast gedrag.
    Door op de links te klikken, kunt u meer informatie vinden over het bijbehorende onderwerp.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="container">
    <a href="../index.php" class="no-deco-link">
        <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
    </a>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    <h1>Werkvloer Tips en algemene informatie!</h1>
                    <p>Als medewerker bij een bedrijf, is contact met collega's een onvermijdelijk.<br>
                        Het is mogelijk dat u situaties tegenkomt, die niet altijd even fijn zijn. <br>
                        Op deze pagina bieden wij hier een aantal hulpmiddelen bij.
                    </p>
                </div>
            </div>
                    <div class="d-flex flex-column" style="font-size: 3vh">
                        <div class="p-2 m-0 alert alert-primary">
                            <li class="fa fa-arrow-right"><a class="no-deco-link" href="tips.php"> Tips voor op de
                                    werkvloer </a></li>
                        </div>
                        <div class="p-2 m-0 alert alert-primary">
                            <li class="fa fa-arrow-right"><a class="no-deco-link" href="applicatieInfo.php"> Algemene informatie over deze
                                    applicatie </a></li>
                        </div>
                        <div class="p-2 m-0 alert alert-primary">
                            <li class="fa fa-arrow-right"><a class="no-deco-link" href=""> Het interne klachtenproces
                                    (hoe ziet dit eruit, etc) </a></li>
                        </div>
                        <div class="p-2 m-0 alert alert-primary">
                            <li class="fa fa-arrow-right"><a class="no-deco-link" href=""> Overige opties bij ongewenste
                                    ervaringen </a></li>
                        </div>

                        <div class="p-2 m-0 alert alert-primary">
                            <li class="fa fa-arrow-right"><a class="no-deco-link" href="arbowetInfo.php"> De arbowet </a></li>
                        </div>
                    </div>
        </div>
    </div>
</div>
</body>
</html>