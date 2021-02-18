<?php require_once '../session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Co-Connect</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<div class="menu1 min-100 add-space">
    <div class="alert alert-info alert-dismissable" role="alert">
        Het berichtenbord wordt gebruikt om berichten te sturen, die het hele bedrijf kan zien.
        U bent anoniem wanneer u deze berichten aanmaakt, maar de berichten kunnen door iedereen worden bekeken.
        U kunt de berichten positief, negatief of neutraal aankaarten, naar gelieve. U kunt ook "tags" aan u bericht toevoegen.
        Verder kunt op "tags" zoeken naar berichten met deze "tags".
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="container">
        <div class="d-flex flex-row justify-content-between">
            <a href="../index.php" class="no-deco-link">
                <i class="fa fa-mail-reply" style="font-size: 6vh; color: white;"></i>
            </a>
        </div>
        <main>

            <form id="filter" method="get" class="">
                <div class="card">
                    <div class="row">
                        <div class="col-sm d-flex justify-content-start">
                            <ul class="nav nav-tabs" id="navBar"><?php

                                $tabs = ['Alles','Positief','Neutraal','Negatief'];

                                foreach ($tabs as $tab) {
                                    echo '<li class="nav-item">
                                        <a href="#  " class="nav-link ';

                                    if(!isset($_GET['mood']) && $tab == 'Alles'){
                                        echo 'active';
                                    }elseif($_GET['mood'] == $tab){
                                        echo 'active';
                                    }

                                    echo'" >' . $tab . '</a>
                                    </li>';
                                }
                            ?></ul>
                            <input type="hidden" name="mood" id="mood" value="<?php

                            if (isset($_GET['mood'])){
                                echo $_GET['mood'];
                            }else{
                                echo 'Alles';
                            }

                            ?>">
                        </div>

                        <div class="col-sm d-flex justify-content-end form-inline mr-2">
                            <select name="order" class="form-control">\
                                <option value="">Sorteer</option><?php

                                $order = ['Nieuwste','Oudste'];

                                foreach ($order as $order){
                                    echo '<option value="'.$order.'"';

                                    if(isset($_GET['order']) && $_GET['order'] == $order){
                                        echo "selected";
                                    }

                                    echo '>'.$order.'</option>';
                                }

                                ?>
                            </select>
                            <input class="form-control" type="text" name="search" placeholder="Zoek..."
                               value="<?php if (isset($_GET['search'])) {
                                   echo $_GET['search'];
                                   } ?>">
                            <input type="submit" class="btn menu2" value="Zoek">
                        </div>
                    </div>
                </div>
            </form>

            <posts id="load_data" class="d-block">
            </posts>
            <div id="load_data_message" class="d-flex justify-content-center">
            </div>

        </main>
    </div>

    <div class="fixed-bottom container text-center menu1 pt-2 pb-2">
        <div class="row">

            <div class="col-xs-4">

            </div>
            <a href="post.php" class="col-xs-4">
                <svg width="8vh" height="8vh" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" style="color:white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </a>

            <div class="col-xs-3">

            </div>

            <div class="col-xs-1">
                <svg onclick="topFunction()" width="8vh" height="8vh" id="myBtn" viewBox="0 0 16 16" class="bi bi-arrow-up-circle-fill" style="color:white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                </svg>
            </div>



        </div>
    </div>
</div>
<script src="infiniteScroll.js"></script>
<script src="general.js"></script>
</body>
</html>