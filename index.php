<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Dashboard</title>
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/customStyle.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="public-header">
    <div class="container">

        <div class="col-md-10">
          <h1></span> FEND19 - Backend - CMS <small>by Dmitrij Velström & Shan Mi</small></h1>
        </div>

    </div>
  </header>

<section id="main">
  <div class="container">


      <section class="post-list">



            <?php
            require('php/DBHandler.php');
            $db = new DBHandler();
            $db->connect();
            $posts = $db->getBlogPosts();
            $db->closeConnection();
            ?>

            <?php foreach ($posts as $post) : ?>

              <!-- generated post  -->
              <div class="panel panel-default blogpost">
                <div class="panel-heading">
                  <h2 class="panel-title"><?php echo $post['title']; ?></h2>
                </div>
                <div class="blogpost-dateposted"> 
                  <small>posted on <?php echo $post['date_created']; ?> </small>
                </div>
                <div class="panel-body">
                  <?php echo $post['body']; ?>
                </div>
              </div>

            <?php endforeach; ?>

      </section>

  </div>
</section>

  <footer id="footer">
    <p>FEND19 - Backend - CMS</p>
    <p>Dmitrij Velström, Shan Mi</p>
    <p>Nackademin</p>
    <p>2020-03-26</p>
  </footer>

<script>
  CKEDITOR.replace('editor1');
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>