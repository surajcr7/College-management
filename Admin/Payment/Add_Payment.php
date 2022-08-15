<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Payment - Admin</title>
    <link rel="stylesheet" href="Add_Payment.css">

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
      <a href="../Teacher/Add_Teacher.php" >
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
      <a href="../Payment/Add_Payment.php"class="active" >
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
   <a href="Add_Payment.php" class="active" >ADD NEW PAYMENT</a>
   <a href="List_Payment.php">ALL PAYMENT LIST</a>
   <a href="Update_Payment.php">UPDATE LIST</a>
</div>
</div>

<div class="title">
<h1 style="margin-left:42%; margin-top: 2%;"> Make Payment </h1>
</div>

<table align=center style="margin-left:43%; margin-top:20px;">
  <tr>
    <td style="padding:10px;">
      <input type="text" name="" value="" placeholder="Search by id">
    </td>
  </tr>
  <tr>
    <td align=center colspan="1" style="padding:5px;" >
      <input class="submit" type="submit" name="submit_btn" value="SEARCH">
    </td>
  </tr>
</table>
<table style="margin-left:40%; margin-top:20px;">
  <tr>
    <td style="padding:10px;" >Student name: </td>
    <td style="padding:10px;">  <input type="text" name="" value=""> </td>
</tr>

<tr>
  <td style="padding:10px;">Contact: </td>
  <td style="padding:10px;">  <input type="text" name="" value=""> </td>
</tr>
<tr>
  <td style="padding:10px;">Address: </td>
  <td style="padding:10px;">  <input type="text" name="" value=""> </td>
</tr>
<tr>
  <td style="padding:10px;">Fathers Name: </td>
  <td style="padding:10px;">  <input type="text" name="" value=""> </td>
</tr>
<tr>
  <td style="padding:10px;">College year:</td>
  <td style="padding:10px;">  <select name="gender_type"  style="width:175px;" required >
              <option value="" disabled  selected>     Select Year     </option>
              <option value="HYEF">First</option>
              <option value="YFEF">Second</option></td>
</tr>
<tr>
  <td style="padding:10px;">Payment Month:</td>
  <td style="padding:10px;">
    <select name="payment_year"  style="width:175px;" required>
              <option value="" disabled  selected>     Select Year     </option>
              <option value="twenty">2020</option>
              <option value="twenty_one">2021</option>
              <option value="twenty_two">2022</option>
              <option value="twenty_three">2023</option>
              <option value="twenty_four">2024</option>
              <option value="twenty_five">2025</option>
              <option value="twenty_six">2026</option>
              <option value="twenty_seven">2027</option>
              <option value="twenty_eight">2028</option>
              <option value="twenty_nine">2029</option>
              <option value="thirty">2030</option>
              <option value="thirty_one">2031</option>
            </td>

</tr>
<tr>
  <td align=right colspan="2" style="padding:10px;">
    <select name="month"  style="width:175px;" required>
              <option value="" disabled  selected>     Select month     </option>
              <option value="jan">Janauary</option>
              <option value="feb">February</option>
              <option value="mar">March</option>
              <option value="apr">April</option>
              <option value="may">May</option>
              <option value="june">June</option>
              <option value="july">July</option>
              <option value="august">August</option>
              <option value="sept">September</option>
              <option value="oct">October</option>
              <option value="nov">November</option>
              <option value="dec">December</option>
            </td>
</tr>
<tr>
  <td style="padding:10px;">Amount: </td>
  <td style="padding:10px;"> <input type="text" name="" value=""> </td>
</tr>
<tr>
  <td align=center colspan="2" style="padding:10px;" >
    <input class="submit" type="submit" name="submit_btn" value="Submit">
  </td>
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
