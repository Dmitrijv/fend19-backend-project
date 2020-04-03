<?php

include_once("../php/cms.php");
include_once("../php/utils.php");

if (!isset($_POST["postId"]) || (CMS::doesBlogPostExist($_POST["postId"]) != 1))
{ 
  header("Location: error.php?errName=Post does not exist.&errMsg=Post you are trying to edit does not exist.");
  die;
}

$post = CMS::getBlogPost($_POST["postId"]);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="https://i.ibb.co/jv59ZyP/pngfind-com-unity-logo-png-55125.png" title="favicon">
    <title>Admin Area | Edit Post</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <!-- Custom CSS -->
    <link href="../css/adminPanelStyle.css" rel="stylesheet">
    <!-- Bootstrap toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }</style>
  </head>

  <body>

    <header id="header" class="public-header">
      <div class="container">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit Post</h1>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Edit Post</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">

        <!-- Website Overview -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Post</h3>
          </div>
          <div class="panel-body">
            <form action="php-routines/updateBlogPost.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Post Title</label>
                <input type="text" name="post-title" class="form-control" placeholder="Page Title" value="<?php echo $post['title'] ?>">
              </div>
              <div class="form-group">
                <label>Post Body</label>
                <textarea name="post-body" class="form-control"><?php echo UTILS::fromParagraphHtmlToString($post['body']); ?></textarea>
              </div>
              <div class="form-group">
                <label>Update cover image</label>                
                <p><?php echo $post["attatched_image"] ?></p>
                <img class="small-img-on-edit" src="../img/uploads/<?php echo $post["attatched_image"] ?>" alt="post-img">
                <input type="file" name="post-attatched_image" id="post-attatched_image" accept=".jpg,.jpeg,.png,.gif" >
                <span class="imgErrInfo"></span>
                <input type="hidden" name="post-current_image" value="<?php echo $post['attatched_image']; ?>">
              </div>
              <div class="form-group">
                <label>Embedd a Google Map or a Youtube video iframe</label>
                <span class="iframeErrInfo">
                  <?php
                    // if(){

                    // }
                  ?>
                </span>
                <input name="post-media_iframe" type="text" class="form-control" pattern="\s*<iframe.*><\/iframe>\s*" value="<?php echo htmlspecialchars($post['media_iframe']) ?>" >
              </div>
              <div class="checkbox">
                <label>
                  <input name="post-published" type="checkbox" data-toggle="toggle" data-style="ios" <?php echo $post['published'] ? 'checked' : '' ?> > Published
                </label>
              </div>
              <input type="submit" class="btn btn-default" value="Submit">
              <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
            </form>
          </div>
        </div>
        
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  </body>
</html>
