<?php 

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  // no file was uploaded
  if(strlen($_FILES["post-attatched_image"]["name"]) < 0) { 
    header("Location: ../error.php?errName=No Cover Image&errMsg=No cover image was uploaded.");
    die;
  }

  include_once("../../php/cms.php");
  include_once("../../php/utils.php");

  $newBlogPost = [];
  $newBlogPost['title'] = $_POST["post-title"];
  $newBlogPost['body'] = UTILS::formStringToParagraphHtml($_POST['post-body']);
  $newBlogPost['media_iframe'] = isset($_POST["post-media_iframe"]) ? trim($_POST["post-media_iframe"]) : "";
  $newBlogPost['published'] = UTILS::formCheckboxValueToBoolean($_POST["post-published"]);
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());
  $iframe = $newBlogPost['media_iframe'];
  $img_target_dir = "../../img/uploads/";
  $target_file = $img_target_dir . basename($_FILES["post-attatched_image"]["name"]);
 
  if (isAttatchedImageValid($target_file) === false) {
    header("Location: ../error.php?errName=Invalid Cover Image&errMsg=Uploaded image file is invalid.");
    die;
  }

  if (isIframeValid($iframe) === false) {
    header("Location: ../error.php?errName=Wrong iframe-link&errMsg=Please Check Your iframe-link again.");
  }

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
    if ($_FILES["post-attatched_image"]["size"] > 9500000) { echo "filesize too big"; return false; }
    return true;
  }

  function isIframeValid($iframe)
  {
    if($iframe){
          
      // make sure entered link is an iframe embed and not just a link
      // links only come from G-Map and YouTube
      $regGoogleMap = '/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/';
      $regYouTube = '/<iframe[^>]*src\s*=\s*"?https?:\/\/[^\s"\/]*\.youtube.com\/embed\/(?:\/[^\s"]*)?"?[^>]*>.*?<\/iframe>/';
    
      if(preg_match($regGoogleMap, $iframe) || preg_match($regYouTube, $iframe)) {
        echo 'Congrats.'; return true;
      } else {
        echo "Wrong form, check again."; return false;
      }
    }
  }

?>