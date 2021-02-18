<?php
require_once '../session.php';

if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {

        // Proceed to process the form data
        //connect
        require_once ("../database/connect.php");

        //message items
        $title = $_POST['title'];
        $description = $_POST['description'];
        $tags = substr($_POST['tags'], 0, -2);

        if(!isset($_POST['mood'])){
            $mood =0;
        }else{
            $mood = $_POST['mood'];
        }

        if(isset($_SESSION['id'])){
            $user = $_SESSION['id'];
        }elseif(isset($_COOKIE['id'])){
            $user = $_COOKIE['id'];
        }

        if(isset($_SESSION['cname'])){
            $company = $_SESSION['cname'];
        }elseif(isset($_COOKIE['company'])){
            $company = $_COOKIE['company'];
        }

        $block = file_get_contents('BlockList.txt');
        $curses = explode(',',$block);


        function sortByLength($a,$b){
            return strlen($b)-strlen($a);
        }

        usort($curses,'sortByLength');

        $tags = explode(',',$tags);

        foreach ($curses as $curse){

            $curse = trim($curse);

            $tags = array_diff($tags, array($curse));
            $title = preg_replace('/\b'.$curse.'\b/', "*****", $title);
            $description = preg_replace('/\b'.$curse.'\b/',"*****", $description);
        }

        $tags = implode(", ",$tags);

        $stmt = $db->prepare("INSERT INTO `posts`( `title`, `description`, `tags`, `mood`, `user`,`company`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssis",$title,$description,$tags,$mood,$user,$company);

        $stmt->execute();
        $stmt->close();
        $db->close();

    } else {
        // Log this as a warning and keep an eye on these attempts
    }
}

header("location: message-board.php ");