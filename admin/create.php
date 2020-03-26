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
    <link href="../css/customStyle.css" rel="stylesheet">
  </head>
  <body>


  <header id="header" class="public-header">
    <div class="container">

        <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Create a new Post</h1>
        </div>

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
        <div class="">


          <div class="">

            <!-- Website Overview -->
            <div class="panel panel-default">

              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Create Post</h3>
              </div>
              <div class="panel-body">
                <form action="routines/createNewBlogpost.php" method="POST" >
                  <div class="form-group">
                    <label>Title</label>
                    <input name="post-title" type="text" class="form-control" require>
                  </div>
                  <div class="form-group">
                    <label>Body</label>
                    <textarea name="post-body" class="form-control" require>
                    </textarea>
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

        </div>

      </div>
    </section>

    <footer id="footer">
      <p>FEND19 - Backend - CMS</p>
      <p>Dmitrij Velström, Shan Mi</p>
      <p>Nackademin</p>
      <p>2020-03-26</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="post-body" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input name="post-published" type="checkbox"> Published
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>  
</div>

  <script>
     CKEDITOR.replace( 'post-body' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
