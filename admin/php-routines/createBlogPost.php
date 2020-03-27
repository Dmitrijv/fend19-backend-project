<?php 

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  include_once("../../php/cms.php");

  function stringToBoolean($string) { return $string == "on"; }
  
  $newBlogPost = [];
  $newBlogPost['title'] = $_POST["post-title"];
  $newBlogPost['body'] = $_POST["post-body"];
  $newBlogPost['published'] = stringToBoolean($_POST["post-published"]);
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());

  CMS::createBlogPost($newBlogPost);
  header("Location: ../index.php");
  
  die;

?>