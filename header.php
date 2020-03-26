<?php
session_start();
?>

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
      <div class="row">
        <div class="col-md-10">
          <h1></span> FEND19 - Backend - CMS <small>by Dmitrij Velström & Shan Mi</small></h1>
          <!-- <a href="admin/index.php"><button class="login" style="float: right; padding: 0 10px; color: grey;">Login</button></a> -->
          <div class="header-login">
            <?php
            if (isset($_SESSION['userId'])) {
              echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
            </form>';
            } else {
              echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Username/E-mail...">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
            </form>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>