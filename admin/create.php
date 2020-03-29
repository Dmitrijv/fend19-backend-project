<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Craete Post</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <!-- Custom CSS -->
    <link href="../css/adminPanelStyle.css" rel="stylesheet">
  </head>
  <body>

    <header id="header" class="public-header">
      <div class="container">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Create a new Post</h1>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Create Post</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">

        <!-- Website Overview -->
        <div class="panel panel-default">

          <div class="panel-heading">
            <h3 class="panel-title">Create Post</h3>
          </div>

          <div class="panel-body">
            <form action="php-routines/createBlogPost.php" method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Cover image</label>
                <input type="file" name="post-attatched_image" id="post-attatched_image" accept=".jpg,.jpeg,.png,.gif" required>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input name="post-title" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Body</label>
                <textarea name="post-body" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Embedd a Google Map or a Youtube video iframe</label>
                <input name="post-media-iframe" type="text" class="form-control" pattern="<iframe.*<\/iframe>" >
              </div>
              <div class="checkbox">
                <label>
                  <input name="post-published" type="checkbox" checked> Published
                </label>
              </div>
              <input type="submit" class="btn btn-default" value="Submit">
            </form>
          </div>

        </div>

      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
