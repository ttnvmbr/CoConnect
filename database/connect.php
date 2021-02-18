<?php
/**
 * Created by PhpStorm.
 * User: Tom Faust
 * Date: 19-10-2020
 * Time: 15:59
 */

//dit zijn de gegevens nodig om in te loggen op de locale database
$hostname_db = "localhost";
$database_db = "crosspoints";
$username_db = "root";
$password_db = "";

// een variabel om verbinding te maken met de database
$db = mysqli_connect($hostname_db, $username_db, $password_db,$database_db) or die("Unable to connect with Database");

