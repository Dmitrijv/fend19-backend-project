<?php

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  include_once("../../php/cms.php");
  include_once("../../php/utils.php");

  $updatedBlogPost = [];
  $updatedBlogPost['id'] = $_POST["postId"];
  $updatedBlogPost['title'] = $_POST["post-title"];
  $updatedBlogPost['body'] = UTILS::formStringToParagraphHtml($_POST["post-body"]);
  $updatedBlogPost['media_iframe'] = isset($_POST["post-media_iframe"]) ? $_POST["post-media_iframe"] : "";
  $updatedBlogPost['published'] = UTILS::formCheckboxValueToBoolean($_POST["post-published"]);
  $updatedBlogPost['date_last_edit'] = date("Y-m-d H:i:s", time());

  // check if user uploaded a new cover image
  if (strlen($_FILES["post-attatched_image"]["name"]) > 0) {

    $img_target_dir = "../../img/uploads/";
    $target_file = $img_target_dir . basename($_FILES["post-attatched_image"]["name"]);
    if (isAttatchedImageValid($target_file) === false) {
      header("Location: ../error.php?errName=Invalid Cover Image&errMsg=Uploaded image file is invalid.");
      die;
    }

    move_uploaded_file($_FILES["post-attatched_image"]["tmp_name"], $target_file);
    $updatedBlogPost['attatched_image'] = $_FILES["post-attatched_image"]["name"];

  } else {
    $updatedBlogPost['attatched_image'] = $_POST['post-current_image'];
  }

  CMS::updateBlogPost($updatedBlogPost);
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