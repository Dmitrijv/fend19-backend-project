<?php
require('../php/DBHandler.php');
$db = new DBHandler();
$db->connect();
$editId = $_GET['id'];
$post = $db->editPost($editId);
$db->closeConnection();
?>

<!-- TODO -->
<!-- 1. check published status and show corresponding result on edit page-->
<!-- 2. Submit -> store result -> jump back to index.php -->
<!-- 3. Add images/maps -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Edit Post</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <!-- Custom CSS -->
    <link href="../css/customStyle.css" rel="stylesheet">      
  </head>
  <body>


  <header id="header" class="public-header">
    <div class="container">

        <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit Post <small>About</small></h1>
        </div>

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
        <div class="">


          <div class="">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Edit Post</h3>
              </div>
              <div class="panel-body">
                <form>
                  <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" class="form-control" placeholder="Page Title" value="<?php echo $post['title'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Post Body</label>
                    <textarea name="editor2" class="form-control" placeholder="Page Body">
                    <?php echo $post['body']?>
                    </textarea>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked> Published
                    </label>
                  </div>
                  <input type="submit" class="btn btn-default" value="Submit">
                </form>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

  <footer id="footer">
    <p>FEND19 - Backend - CMS</p>
    <p>Dmitrij Velström, Shan Mi</p>
    <p>Nackademin</p>
    <p>2020-03-26</p>
  </footer>

  <script>
     CKEDITOR.replace( 'editor2' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
