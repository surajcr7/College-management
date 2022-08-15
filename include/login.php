<?php
session_start();
require "conn.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = validate($_POST['username']);
  $password = validate($_POST['password']);

  if (empty($uname)) {
    header("Location: ../index.php?error=User Name is require");
    exit();
  }elseif (empty($password)) {
    header("Location: ../index.php?error=password is require");
    exit();
  }else {
    $sql = "select * from login where username='$uname' AND password= '$password'";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)===1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['username'] === $uname && $row['password'] === $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['favcolor'] = 'green';

        // header("Location: ../Admin/DashBoard/DashBoard.php");
        // exit();
        if ($_SESSION['user_type'] == 1) {
          header("Location: ../Admin/index.php");
          exit();
        }else if ($_SESSION['user_type'] == 2) {
          header("Location: ../Teacher/index.php");
          exit();
        }else if ($_SESSION['user_type'] == 3) {
          header("Location: ../Student/index.php");
          exit();
        }else {
          header("Location: ../index.php");
          exit();
        }

      }else {
        header("Location: ../index.php?error=Incorrect username or Password");
        exit();
      }
    }else {
      header("Location: ../index.php?error=Incorrect username or Password");
      exit();
    }
  }


}else {
  header("Location: ../index.php");
  exit();
}
