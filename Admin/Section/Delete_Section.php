<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Delete Section - Admin</title>
    <link rel="stylesheet" href="Delete_Section.css">

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
      <a href="../Section/Delete_Section.php" class="active">
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Academic/Active_Academic.php"   >
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


<div class="navbar" style="margin-left:auto; margin-top:0%;">
 <div class="topnav">
   <a href="Add_Section.php">ADD NEW SECTION</a>
   <a href="Edit_Section.php">EDIT SECTION</a>
   <a href="Delete_Section.php" class="active">DELETE SECTIONS</a>

</div>

</div>

    <div class="main" style="margin-top:40px; margin-left:40%;">
      <table style="border:3px solid black;border-collapse:collapse;">
        <?php
        if (isset($_GET['msg'])) {
          ?>
          <h3 class="error" style="color:red;margin-left:20%;"> <br> <?php echo $_GET['msg'];?> </h3>
        <?php
          }
        ?>
      <tr>
        <td  colspan="5" align=center> <h1> Current Section list </h1></td>
      </tr>
      <tr>
        <td style="border:1px solid green; padding: 10px;"><h3>Serial</h3></td>
        <td style="border:1px solid green; padding: 10px;"><h3>Section Name</h3></td>
        <td style="border:1px solid green;padding: 10px;"><h3>College Year</h3> </td>
        <td style="border:1px solid green;padding: 10px;"><h3>Section Limit</h3></td>
        <td style="border:1px solid green;padding: 10px;"><h3>Delete</h3></td>
      </tr>

      <?php

        if (!empty($_GET['uid'])) {
          $id = $_GET['uid'];

          $qry_delete_check = "SELECT * from section where serial='$id'";
          $result = mysqli_query($conn,$qry_delete_check);
              if (mysqli_num_rows($result)>0) {
                $sql_delete = "DELETE FROM section WHERE serial='$id'";
                if ($conn->query($sql_delete) === TRUE) {
                  header("Location: Delete_Section.php?msg=Section deleted successfully");
                }else {
                  header("Location: Delete_Section.php?msg=Something Wrong!");
                }
              }else {
                header("Location: Delete_Section.php?msg=Something Wrong!!");
                exit();
              }
              $conn->close();
        }

        $sql = "select * from section ORDER BY serial;";
        $query = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($query);
        $i = 0;
        while ($res = mysqli_fetch_array($query)) {
        ?>
      <tr>
        <td style="border:1px solid green;padding: 10px;"><?php echo ++$i; ?></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $res['section_name'] ; ?></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $res['year'] ; ?></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $res['limt'] ; ?></td>
        <td style="border:1px solid green;padding: 10px; background: red">
            <a href="Delete_Section.php?uid=<?php echo $res['serial'];?>" onclick="return deleteUser()">Delete</a>
        </td>

      </tr>
      <?php
      }
     ?>
      </table>
      </div>

    <script>

      function deleteUser(){
        var data = confirm("Are you sure you want to delete?");
        if(data == true){
          return true;
        }else {
          return false;
        }
      }
    </script>

</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
