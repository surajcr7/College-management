<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="List_Payment.css">

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
   <a href="Add_Payment.php">ADD NEW PAYMENT</a>
   <a href="List_Payment.php" class="active" >ALL PAYMENT LIST</a>
   <a href="Update_Payment.php">UPDATE LIST</a>
</div>
</div>


<table style="margin-left:40%; margin-top:20px;">
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
    <td colspan="3">
      <div class="searchbox" style="margin-left:42%; margin-top:20px;">
      <span> <input class="submit" type="submit" name="" value="Search"> </span>
    </div>
  </td>
  </tr>
  <tr>
</table>
<div class="main">
<table  style="border:3px solid black;border-collapse:collapse; margin-left: 30%;margin-top:20px">
  <tr>
    <td style="border:1px solid green; padding: 10px;">Serial</td>
    <td style="border:1px solid green;padding: 10px;">Username</td>
    <td style="border:1px solid green; padding: 10px;">Name</td>
    <td style="border:1px solid green;padding: 10px;">Contact No</td>
    <td style="border:1px solid green;padding: 10px;">Amount</td>
    <td style="border:1px solid green;padding: 10px;">Date</td>
    <td style="border:1px solid green;padding: 10px;">Type</td>
    <td style="border:1px solid green;padding: 10px;">Delete</td>

  </tr>
  <?php

    if (!empty($_GET['uid'])) {
      $id = $_GET['uid'];
    }

    $sql = "select * from  payment ORDER BY id;";
    $query = mysqli_query($conn,$sql);
    $nums = mysqli_num_rows($query);
    $i = 0;
    while ($res = mysqli_fetch_array($query)) {
   ?>

  <tr>
    <td style="border:1px solid green; padding: 10px;"><?php echo ++$i; ?></td>
    <td style="border:1px solid green; padding: 10px;"><?php echo $res['name'] ; ?></td>
    <td style="border:1px solid green;padding: 10px;"><?php echo $res['username'] ; ?> </td>
    <td style="border:1px solid green; padding: 10px;"><?php echo $res['contact'] ; ?></td>
    <td style="border:1px solid green;padding: 10px;"><?php echo $res['amount'] ; ?></td>
    <td style="border:1px solid green;padding: 10px;"><?php echo $res['month'] ; ?>  </td>
    <td style="border:1px solid green;padding: 10px;"><?php echo $res['type'] ; ?>  </td>
    <td style="border:1px solid green;padding: 10px;">
      <a href="List_Payment.php?uid=<?php echo $res['id'];?>" onclick="return deleteUser()">Delete</a>
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
