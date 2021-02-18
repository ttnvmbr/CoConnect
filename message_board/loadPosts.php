<?php
session_start();
require_once "../database/connect.php";

if(isset($_SESSION['cname'])){
    $company = $_SESSION['cname'];
}elseif(isset($_COOKIE['company'])){
    $company = $_COOKIE['company'];
}

$query = "SELECT * FROM `posts` WHERE `company` = '" . $company . "' ";

if (isset($_POST['search'])) {
    $query = $query . " AND (`tags` LIKE '%" . $_POST['search'] . "%' OR `title` LIKE '%" . $_POST['search'] . "%' OR `description` LIKE '%" . $_POST['search'] . "%' )";
}


if (isset($_POST['mood'])) {

    switch ($_POST['mood']) {
        case "Positief":
            $query = $query . " AND `mood` = '1'";
            break;
        case "Neutraal":
            $query = $query . " AND `mood` = '0'";
            break;
        case "Negatief":
            $query = $query . " AND `mood` = '-1'";
            break;
    }

}

if(isset($_POST['order']) && $_POST['order'] == 'Oudste'){
    $query = $query . " ORDER BY `date` ASC ";
}else{
    $query = $query . " ORDER BY `date` DESC ";
}

    $query = $query . "LIMIT ".$_POST["start"].", ".$_POST["limit"]."";

    $DBfetchproduct = mysqli_query($db, $query);

    $result = mysqli_num_rows($DBfetchproduct);

    $db->close();

    if(isset($_POST["limit"], $_POST["start"])) {
    if ($result > 0) {

        while ($product = mysqli_fetch_array($DBfetchproduct)) {
            echo "<table class='table table-light table-bordered'>";
            echo "<tr><td width='1px' rowspan='3' ";

            switch ($product['mood']) {
                case 1:
                    echo "class='positive' onclick=\"window.location='message-board.php?mood=Positief'\"";
                    break;
                case 0:
                    echo "class='neutral' onclick=\"window.location='message-board.php?mood=Neutraal'\"";
                    break;
                case -1:
                    echo "class='negative' onclick=\"window.location='message-board.php?mood=Negatief'\"";
                    break;
            }
            echo "><i class='fa fa-user'></td>";
            echo "<td><b>" . $product['title'] . "</b></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $product['description'] . "</td>";
            echo "</tr>";
            echo "<tr><td>";
            $tags = explode(', ', $product['tags']);
            foreach ($tags as $tag) {
                echo "<a href='?search=" . $tag . "'> " . $tag . " </a>";
            }
            echo "</td></tr>";
            echo "</table>";

        }
    }
}