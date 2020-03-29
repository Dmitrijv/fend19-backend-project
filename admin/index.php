<?php include_once('../php/cms.php'); ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Posts</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <!-- Custom CSS -->
    <!-- <link href="../css/customStyle.css" rel="stylesheet"> -->
  </head>

  <body>

    <header id="header" class="public-header">
      <div class="container">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Manage Blog Posts</h1>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active"><a href="index.php">Dashboard</a></li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <!-- Post History Overview -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Posts</h3>
          </div>
          <div class="panel-body">
            <div class="add-new-post-box">
              <a href="create.php"><i class="fas fa-plus"></i> add a new post</a>
            </div>
            <?php CMS::getAdminBlogPostsTable(); ?>
          </div>
        </div>
        <!-- end of Post History Overview -->
      </div>
    </section>

    <footer id="footer">
      <p>FEND19 - Backend - CMS</p>
      <p>Dmitrij Velström, Shan Mi</p>
      <p>Nackademin</p>
      <p>2020-03-26</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/cmsLib.js"></script>
    
  </body>
  
</html>