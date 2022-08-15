<?php
session_start();
require "conn.php";

if (isset($_POST["id"]) ) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);

  if (empty($id)) {
    header("Location: ../Admin/Courses/Delete_Courses.php?msg=ID is Empty");
    exit();
  }else {

    $mysql_qry = "SELECT * from course where id='$id'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {

          $sql = "DELETE FROM course WHERE id='$id'";
          if ($conn->query($sql) === TRUE) {
            header("Location: ../Admin/Courses/Delete_Courses.php?msg=Course deleted successfully");
            exit();
          } else {
            header("Location: ../Admin/Courses/Delete_Courses.php?msg=Something Wrong!");
            exit();
          }
          $conn->close();

        }else {
          header("Location: ../Admin/Courses/Delete_Courses.php?msg=Something Wrong!!");
          exit();
        }
        $conn->close();
  }


}else {
  header("Location: ../Admin/Teacher/Delete_Teacher.php?msg=wrong".$uname."&".$id);
  exit();
}
