<?php
require_once 'login.php';
$conn = new mysqli ($id, $user, $password, $cname, $email, $admin, $phone, $functie) or die("Connection Failed");

$sql = 'SELECT user_role FROM users WHERE user_email = ?';

$stmt = $conn->stmt_init();
$stmt->prepare($sql);

$stmt->bind_param('s', $user_email);

$stmt->bind_result($user_role);
$stmt->execute();
$stmt->fetch();

if ('SU' == $user_role) {
  $_SESSION['privilege_level'] = $user_role;

// some other code needed here
  exit;
} else {
  echo 'No permission to visit this page';
}