<?php
session_start();
require "conn.php";

if (isset($_POST["username"]) && isset($_POST["id"])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = validate($_POST['username']);
  $id = validate($_POST['id']);

  if (empty($uname)) {
    header("Location: ../Admin/Student/Delete_Student.php?msg=User Name is Empty");
    exit();
  }elseif (empty($id)) {
    header("Location: ../Admin/Student/Delete_Student.php?msg=User ID is Empty");
    exit();
  }else {

    $mysql_qry = "SELECT * from student where Id='$id' AND username ='$uname'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {

          $sql = "DELETE FROM student WHERE Id='$id' AND username ='$uname'";
          if ($conn->query($sql) === TRUE) {
            header("Location: ../Admin/Student/Delete_Student.php?msg=USER deleted successfully");
            exit();
          } else {
            header("Location: ../Admin/Student/Delete_Student.php?msg=Something Wrong!");
            exit();
          }
          $conn->close();

        }
        else {
          header("Location: ../Admin/Student/Delete_Student.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();
  }


}else {
  header("Location: ../Admin/Student/Delete_Student.php?msg=User ID is Empty");
  exit();
}
