<?php
  if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //build error handlers here
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    
    //if both email and username is invalid, then won't send any message to user
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/![a-zA-Z0-9]*$/", $username)){
      header("Location: ../signup.php?error=invaliduid");
      exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit();
    }

    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      exit();
    }

    else if($password !== $passwordRepeat){
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();
    }

    else {
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
      //? placeholder
      $stmt = mysqli_stmt_init($conn);

      //always check if there is a error
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $username); 
        //data type we want to pass to the database, here we use just one s, because we are comparing just one
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../signup.php?error=usertaken&mail=".$email);
          exit();
        }
        else{
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          }
          else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); //three strings
            mysqli_stmt_execute($stmt);
            //now we only insert data into database
            header("Location: ../signup.php?signup=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    //close the statement
    mysqli_close($conn);

  }
  else {
    header("Location: ../signup.php");
    exit();
  }