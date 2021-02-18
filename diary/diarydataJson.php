<?php
include('../session.php');
require_once('../database/connect.php');

        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
        } elseif (isset($_COOKIE['id'])) {
            $user_id = $_COOKIE['id'];
        }

        $sqlSelect = "SELECT id, start, title, score, comment, color FROM `dagboek` WHERE user_id = '" . $user_id . "' ORDER BY start";
        $resultSelect = $db->query($sqlSelect);

        if (mysqli_num_rows($resultSelect) >= 1) {
            // het werkt, gefeliciteerd
        } else {
        };

// Data naar Json
        $emparray = array();
        while ($row = mysqli_fetch_assoc($resultSelect)) {
            $emparray[] = $row;
        }
        echo json_encode($emparray);



?>