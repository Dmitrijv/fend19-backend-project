<?php
session_start();
?>
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
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  <!-- Custom CSS -->
  <link href="../css/customStyle.css" rel="stylesheet">  
</head>

<body>

  <header id="header" class="public-header">
    <div class="container">

        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Manage Blog Posts</h1>
        </div>

    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active"><a href="index.php">Dashboard</a></li>
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
              <h3 class="panel-title">Posts</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <!-- <div class="col-md-12">
                  <input class="form-control" type="text" placeholder="Filter Posts...">
                </div> -->
              </div>
              <br>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Title</th>
                  <th>Published</th>
                  <th>Created</th>
                  <th></th>
                </tr>
                <tr>
                  <td>Blog Post 1</td>
                  <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                  <td>Dec 12, 2016</td>
                  <td><a class="btn btn-default" href="edit.php">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                <tr>
                  <td>Blog Post 2</td>
                  <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                  <td>Dec 13, 2016</td>
                  <td><a class="btn btn-default" href="edit.php">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                <tr>
                  <td>Blog Post 3</td>
                  <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                  <td>Dec 13, 2016</td>
                  <td><a class="btn btn-default" href="edit.php">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
                <tr>
                  <td>Blog Post 4</td>
                  <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                  <td>Dec 14, 2016</td>
                  <td><a class="btn btn-default" href="edit.php">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                </tr>
              </table>
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
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
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
    CKEDITOR.replace('editor1');
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>
