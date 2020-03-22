<?php
  $servername = "localhost";//online server or website
  $dBUsername = "root";
  $dBPassword = "058418Ms";
  $dBName = "bloglogin";

  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
  if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
  }