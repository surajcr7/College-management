
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Section - Admin</title>
    <link rel="stylesheet" href="Add_Section.css">

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
      <a href="../Courses/Edit_Courses.php">
         <i class=""></i>
        <span>Course</span>
      </a>
      <a href="../Section/Add_Section.php" class="active" >
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Academic/Delete_Academic.php"   >
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
     <a href="Add_Section.php" class="active">ADD NEW SECTION</a>
     <a href="Edit_Section.php">EDIT SECTION</a>
     <a href="Delete_Section.php">DELETE SECTIONS</a>

  </div>

  </div>

      <div class="title">
        <h1 style="margin-left:42%; margin-top: 5%;"> Add New Section </h1>
      </div>

      <?php

      if (isset($_POST['submit_btn'])){
        $SectionName = $_POST['s_name'];
        $SectionYear = $_POST['section_year'];
        $SectionLimit = $_POST['s_limit'];

        if (empty($SectionName) || empty($SectionYear) || empty($SectionLimit)) {
          ?>
            <table style="margin-left:40%; margin-top:20px;">
              <tr>
                <td colspan="6" style="color:red;">*Empty Field!</td>
              </tr>
            </table>
          <?php
        }else {
          $mysql_qry = "select * from section where section_name ='$SectionName' and year ='$SectionYear'";
          $result = mysqli_query($conn,$mysql_qry);
              if (mysqli_num_rows($result)>0) {
                ?>
                  <table style="margin-left:40%; margin-top:20px;">
                    <tr>
                      <td colspan="6" style="color:red;">Section Name Already Exists!</td>
                    </tr>
                  </table>
                <?php
              }else {
                $sql = "INSERT INTO section (section_name, year,limt) VALUES ('$SectionName', '$SectionYear','$SectionLimit')";
                if ($conn->query($sql) === TRUE) {
                  ?>
                    <table style="margin-left:40%; margin-top:20px;">
                      <tr>
                        <td colspan="6" style="color:green;">New Section Added!</td>
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
            <td style="padding:10px;" >Section Name : </td>
            <td style="padding:10px;">  <input type="text" name="s_name" value="" required> </td>
          </tr>
          <tr>
            <td style="padding:10px;">Year:</td>
            <td style="padding:10px;">  <select name="section_year"  style="width:175px;" required >
                        <option value="" disabled  selected>     Select Year     </option>
                        <option value="First">First</option>
                        <option value="Second">Second</option>
            </td>
          </tr>
          <tr>
            <td style="padding:10px;">Section Limit: </td>
            <td style="padding:10px;">  <input type="number" name="s_limit" value="" required> </td>
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
