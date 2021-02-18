<?php
include('../database/connect.php');

if (isset($_POST['submit'])) {
    // DELETE
    // To remove contact we need to query the file name from the db.
    // Get contact from the database result
    $query = "SELECT * FROM internal_contacts WHERE id = " . mysqli_escape_string($db, $_POST['id']);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query );

    $contact = mysqli_fetch_assoc($result);

    // DELETE DATA
    // Remove the contact data from the database
    $query = "DELETE FROM internal_contacts WHERE id = " . mysqli_escape_string($db, $_POST['id']);

    mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

    //Close connection
    mysqli_close($db);

    //Redirect to homepage after deletion & exit script
    header("Location: internal_contacts.php");
    exit;

} else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $contactId = $_GET['id'];

    //Get contact from the database result
    $query = "SELECT * FROM internal_contacts WHERE id = " . mysqli_escape_string($db, $contactId);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query );

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
    // Id was not present in the url OR the form was not submitted

    // redirect
    header('Location: internal_contacts.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>Delete - <?= $contact['name'] ?></title>
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
                <h4>Verwijder contactpersoon <?= $contact['name'] ?></h4>
            </div>
        <form action="" method="post" >
            <p>
                Weet u zeker dat u "<?= $contact['name']?>" wilt verwijderen uit de interne contactenlijst?
            </p>
        <br>
        <input type="hidden" name="id" value="<?= $contact['id'] ?>"/>
        <input class="btn" type="submit" name="submit" value="Verwijderen"/>
        <a href="internal_contacts.php" class="btn">Annuleren</a>
        </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
