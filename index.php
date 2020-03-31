<?php include_once('php/cms.php'); ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="https://i.ibb.co/jv59ZyP/pngfind-com-unity-logo-png-55125.png" title="favicon">
    <title>Public Area | Home</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/customStyle.css" rel="stylesheet">
  </head>

  <body>

    <header id="header" class="public-header">
      <div class="container">
        <h1>FEND19 - Backend - CMS <small>by Dmitrij Velström & Shan Mi</small></h1>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <section class="post-list">
          <?php CMS::getPublishedBlogPostsHtml(); ?>
        </section>
      </div>
    </section>

    <footer id="footer">
      <p class="bold">FEND19 - Backend - CMS</p>
      <p>Dmitrij Velström, Shan Mi</p>
      <p>Nackademin</p>
      <p>2020-03-30</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/checkImgStatus.js"></script>
  </body>
</html>