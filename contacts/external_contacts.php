<?php
include('../database/connect.php');
//Get the result set from the database with a SQL query
$query = "SELECT * FROM external_contacts";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$external_contacts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $external_contacts[] = $row;
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
</head>
<body class="menu2" >
<div class="container">
    <a href="contacts_menu.php" class="no-deco-link">
        <i class="ml-2 fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
    </a>
<h1>Externe contacten</h1>
    <a class="no-deco-link" href="new_external.php"><i class="mr-1 fa fa-plus"></i>Nieuw extern contactpersoon</a>
<table class="table table-light rounded" style="border-collapse:collapse;" id="contacts">
    <thead>
    <tr>
        <th scope="col">
            Naam
            <svg onclick="sortTable(0)" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-sort-alpha-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11A.5.5 0 0 1 4 2z"/>
                <path fill-rule="evenodd" d="M6.354 11.146a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L4 12.793l1.646-1.647a.5.5 0 0 1 .708 0z"/>
                <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
            </svg>
        </th>
        <th scope="col">
            Beroep
            <svg onclick="sortTable(1)" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-sort-alpha-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11A.5.5 0 0 1 4 2z"/>
                <path fill-rule="evenodd" d="M6.354 11.146a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L4 12.793l1.646-1.647a.5.5 0 0 1 .708 0z"/>
                <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
            </svg>
        </th>
        <th scope="col">
            Locatie
            <svg onclick="sortTable(2)" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-sort-alpha-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11A.5.5 0 0 1 4 2z"/>
                <path fill-rule="evenodd" d="M6.354 11.146a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L4 12.793l1.646-1.647a.5.5 0 0 1 .708 0z"/>
                <path d="M9.664 7l.418-1.371h1.781L12.281 7h1.121l-1.78-5.332h-1.235L8.597 7h1.067zM11 2.687l.652 2.157h-1.351l.652-2.157H11zM9.027 14h3.934v-.867h-2.645v-.055l2.567-3.719v-.691H9.098v.867h2.507v.055l-2.578 3.719V14z"/>
            </svg>
        </th>
        <th colspan="3"></th>
    </tr>
    </thead>
    <tfoot>
    </tfoot>
    <tbody>
    <?php foreach ($external_contacts as $contact) { ?>
        <tr>
            <td scope="col"><?= $contact['name']; ?></td>
            <td scope="col"><?= $contact['job']; ?></td>
            <td scope="col"><?= $contact['location']; ?></td>
            <td><a class="no-deco-link fa fa-eye" href="show_external.php?id=<?= $contact['id'];?>"></a></td>

            <!--            if admin-->
            <td><a class="no-deco-link fa fa-trash-o" href="external_delete.php?id=<?= $contact['id'];?>"></a></td>
            <td><a class="no-deco-link fa fa-edit" href="external_edit.php?id=<?= $contact['id'];?>"></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="sort_contacts.js"></script>
</html>
