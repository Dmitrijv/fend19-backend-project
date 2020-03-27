<?php
session_start();

require('../php/DBHandler.php');
$db = new DBHandler();
$db->connect();
$posts = $db->showAllPosts();
if (isset($_POST['delete'])) {
  $delete_id = $_POST['delete_id'];
  $db->deletePost($delete_id);
}
$db->closeConnection();
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">

  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  <!-- Custom CSS -->
  <link href="../css/customStyle.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="public-header">
    <div class="container">

      <div class="">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Manage Blog Posts</h1>
      </div>

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
      <div class="">

        <div class="">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Posts</h3>
            </div>
            <div class="panel-body">


              <div class="add-new-post-box">
                <a href="create.php"><i class="fas fa-plus"></i> add a new post</a>
              </div>


              <div class="row">


                <!-- <div class="col-md-12">
                  <input class="form-control" type="text" placeholder="Filter Posts...">
                </div> -->
              </div>
              <br>
              <table class="table table-striped table-hover text-center">
                <tr>
                  <th class=" text-center">Title</th>
                  <th class=" text-center">Published</th>
                  <th class=" text-center">Created</th>
                  <th></th>
                </tr>

                <?php foreach ($posts as $post) : ?>
                  <tr>
                    <td><?php echo $post['title']; ?></td>
                    <?php if ($post['published']) {
                      echo '<td><i class="fas fa-check"></i></td>';
                    } else {
                      echo '<td><i class="fas fa-times"></i></td>';
                    }
                    ?>
                    <td><?php echo $post['date_created']; ?></td>
                    <td>
                      <form style="display: inline-block;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>
                        <input class="btn btn-danger" type="submit" name="delete" value="Delete" class="btn btn-danger" onClick='return confirm("Are you sure you want to delete?")'>
                        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                      </form>
                    </td>
                  </tr>

                <?php endforeach; ?>

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