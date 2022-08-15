<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="Edit_Academic.css">

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
      <a href="../Section/Add_Section.php" >
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Academic/Active_Academic.php" class="active" >
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
   <a href="Active_Academic.php" >ACTIVE   SCHEDULES</a>
   <a href="Edit_Academic.php" class="active" >EDIT  SCHEDULES</a>
</div>
</div>

<div class="opt" style="margin-left:40%; margin-top:40px;" >
  <select name="Year"  style="width:175px; height:35px" required >
              <option value="" disabled  selected>     Select Year     </option>
              <option value="HYEF">First</option>
              <option value="YFEF">Second</option>
</div>
  <div class="searchbox" style="margin-left:42%; margin-top:50px; ">
  <input style="width:165px; height:35px" type="text" name="std_Search" value="" placeholder="Section name..">
  <br>
  <input style="margin-left:120px;margin-top:20px"; class="submit" type="submit" name="" value="Search">
</div>

<div class="main">
<table  style="border:3px solid black;border-collapse:collapse; margin-left:40%; margin-top:20px">
  <tr>
    <td colspan="5" align=center>
      <h1>First Year</h1>
      <h3>Section: B</h2>
    </td>
  </tr>
  <tr>
    <td style="border:1px solid green;padding: 10px;"> <h3>Day</h3> </td>
    <td style="border:1px solid green;padding: 10px;"> <h3> 8-9.30</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3> 9.30-11.00</h3> </td>
    <td style="border:1px solid green;padding: 10px;"> <h3> 11.30-1.00</h3> </td>
    <td style="border:1px solid green;padding: 10px;"> <h3> 1.00-2.30</h3></td>

  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;">Sunday</td>
    <td style="border:1px solid green;padding: 10px;">Math</td>
    <td style="border:1px solid green;padding: 10px;">physics </td>
    <td style="border:1px solid green;padding: 10px;">Chemistry</td>
    <td style="border:1px solid green;padding: 10px;">Biology</td>
  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;">Monday</td>
    <td style="border:1px solid green;padding: 10px;">Math</td>
    <td style="border:1px solid green;padding: 10px;">tusher@121 </td>
    <td style="border:1px solid green;padding: 10px;">15000  </td>
    <td style="border:1px solid green;padding: 10px;">1/1/2020  </td>
  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;">Tuesday</td>
    <td style="border:1px solid green;padding: 10px;">Math</td>
    <td style="border:1px solid green;padding: 10px;"></td>
    <td style="border:1px solid green;padding: 10px;">15000  </td>
    <td style="border:1px solid green;padding: 10px;">1/1/2020  </td>
  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;">Wednesday</td>
    <td style="border:1px solid green;padding: 10px;">Bangla</td>
    <td style="border:1px solid green;padding: 10px;"></td>
    <td style="border:1px solid green;padding: 10px;">15000  </td>
    <td style="border:1px solid green;padding: 10px;"></td>
  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;">Thursday</td>
    <td style="border:1px solid green;padding: 10px;"></td>
    <td style="border:1px solid green;padding: 10px;">15000  </td>
    <td style="border:1px solid green;padding: 10px;"> </td>
      <td style="border:1px solid green;padding: 10px;"> </td>
  </tr>
</table>
</div>

</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
