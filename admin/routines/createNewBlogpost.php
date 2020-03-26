<?php 

    require_once('../../php/DBHandler.php');

    function stringToBoolean($string){
        if ($string == "on") {
            return true;
        } else {
           return false;
        }
    }

    $newBlogPost = [];
    $newBlogPost['title'] = $_POST["post-title"];
    $newBlogPost['body'] = $_POST["post-body"];
    $newBlogPost['published'] = stringToBoolean($_POST["post-published"]);
    $newBlogPost['dateCreated'] =  date ("Y-m-d H:i:s", time());

    $db = new DBHandler();
    $db->connectPdo();
    $db->createNewBlogPost($newBlogPost);
    $db->closePdoConnection();

    header("Location: ../index.php");
    exit;


?>