<?php
include('internal_contact_server.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>New internal contact</title>
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
                    <h4>Nieuw intern contactpersoon</h4>

                    <form action="new_internal.php" method="post">
                        <?php include('..\errors.php'); ?>
                        <div class="form-group">
                            <label for="name">Naam</label>
                            <input class="form-control" id="name" type="text" name="name" <?php if (isset($name)){echo htmlentities($name,ENT_QUOTES);}?>/>
                        </div>

                        <div class="form-group">
                            <label for="function">Functie</label>
                            <input class="form-control" id="function" type="text" name="function"<?php if (isset($function)){echo htmlentities($function,ENT_QUOTES);}?>/>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="text" name="email" <?php if (isset($function)){echo htmlentities($function,ENT_QUOTES);}?>/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefoonnummer</label>
                            <input class="form-control" id="phone" type="text" name="phone" <?php if (isset($phone)){echo htmlentities($phone,ENT_QUOTES);}?>/>
                        </div>

                        <div class="form-group">
                            <label for="description">Beschrijving</label>
                            <small id="optional" class="text-muted">Optioneel</small>
                            <input aria-describedby="optional" class="form-control" id="description" type="text" name="description" <?php if (isset($description)){echo htmlentities($description,ENT_QUOTES);}?>/>
                        </div>
                        <div>
                        </div>
                        <input class="btn" type="submit" name="submit" value="Opslaan"/>
                        <a class="btn" href="internal_contacts.php">Annuleren</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div>
    </div>
</div>
</body>
</html>
