<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Course - Admin</title>
    <link rel="stylesheet" href="Offer_Courses.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../index.php" >
        <i class=""></i>
        <span>Dashboard</span>
      </a>
      <a href="../Student/Add_Student.php" >
        <i class=""></i>
        <span>Student</span>
      </a>
      <a href="../Teacher/Add_Teacher.php">
        <i class=""></i>
        <span>Teacher</span>
      </a>
      <a href="../Courses/Edit_Courses.php" class="active">
         <i class=""></i>
        <span>Course</span>
      </a>
      <a href="../Section/Add_Section.php" >
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Academic/Active_Academic.php">
        <i class=""></i>
        <span>Academic</span>
      </a>
      <a href="../Grade/Grade.php" >
        <i class=""></i>
        <span>Grade</span>
      </a>
      <a href="../../include/logout.php" >
        <i class=""></i>
        <span>Logout</span>
      </a>
    </div>

    <div class="cms">
      <p style="margin-left:25%">College Management System</p>
    </div>


<div class="navbar" style="margin-left:12%; margin-top:0%;">
 <div class="topnav">
   <a href="Edit_Courses.php">EDIT CURRENT COURSES</a>
   <a href="Offer_Courses.php"class="active">OFFER NEW COURSE</a>

   <a href="Delete_Courses.php">DELETE COURSES</a>

</div>
</div>

<div class="title">
<h1 style="margin-left:42%; margin-top: 5%;"> Add New Course </h1>
</div>

<?php

if (isset($_POST['submit_btn'])){
  $CourseName = $_POST['c_name'];
  $CollegeYear = $_POST['college_year'];

  if (empty($CourseName) || empty($CollegeYear)) {
    ?>
      <table style="margin-left:40%; margin-top:20px;">
        <tr>
          <td colspan="6" style="color:red;">*Empty Field!
          </td>
        </tr>
      </table>
    <?php
  }else {
    $mysql_qry = "select * from course where cname ='$CourseName' and year ='$CollegeYear'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {
          ?>
            <table style="margin-left:40%; margin-top:20px;">
              <tr>
                <td colspan="6" style="color:red;">Course Name Already Exists!</td>
              </tr>
            </table>
          <?php
        }else {
          $sql = "INSERT INTO course (cname, year,code) VALUES ('$CourseName', '$CollegeYear','1001')";
          if ($conn->query($sql) === TRUE) {
            ?>
              <table style="margin-left:40%; margin-top:20px;">
                <tr>
                  <td colspan="6" style="color:green;">New Course Added!</td>
                </tr>
              </table>
            <?php
          }else {
            ?>
              <table style="margin-left:40%; margin-top:20px;">
                <tr>
                  <td colspan="6" style="color:red;">Something Wrong! <br>Try Again Please!</td>
                </tr>
              </table>
            <?php
          }
        }
  }

}

 ?>

<form action="" method="post">
  <table style="margin-left:40%; margin-top:20px;">
    <tr>
      <td style="padding:10px;" >Course Name : </td>
      <td style="padding:10px;">  <input type="text" name="c_name" value="" required> </td>
    </tr>
    <tr>
      <td style="padding:10px;">College year:</td>
      <td style="padding:10px;">  <select name="college_year"  style="width:175px;" required >
                  <option value="" disabled  selected>     Select Year     </option>
                  <option value="First">First</option>
                  <option value="Second">Second</option>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">Course Code: </td>
      <td style="padding:10px;">  <input type="text" name="course_code" value=""> </td>
    </tr>
    <tr>
      <td align=center colspan="2" style="padding:10px;" >
        <input class="submit" type="submit" name="submit_btn" value="Submit">
      </td>
    </tr>
  </table>
</form>


</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
