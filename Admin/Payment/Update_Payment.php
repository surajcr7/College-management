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
    <link rel="stylesheet" href="Update_Payment.css">

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
   <a href="List_Payment.php">ALL PAYMENT LIST</a>
   <a href="Update_Payment.php" class="active" >UPDATE LIST</a>
</div>
</div>

<form action="" method="post">

  <table style="margin-left:40%; margin-top:20px;">
    <tr>
      <td style="padding:10px;">Payment Month:</td>
      <td style="padding:10px;">
        <select name="payment_year"  style="width:175px;" required>
                  <option value="" disabled  selected>     Select Year     </option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                </td>
      <td align=right style="padding:10px;">
        <select name="month"  style="width:175px;" required>
                  <option value="" disabled  selected>     Select month     </option>
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
        </td>
        <td>
          <td style="padding:10px;"> <input type="text" name="user_name" value="" placeholder="Username" > </td>
        </td>
    </tr>
    <tr>
      <td colspan="4" align=center>
        <div class="searchbox" style="margin-left:42%; margin-top:20px;">
        <span> <input class="submit" type="submit" name="search_by_username" value="Search"> </span>
      </div>
    </td>
    </tr>
    <tr>
  </table>
</form>
<?php
  if (isset($_POST['search_by_username'])) {
    $user_name = $_POST['user_name'];
    $s_month = $_POST['month'];
    $s_year = $_POST['payment_year'];

      $query = "SELECT * FROM `payment` WHERE username='$user_name' AND month='$s_month' AND payment_year='$s_year' LIMIT 1";
      $query_run = mysqli_query($conn, $query);

 ?>

<table style="margin-left:49%; margin-top:20px;">
  <?php
  if (mysqli_num_rows($query_run)>0) {
    while ($row = mysqli_fetch_array($query_run)) {
   ?>
   <tr>
     <td style="padding:10px;">Username: </td>
     <td style="padding:10px;"> <input type="text" name="" value="<?php echo $row['username']; ?>" readonly> </td>
   </tr>
  <tr>
    <td style="padding:10px;" >Student name: </td>
    <td style="padding:10px;">
      <input type="text" name="" value="<?php echo $row['name']; ?>">
    </td>
</tr>

<tr>
  <td style="padding:10px;">Contact: </td>
  <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['contact']; ?>"> </td>
</tr>
<tr>
  <td style="padding:10px;">Fathers Name: </td>
  <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['f_name']; ?>"> </td>
</tr>
<tr>
  <td style="padding:10px;">College year:</td>
  <td style="padding:10px;">  <select name="college_year"  style="width:175px;" required >
              <option value="" disabled  selected>     Select Year     </option>
              <option<?php if ($row['year'] == "First"): ?> selected="selected"<?php endif; ?>>First</option>
              <option<?php if ($row['year'] == "Second"): ?> selected="selected"<?php endif; ?>>Second</option>
            </td>
</tr>
<tr>
  <td style="padding:10px;">Payment Month:</td>
  <td style="padding:10px;">
    <select name="payment_year"  style="width:175px;" required>
              <option value="" disabled  selected>     Select Year     </option>
              <option<?php if ($row['payment_year'] == "2020"): ?> selected="selected"<?php endif; ?>>2020</option>
              <option<?php if ($row['payment_year'] == "2021"): ?> selected="selected"<?php endif; ?>>2021</option>
              <option<?php if ($row['payment_year'] == "2022"): ?> selected="selected"<?php endif; ?>>2022</option>
              <option<?php if ($row['payment_year'] == "2023"): ?> selected="selected"<?php endif; ?>>2023</option>
              <option<?php if ($row['payment_year'] == "2024"): ?> selected="selected"<?php endif; ?>>2024</option>
              <option<?php if ($row['payment_year'] == "2025"): ?> selected="selected"<?php endif; ?>>2025</option>
              <option<?php if ($row['payment_year'] == "2026"): ?> selected="selected"<?php endif; ?>>2026</option>
              <option<?php if ($row['payment_year'] == "2027"): ?> selected="selected"<?php endif; ?>>2027</option>
              <option<?php if ($row['payment_year'] == "2028"): ?> selected="selected"<?php endif; ?>>2028</option>
              <option<?php if ($row['payment_year'] == "2029"): ?> selected="selected"<?php endif; ?>>2029</option>
              <option<?php if ($row['payment_year'] == "2030"): ?> selected="selected"<?php endif; ?>>2030</option>
              <option<?php if ($row['payment_year'] == "2031"): ?> selected="selected"<?php endif; ?>>2031</option>
            </td>

</tr>
<tr>
  <td align=right colspan="2" style="padding:10px;">
    <select name="month"  style="width:175px;" required>
              <option value="" disabled  selected>     Select month     </option>
              <option<?php if ($row['month'] == "January"): ?> selected="selected"<?php endif; ?>>Janauary</option>
              <option<?php if ($row['month'] == "February"): ?> selected="selected"<?php endif; ?>>February</option>
              <option<?php if ($row['month'] == "March"): ?> selected="selected"<?php endif; ?>>March</option>
              <option<?php if ($row['month'] == "April"): ?> selected="selected"<?php endif; ?>>April</option>
              <option<?php if ($row['month'] == "May"): ?> selected="selected"<?php endif; ?>>May</option>
              <option<?php if ($row['month'] == "June"): ?> selected="selected"<?php endif; ?>>June</option>
              <option<?php if ($row['month'] == "July"): ?> selected="selected"<?php endif; ?>>July</option>
              <option<?php if ($row['month'] == "August"): ?> selected="selected"<?php endif; ?>>August</option>
              <option<?php if ($row['month'] == "September"): ?> selected="selected"<?php endif; ?>>September</option>
              <option<?php if ($row['month'] == "October"): ?> selected="selected"<?php endif; ?>>October</option>
              <option<?php if ($row['month'] == "November"): ?> selected="selected"<?php endif; ?>>November</option>
              <option<?php if ($row['month'] == "December"): ?> selected="selected"<?php endif; ?>>December</option>
            </td>
</tr>
<tr>
  <td style="padding:10px;">Amount: </td>
  <td style="padding:10px;"> <input type="text" name="" value="<?php echo $row['amount']; ?>"> </td>
</tr>
<tr>
  <td align=center colspan="2" style="padding:10px;" >
    <input class="submit" type="submit" name="submit_btn" value="Update">
  </td>
</tr>
</table>
<?php
  }
}else {
    ?>
      <tr>
        <td colspan="6">No Record Found</td>
      </tr>
    <?php
  }
}
 ?>
</div>
</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
