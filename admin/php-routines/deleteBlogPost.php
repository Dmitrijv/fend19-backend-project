<?php

  include_once("../../php/cms.php");

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_REQUEST["postId"])) {
    CMS::deleteBlogPost($_REQUEST["postId"]);
  }

  die;

?>