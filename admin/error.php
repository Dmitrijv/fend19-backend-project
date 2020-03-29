<?php 

  $errorName = isset($_GET['errName']) ? $_GET['errName'] : "Unknown error";
  $errorMessage = isset($_GET['errMsg']) ? $_GET['errMsg'] : "Unknown error";

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Error</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/adminPanelStyle.css" rel="stylesheet">
  </head>

  <body>

    <header id="header" class="public-header">
      <div class="container">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Error</h1>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li><a href="index.php" >Dashboard</a></li>
          <li class="active">Error</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="panel panel-default panel-error" >
          <div class="panel-heading error-panel-heading">
            <h3 class="panel-title"><?php echo $errorName ?></h3>
          </div>
          <div class="panel-body">
            <?php echo $errorMessage ?>
          </div>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
  </body>
  
</html>