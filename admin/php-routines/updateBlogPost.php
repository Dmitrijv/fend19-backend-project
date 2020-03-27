<?php

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  include_once("../../php/cms.php");

  $updatedBlogPost = [];
  $updatedBlogPost['id'] = $_GET["postId"];
  $updatedBlogPost['published'] = stringToBoolean($_POST["post-published"]);
  $updatedBlogPost['title'] = $_POST["post-title"];
  $updatedBlogPost['body'] = $_POST["post-body"];
  $updatedBlogPost['date_last_edit'] = date("Y-m-d H:i:s", time());

  CMS::updateBlogPost($updatedBlogPost);

  header("Location: ../index.php");
  die;

  function stringToBoolean($string) { return $string == "on"; }

?>