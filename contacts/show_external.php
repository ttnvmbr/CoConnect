<?php
include('../database/connect.php');
if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $contactId = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM external_contacts WHERE id = " . mysqli_escape_string($db, $contactId);
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $contact = mysqli_fetch_assoc($result);
    }
    else {
        // redirect when db returns no result
        header('Location: external_conacts.php');
        exit;
    }};
//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body class="menu2 mh-100">
<div class="menu2">
    <div class="container">
        <a href="external_contacts.php" class="no-deco-link">
            <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
        </a>
        <h1><?= $contact['name']?></h1>
        <div class="card rounded">
            <div class="card-body">
                <p><b>Beroep: </b><?= $contact['job']?></p>
                <p><b>Telefoonnummer: </b><a href="tel:<?= $contact['phone']?>"><?= $contact['phone']?></a></p>
                <p><b>Email: </b><a href = "mailto:<?= $contact['email']?>"><?= $contact['email']?></a></p>
                <p><b>Locatie: </b><?= $contact['location']?></p>
            <?php if(strlen($contact['description']) > 0){?>
                <p><b>Beschrijving: </b><?= $contact['description']?></p>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
