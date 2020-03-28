<?php 

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  include_once("../../php/cms.php");
  include_once("../../php/utils.php");
  
  $newBlogPost = [];
  $newBlogPost['title'] = $_POST["post-title"];
  $newBlogPost['body'] = UTILS::formStringToParagraphHtml($_POST['post-body']);
  $newBlogPost['attatched_image'] = 'test.jpeg'; //$_POST["post-attatched-image"];
  $newBlogPost['media_iframe'] = $_POST["post-media_iframe"];
  $newBlogPost['published'] = UTILS::formCheckboxValueToBoolean($_POST["post-published"]);
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());

  // echo $newBlogPost['body'];

  CMS::createBlogPost($newBlogPost);
  header("Location: ../index.php");
  
  die;

?>