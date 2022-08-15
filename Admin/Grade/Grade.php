<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <script type="text/javascript">

      function confirmation(){
        var value = false;
      }
    </script>

    <meta charset="utf-8">
    <link rel="stylesheet" href="Grade.css">
    <title>Admin</title>
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
          <a href="../Section/Add_Section.php" >
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
          <a href="../Grade/Grade.php"class="active" >
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

<form name="form1" action="../../include/grade_lock.php" method="post">
<table class="table">

  <tr>
    <td> <h2>Grade Lock: </h2></td>
    <td align=left>
      <div class="toggle-btns">
      <div class="toggle-btn">
        <input type="checkbox" id="toggle-btn-1">
        <label for="toggle-btn-1" onclick="updateValue();"></label>
      </div>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <br>
      <input class="button-grade" type="button" name="updateGradeLock" value="UPDATE">
    </td>
  </tr>
  <tr>
    <td> <br> </td>
  </tr>
  <tr>
    <td align=right> <h2>Current State :</h2> </td>
    <td align=right > <h2>Enabled</h2> </td>
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

 <?php
if (isset($_POST["updateGradeLock"])) {

}
  ?>
