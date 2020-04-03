<?php
if (strtoupper($_SERVER['REQUEST_METHOD']) != 'GET') {
  die;
}

include_once("../../php/cms.php");

$postId = $_GET["postId"];
$isPublished = $_GET['isPublished'];
$post = CMS::togglePublishStatus($isPublished, $postId);

die;

?>