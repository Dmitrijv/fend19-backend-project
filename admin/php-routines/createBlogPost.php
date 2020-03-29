<?php 

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  // no file was uploaded
  if(strlen($_FILES["post-attatched_image"]["name"]) < 0) { 
    echo "no file was uploaded";
    header("Location: ../create.php");
    die;
  }

  include_once("../../php/cms.php");
  include_once("../../php/utils.php");

  $newBlogPost = [];
  $newBlogPost['title'] = $_POST["post-title"];
  $newBlogPost['body'] = UTILS::formStringToParagraphHtml($_POST['post-body']);
  $newBlogPost['media_iframe'] = isset($_POST["post-media_iframe"]) ? $_POST["post-media_iframe"] : "";
  $newBlogPost['published'] = UTILS::formCheckboxValueToBoolean($_POST["post-published"]);
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());

  $img_target_dir = "../../img/uploads/";
  $target_file = $img_target_dir . basename($_FILES["post-attatched_image"]["name"]);
 
  if (isAttatchedImageValid($target_file) === false) { header("Location: ../create.php"); die; }

  // save image
  move_uploaded_file($_FILES["post-attatched_image"]["tmp_name"], $target_file);
  $newBlogPost['attatched_image'] = $_FILES["post-attatched_image"]["name"];

  CMS::createBlogPost($newBlogPost);
  header("Location: ../index.php");
  die;


  function isAttatchedImageValid($target_file)
  {
    // check if format is allowed
    $allowedExtentions = ["gif", "jpeg", "jpg", "png"];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $allowedExtentions)) { echo "bad format"; return false; }
    // check if image file is a actual image or fake image
    if(getimagesize($_FILES["post-attatched_image"]["tmp_name"]) === false) { echo "not image"; return false; }
    // check file size
    if ($_FILES["post-attatched_image"]["size"] > 1500000) { echo "filesize too big"; return false; }
    return true;
  }

?>