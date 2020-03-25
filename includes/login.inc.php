<?php

if(isset($_POST['login-submit'])){
  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if(empty($mailuid) || empty($password)){
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    //user may choose to log in by username or email
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      //both of the parameters are $mailuid
      mysqli_stmt_execute($stmt);
      //execute, get the result
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)){
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        //check input pwd with pwd stored in db
        if ($pwdCheck == false){
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          //start a session
          session_start();
          $_SESSION['userId'] = $row['idUsers'];
          $_SESSION['userUid'] = $row['uidUsers'];

          // header("Location: ../index.php?login=success");
          header("Location: ../admin/index.php?login=success");
          exit();
        }
        else {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }
  }
}
else{
  header("Location: ../index.php");
  exit();
}
