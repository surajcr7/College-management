<?php
session_start();
require "conn.php";

if (isset($_POST['edit_course_name_btn'])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);
  $CourseName = validate($_POST['course_name']);
  $CourseYear = validate($_POST['course_year']);

  if (empty($CourseName) || empty($CourseYear) || empty($id)) {
    header("Location: ../Admin/Courses/Edit_Courses.php?msg=Something Wrong! Reload and try again!");
    exit();
  }else {

    $mysql_qry = "SELECT * from course where id='$id'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {
          $mysql_qry1 = "SELECT * from course where cname='$CourseName' and year='$CourseYear'";
          $result1 = mysqli_query($conn,$mysql_qry1);
          if (mysqli_num_rows($result1)>0) {
            header("Location: ../Admin/Courses/Edit_Courses.php?msg=Course name already available!");
            exit();
          }else {
            $sql = "UPDATE course SET cname='$CourseName',year='$CourseYear' WHERE id='$id'";
            if ($conn->query($sql) === true){
              header("Location: ../Admin/Courses/Edit_Courses.php?msg=Updated User info");
              exit();
            }else {
              header("Location: ../Admin/Courses/Edit_Courses.php?msg=Something Wrong! Try agian!s");
              exit();
            }
          }
        }else {
          header("Location: ../Admin/Courses/Edit_Courses.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();

  }
}
