<?php
include('../session.php');
require_once('../database/connect.php');

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}elseif(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
}

$sqlSelect = "SELECT * FROM `dagboek` WHERE user_id = '" . $user_id . "' ORDER BY start";
$resultSelect = $db->query($sqlSelect);

if (mysqli_num_rows($resultSelect) >= 1) {
} else {

};

if (isset($_POST['submit'])) {
    $datum = $_POST['datum'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $score = $_POST['rating'];
    $color = $_POST['rating'];
    $backgroundcolor = "";

    //kleuren bij aangemaakte gebeurtenis adhv score dag
    if ($color === "Erg slecht"){
        $color = "#FF0D0D";
        $backgroundcolor = "#FF0D0D";
    }else if ($color === "Slecht"){
        $color = "#FF8E15";
        $backgroundcolor = "#FF8E15";
    }else if ($color === "Neutraal"){
        $color = "#FAB733";
        $backgroundcolor = "#FAB733";
    }else if ($color === "Goed") {
        $color = "#ACB334";
        $backgroundcolor = "#ACB334";
    }else if ($color === "Erg goed"){
        $color = "#69B34C";
        $backgroundcolor = "#69B34C";
    }

//pak dagboek van de ingelogde user
    $ifexist = "SELECT * FROM `dagboek` WHERE `start` = '$datum' AND $user_id = `user_id`";
    $ifexistResult = mysqli_query($db, $ifexist);

    $sql = "INSERT INTO `dagboek`(`start`,`title`, `comment`, `score`, `color`, `user_id`, `backgroundColor`) VALUES ('$datum', '$title', '$comment', '$score', '$color', '$user_id', '$backgroundcolor')";

    if (mysqli_num_rows($ifexistResult) >= 1) {
        //Nothing
    } else {
        $sqlResult = mysqli_query($db, $sql);
        Header('Location: ' . $_SERVER['PHP_SELF']);
    }

    $db->close();
}
//verwijderen dagboek fragment

if (isset($_POST['verwijder'])) {

    $id = $_POST['idpost'];

    $sql = "DELETE FROM `dagboek` WHERE id = '$id' AND $user_id = `user_id`";

    if ($db->query($sql) === TRUE) {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
  Gebeurtenis succesvol verwijderd
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    $db->close();

}
//bewerken dagboek fragment
if (isset($_POST['bewerken'])) {
    // Id gegevens
    $id = $_POST['idpostedit'];

    // Gegevens uit form ophalen
    $datum = $_POST['datumedit'];
    $title = $_POST['titleedit'];
    $comment = $_POST['commentedit'];
    $score = $_POST['ratingedit'];
    $color = $_POST['ratingedit'];
    $backgroundcolor = "";

    if ($color === "Erg slecht"){
        $color = "#FF0D0D";
        $backgroundcolor = "#FF0D0D";
    }else if ($color === "Slecht"){
        $color = "#FF8E15";
        $backgroundcolor = "#FF8E15";
    }else if ($color === "Neutraal"){
        $color = "#FAB733";
        $backgroundcolor = "#FAB733";
    }else if ($color === "Goed") {
        $color = "#ACB334";
        $backgroundcolor = "#ACB334";
    }else if ($color === "Erg goed"){
        $color = "#69B34C";
        $backgroundcolor = "#69B34C";
    }
    $sql = "UPDATE `dagboek` SET `start`='$datum',`title`='$title',`comment`='$comment',`score`='$score',`color`='$color',`backgroundColor`='$backgroundcolor' WHERE id = '$id' AND user_id = '$user_id'";

    // uitvoeren
    if ($db->query($sql) === TRUE) {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
  Gebeurtenis succesvol bewerkt
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } else {
        echo "Error updating record: " . $db->error;
    }

    $db->close();
}

?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
    <title>Sfeer</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <!-- vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href='../style/calender.css' rel='stylesheet'/>
    <script src='../diary/main.js'></script>
    <script>
        //dagboek calender view
        function hideview(){
            $("#viewmodal").modal("hide");
        }
        function showview(){
            $("#deletemodal").modal("hide");
            $("#viewmodal").modal("show");
        }
        document.addEventListener('DOMContentLoaded', function () {
            let today = new Date();
            let dd = today.getDate();
            let mm = today.getMonth() + 1;
            let yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            today = yyyy + '-' + mm + '-' + dd;

            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                height: "auto",
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today',
                },

                // Dag van datum waarop de calender moet openen
                initialDate: today,

                navLinks: false, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,

                // Selecteren van datum
                select: function (arg) {
                    $("#myModal").modal("show");
                    document.getElementById("datum").value = arg.startStr;
                    document.getElementById("title").value = "";
                    document.getElementById("comment").value = "";
                    document.getElementById("rating").value = "";
                    calendar.unselect()
                },

                //View modal
                eventClick: function (arg) {
                    $("#viewmodal").modal("show");
                    console.log(arg.event._def);
                    document.getElementById("titleview").innerHTML = arg.event._def.title;
                    document.getElementById("datumview").innerHTML = "Datum: " + arg.event.startStr;
                    document.getElementById("ratingview").innerHTML = "Score: " + arg.event._def.extendedProps.score;
                    document.getElementById("commentview").innerHTML = "Beschrijving: " + arg.event._def.extendedProps.comment;
                    document.getElementById("idpost").value = arg.event._def.publicId;
                    $('#editmodal').on('shown.bs.modal', function () {
                        document.getElementById("titleedit").value = arg.event._def.title;
                        document.getElementById("datumedit").value = arg.event.startStr;
                        document.getElementById("ratingedit").value = arg.event._def.extendedProps.score;
                        document.getElementById("commentedit").value = arg.event._def.extendedProps.comment;
                        document.getElementById("idpostedit").value = arg.event._def.publicId;

                    })
                },

                editable: false,

                dayMaxEvents: true, // allow "more" link when too many events

                events: {

                    url: "diarydataJson.php"

                }
            });

            calendar.render();
        });

    </script>


</head>
<body class="menu1">
<!--popup-->
<div class="alert alert-info alert-dismissable" role="alert">
    Hier kunt u uw eigen ervaringen opschrijven. Dit is geheel privé en alleen u kan uw berichten zien.
    U kunt uw berichten per dag aanmaken door op de dag in de kalender te klikken.
    Hieruit kunt u uw ervaringen typen.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>

<div class="max100">
    <div class="menu1">
        <div class="container">
            <a href="../index.php" class="no-deco-link">
                <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
            </a>
            <div id='calendar'></div>
        </div>
    </div>
</div>

<!--            modal diary view-->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container d-flex justify-content-center">
            <div class="card w-100" >
                <div class="modal-content w-100">
                    <div class="d-flex justify-content-center">
                        <h1 id="titleview" class="p-2 card-title"></h1>
                    </div>
                    <div class="d-flex flex-column justify-content-center card-body">
                        <div class="m-0">
                            <p class="p-2" id="datumview"></p>
                            <p class="p-2" id="commentview"></p>
                            <p class="p-2" id="ratingview"></p>
                        </div>
                        <div class="d-flex flex-row">
                            <a style="font-size: 5vh" class="no-deco-link fa fa-trash-o p-1" href="#deletemodal" onclick="hideview()" data-toggle="modal" data-target="#deletemodal"></a>
                            <a style="font-size: 5vh" class="no-deco-link fa fa-edit p-1" href="#editmodal" onclick="hideview()" data-toggle="modal" data-target="#editmodal"></a>
                            <a style="font-size: 5vh" class="no-deco-link fa fa-download p-1"  onclick="hideview()"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal delete-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container d-flex justify-content-center">
            <div class="modal-body">
                <div class="modal-content border border-danger">
                    <div class="d-flex justify-content-center">
                        <h3 id="titleview" class="p-2 card-title">Verwijder gebeurtenis</h3>
                    </div>
                    <div class="d-flex justify-content-center card-body">
                        <div class="flex-column">

                                <p class="p-2"> Weet u zeker dat u deze gebeurtenis wilt verwijderen?</p>
                            <form action="" method="post" id="deleteform">
                                <input type="hidden" id="idpost" name="idpost">
                                <input type="submit" class="p-2" value="verwijder" name="verwijder"/>
                            </form>
                            <input type="submit" class="p-2" value="Annuleren" name="annuleer" onclick="showview()"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal create-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container d-flex justify-content-center">
            <div class="card">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <h1 class="card-title">Dagboek invullen</h1>
                    </div>
                    <div class="d-flex justify-content-center card-body">
                        <form action="" method="post" id="form">
                            <div class="form-group">
                                <label for="datum">datum van de dag:</label>
                                <input class="form-control" type="date" id="datum" name="datum" required="required">
                            </div>
                            <div class="form-group">
                                <label for="title">Titel</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       required="required"
                                       placeholder="Geef je dag een titel...">
                            </div>
                            <div class="form-group">
                                <label for="rating">Wat voor score zou je het geven?</label>
                                <select id="rating" name="rating" class="form-control">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Erg slecht">Erg slecht</option>
                                    <option value="Slecht">Slecht</option>
                                    <option value="Neutraal">Neutraal</option>
                                    <option value="Goed">Goed</option>
                                    <option value="Erg goed">Erg goed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Wat vond je van vandaag?</label>
                                <small id="count" class="form-text text-muted"></small>
                                <textarea class="form-control" id="comment" rows="4" cols="50" name="comment"
                                          form="form"
                                          required="required" onkeyup="charcountupdate(this.value)"
                                          placeholder="Schrijf over je dag..."></textarea><br>
                            </div>
                            <div class="form-group">
                                Bijlage toevoegen:<br>
                                <i class="material-icons">attachment</i>

                            </div>
                            <input type="submit" value="Submit" name="submit"/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal edit-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="overflow:scroll; overflow-x:hidden">
    <div class="modal-dialog" role="document">
        <div class="container d-flex justify-content-center">
            <div class="card">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <h1 class="card-title">Gebeurtenis bewerken</h1>
                    </div>
                    <div class="d-flex justify-content-center card-body">
                        <form action="" method="post" id="form">
                            <div class="form-group">
                                <label for="datum">datum van de dag:</label>
                                <input class="form-control" type="date" id="datumedit" name="datumedit" required="required">
                            </div>
                            <div class="form-group">
                                <label for="title">Titel</label>
                                <input type="text" class="form-control" id="titleedit" name="titleedit"
                                       required="required"
                                       placeholder="Geef je dag een titel...">
                            </div>
                            <div class="form-group">
                                <label for="comment">Wat vond je van vandaag?</label>
                                <small id="countedit" class="form-text text-muted"></small>
                                <textarea class="form-control" id="commentedit" rows="4" cols="50" name="commentedit" onkeyup="charcountupdateedit(this.value)" placeholder="Schrijf over je dag..." required></textarea><br>
                            </div>
                            <div class="form-group">
                                <label for="rating">Wat voor score zou je het geven?</label>
                                <select id="ratingedit" name="ratingedit" class="form-control">
                                    <option value="" selected disabled hidden></option>
                                    <option value="Erg slecht">Erg slecht</option>
                                    <option value="Slecht">Slecht</option>
                                    <option value="Neutraal">Neutraal</option>
                                    <option value="Goed">Goed</option>
                                    <option value="Erg goed">Erg goed</option>
                                </select>
                            </div>
                            <input type="hidden" id="idpostedit" name="idpostedit">
                            <input type="submit" value="Submit" name="bewerken"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    //karakter count
    function charcountupdate(str) {
        let lng = str.length;
        document.getElementById("count").innerHTML = lng + '/5000 characters';
    }
    function charcountupdateedit(str) {
        let lng = str.length;
        document.getElementById("countedit").innerHTML = lng + '/5000 characters';
    }
</script>
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