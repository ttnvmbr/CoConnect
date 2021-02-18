<?php
include('../database/connect.php');

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $contactId    = mysqli_escape_string($db, $_POST['id']);
    $name     = mysqli_escape_string($db, $_POST['name']);
    $email       = mysqli_escape_string($db, $_POST['email']);
    $phone      = mysqli_escape_string($db, $_POST['phone']);
    $description      = mysqli_escape_string($db, $_POST['description']);
    $function    = mysqli_escape_string($db, $_POST['function']);



    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $contact = [
        'name'    => $name,
        'email'      => $email,
        'phone'    => $phone,
        'description'      => $description,
        'function'    => $function,
    ];


    //Update the record in the database
    $query = "UPDATE internal_contacts
                  SET name = '$name', email = '$email', phone = '$phone', description = '$description', function = '$function'
                  WHERE id = '$contactId'";
    $result = mysqli_query($db, $query);

    if ($result) {
        header('Location: internal_contacts.php');
        exit;
    } else {
        $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
    }

}
else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $contactId = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM internal_contacts WHERE id = " . mysqli_escape_string($db, $contactId);
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $contact = mysqli_fetch_assoc($result);
    }
    else {
        // redirect when db returns no result
        header('Location: internal_contacts.php');
        exit;
    }
} else {
    header('Location: internal_contacts.php');
    exit;
}

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
    <title>Edit - <?= $contact['name'] ?></title>
</head>
<body class="menu1">
<div class="menu1">
<div class="container">
    <a href="internal_contacts.php" class="no-deco-link">
        <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
    </a>
    <div class="d-flex justify-content-center mt-4">
        <div class="card rounded w-50">
            <div class="card-body">
                <div class="card-title justify-content-center">
                        <h4>Wijzig contactpersoon "<?= $contact['name']?>"</h4>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Naam</label>
                                    <input class="form-control" id="name" type="text" name="name" value="<?= $contact['name'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="function">Functie</label>
                                <input class="form-control" id="function" type="text" name="function" value="<?= $contact['function'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="text" name="email" value="<?= $contact['email'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefoonnummer</label>
                                <input class="form-control" id="phone" type="text" name="phone" value="<?= $contact['phone'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="description">Beschrijving</label>
                                <small id="optional" class="text-muted">Optioneel</small>
                                <input aria-describedby="optional" class="form-control" id="description" type="text" name="description" value="<?= $contact['description'] ?>"/>
                            </div>
                            <div>
                            </div>
                            <input type="hidden" name="id" value="<?= $contactId ?>"/>
                            <input class="btn" type="submit" name="submit" value="opslaan"/>
                            <a class="btn" href="internal_contacts.php">Annuleren</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<div>
</div>
</body>
</html>
