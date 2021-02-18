<?php
session_start();

require_once "login/Auth.php";
require_once "login/Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "authCookieSessionValidate.php";



if ($isLoggedIn) {
    $util->redirect("index.php");
}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;

    $username = $_POST["name"];
    $password = $_POST["password"];
    $company = $_POST["company"];

    $user = $auth->getMemberByUsername($username,$company);

    if(is_array($user)){
        $check_password = $user[0]["password"];
    }else{
        $check_password = "";
    }

    if (password_verify($password, $check_password)) {
        $isAuthenticated = true;
    }

    if ($isAuthenticated) {
        $_SESSION["id"] = $user[0]["id"];
        $_SESSION["cname"] = $user[0]["cname"];

        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {

            setcookie("id", $user[0]["id"], $cookie_expiration_time);

            setcookie("login", $username, $cookie_expiration_time);

            setcookie("company", $company, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username,$company, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }

            print_r($_COOKIE);

            // Insert new token
            $auth->insertToken($username, $random_password_hash, $company, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
       $util->redirect("index.php");
    } else {
        $message = "Invalid Login";
    }
}
?>
<!DOCTYPE html>

<html">
<head>
    <title>Loginsysteem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-6 mx-auto">

                <div class="d-flex justify-content-center">
                    <img style="width: 30%; height: 30%" class="" src="images/logo_blue.png" alt="">
                </div>
                <br>
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">


                        <form action="" method="post" id="frmLogin">
                            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>

                            <div class="form-group m-0">
                                <label class="label" for="compname">Bedrijfsnaam</label>
                                <input name="company" type="text"
                                       value="<?php if(isset($_COOKIE["company"])) { echo $_COOKIE["company"]; } ?>"
                                       class="input-field col" required>
                            </div>
                            <br>
                            <div class="form-group m-0">
                                <label class="label" for="name">Gebruikersnaam</label>
                                <input name="name" type="text"
                                       value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>"
                                       class="input-field col" required>
                            </div>
                            <br>
                            <div class="form-group m-0">
                                <label class="label" for="password">Wachtwoord</label>
                                <input name="password" type="password"
                                       value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                                       class="input-field col" required>
                            </div>
                            <div class="form-group mt-4">
                                <input type="checkbox" name="remember" id="remember"
                                    <?php if(isset($_COOKIE["login"])) { ?> checked
                                    <?php } ?> /> <label for="remember-me">Remember me</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input class="btn btn-primary" id="send" name="login" type="submit" value="Login" required/>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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