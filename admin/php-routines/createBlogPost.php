<?php 

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  // no file was uploaded
  if(!isset($_FILES["post-attatched_image"])) { header("Location: ../create.php"); die; }

  include_once("../../php/cms.php");
  include_once("../../php/utils.php");

  $newBlogPost = [];
  $newBlogPost['title'] = $_POST["post-title"];
  $newBlogPost['body'] = UTILS::formStringToParagraphHtml($_POST['post-body']);
  $newBlogPost['media_iframe'] = isset($_POST["post-media_iframe"]) ? $_POST["post-media_iframe"] : "";
  $newBlogPost['published'] = UTILS::formCheckboxValueToBoolean($_POST["post-published"]);
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());

  $target_dir = "../../img/uploads/";
  $target_file = $target_dir . basename($_FILES["post-attatched_image"]["name"]);
 
  if (UTILS::isAttatchedImageValid($target_file) === false) { header("Location: ../create.php"); die; }

  // save image
  move_uploaded_file($_FILES["post-attatched_image"]["tmp_name"], $target_file);
  $newBlogPost['attatched_image'] = $_FILES["post-attatched_image"]["name"];

  CMS::createBlogPost($newBlogPost);
  header("Location: ../index.php");

  die;

?>