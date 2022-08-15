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
    <link rel="stylesheet" href="Edit_Teacher.css">

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
      <a href="../Teacher/Add_Teacher.php" class="active">
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
   <a href="Add_Teacher.php" >ADD NEW TEACHER</a>
   <a href="Edit_Teacher.php" class="active" >EDIT CURRENT TEACHER</a>
   <a href="Delete_Teacher.php">DELETE TEACHER</a>

</div>
    </div>

<div class="main" style="margin-top:40px; margin-left:25%;">
  <table style="border:3px solid black;border-collapse:collapse;">
  <tr>
  <td  colspan="9" align=center> <h1> Current Teacher list </h1></td>
  </tr>

  <tr>
    <td style="border:1px solid green; padding: 10px;"><h3>ID:</h3></td>
    <td style="border:1px solid green; padding: 10px;"><h3>Full name:</h3></td>
    <td style="border:1px solid green;padding: 10px;"><h3>Birthdate</h3> </td>
    <td style="border:1px solid green;padding: 10px;"><h3>Contact No. </h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Email</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Gender</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Address</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Department</h3></td>
    <td style="border:1px solid green;padding: 10px;"><h3>Username </h3> </td>

  </tr>

  <?php
    $sql = "select * from teacher ORDER BY id DESC Limit 5;";
    $query = mysqli_query($conn,$sql);
    $nums = mysqli_num_rows($query);

    while ($res = mysqli_fetch_array($query)) {
      ?>
        <tr>
          <td style="border:1px solid green; padding: 10px;"><?php echo $res['id'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['name'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['dob'] ; ?></h3></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['contact'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['email'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['gender'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['address'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['dept'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['username'] ; ?></td>

        </tr>
      <?php
      }
     ?>

  </table>
</div>

<form action="../../Admin/Teacher/Edit_Teacher.php" method="post">
<div class="searchbox" style="margin-left:42%; margin-top:50px;">
  <input type="text" name="std_Search" value="" placeholder="Search by ID">
  <span>
    <input class="submit" type="submit" name="search_by_id" value="Search">
  </span>
  <?php if (isset($_GET['msg'])) { ?>
    <p class="error" style="color:red"> <br> <?php echo $_GET['msg'];?> </p>
  <?php } ?>
</div>
</form>

<?php
  if (isset($_POST['search_by_id'])) {
    $id = $_POST['std_Search'];
    $query = "select * from teacher where id='$id' ";
    $query_run = mysqli_query($conn, $query);
 ?>

<div class="edit_data">
  <form action="../../include/edit_teacher_info.php" method="post">

  <table style="margin-left:40%; margin-top:20px;">

    <?php
    if (mysqli_num_rows($query_run)>0) {
      while ($row = mysqli_fetch_array($query_run)) {
     ?>
     <tr>
       <td style="padding:10px;" >ID: </td>
       <td style="padding:10px;">  <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly> </td>
   </tr>
   <tr>
     <td style="padding:10px;" >Username: </td>
     <td style="padding:10px;">  <input type="text" name="username" value="<?php echo $row['username']; ?>" readonly> </td>
 </tr>
    <tr>
      <td style="padding:10px;" >Full name: </td>
      <td style="padding:10px;">  <input type="text" name="full_name" value="<?php echo $row['name']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Birthdate: </td>
    <td style="padding:10px; width:175px;">  <input type="date" name="date" value="<?php echo $row['dob']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Contact No. : </td>
    <td style="padding:10px;">  <input type="text" name="contact" value="<?php echo $row['contact']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Email Addess : </td>
    <td style="padding:10px;">  <input type="text" name="email" value="<?php echo $row['email']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Gender: </td>
    <td style="padding:10px;">
      <select name="gender_type"  style="width:175px;" required >
                  <option value="" disabled  selected>     Select Gender     </option>
                  <option<?php if ($row['gender'] == "Male"): ?> selected="selected"<?php endif; ?>>Male</option>
                  <option<?php if ($row['gender'] == "Female"): ?> selected="selected"<?php endif; ?>>Female</option>
                 </td>
  </tr>
  <tr>
    <td style="padding:10px;">Address: </td>
    <td style="padding:10px;">  <input type="text" name="address" value="<?php echo $row['address']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Department:</td>
    <td style="padding:10px;">
      <select name="dept_type"  style="width:175px;" required >
                <option value="" disabled  selected>     Select Dept.     </option>
                <option<?php if ($row['dept'] == "Science"): ?> selected="selected"<?php endif; ?>>Science</option>
                <option<?php if ($row['dept'] == "Commerce"): ?> selected="selected"<?php endif; ?>>Commerce</option>
    </td>
  </tr>
  <tr>
    <td align=center colspan="2" style="padding:10px;" >
      <input class="submit" type="submit" name="edit_info_btn" value="Update">
    </td>
  </tr>
  </table>
  </form>
  <?php
    }
    }else {
      ?>
        <tr>
          <td colspan="6">No Record Found</td>
        </tr>
      <?php
    }
   ?>

</div>

<?php
}
 ?>

</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
