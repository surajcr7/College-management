<?php
session_start();
require "conn.php";

if (isset($_POST["username"]) && isset($_POST["id"]) ) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = validate($_POST['username']);
  $id = validate($_POST['id']);

  if (empty($uname)) {
    header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=User Name is Empty");
    exit();
  }elseif (empty($id)) {
    header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=User ID is Empty".$uname."&".$id);
    exit();
  }else {

    $mysql_qry = "SELECT * from teacher where id='$id' AND username ='$uname'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {

          $sql = "DELETE FROM teacher WHERE id='$id' AND username ='$uname'";
          if ($conn->query($sql) === TRUE) {
            header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=USER deleted successfully");
            exit();
          } else {
            header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=Something Wrong!");
            exit();
          }
          $conn->close();

        }
        else {
          header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();
  }


}else {
  header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=wrong".$uname."&".$id);
  exit();
}
