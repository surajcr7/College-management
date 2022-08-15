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
    <link rel="stylesheet" href="Edit_Student.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../index.php" >
        <i class=""></i>
        <span>Dashboard</span>
      </a>
      <a href="../Student/Add_Student.php"class="active" >
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
   <a href="Add_Student.php">ADD NEW STUDENT</a>
   <a href="Edit_Student.php" class="active" >EDIT CURRENT STUDENTS</a>
   <a href="Delete_Student.php" >DELETE STUDENTS</a>

</div>
</div>

<div class="main" style="margin-top:40px; margin-left:25%;">
  <table style="border:3px solid black;border-collapse:collapse;">
  <tr>
  <td  colspan="10" align=center> <h1> Current Student list </h1></td>
  </tr>
  <tr>
    <td style="border:1px solid green; padding: 10px;"><h3>ID</h3></td>
    <td style="border:1px solid green; padding: 10px;"><h3>Full name:</h3></td>
    <td style="border:1px solid green;padding: 10px;"><h3>Birthdate</h3> </td>
    <td style="border:1px solid green;padding: 10px;"><h3>family Contact</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Gender</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Address</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Fathers Name</h3></td>
    <td style="border:1px solid green;padding: 10px;"> <h3>Mothers Name </h3></td>
    <td style="border:1px solid green;padding: 10px;"><h3>College Year </h3> </td>

  </tr>

    <?php
      $sql = "select * from student ORDER BY Id DESC Limit 5;";
      $query = mysqli_query($conn,$sql);
      $nums = mysqli_num_rows($query);

      while ($res = mysqli_fetch_array($query)) {
        ?>
        <tr>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['Id'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['name'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['dob'] ; ?> </td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['contact'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['gender'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['address'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['f_name'] ; ?> </td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['m_name'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['c_year'] ; ?></td>

        </tr>

      <?php
      }
     ?>


  </table>
</div>
<form action="../../Admin/Student/Edit_Student.php" method="post">
  <div class="searchbox" style="margin-left:42%; margin-top:50px;">
    <input type="text" name="get_id" value="" placeholder="Search by id">
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
    $id = $_POST['get_id'];
    $query = "select * from student where Id='$id' ";
    $query_run = mysqli_query($conn, $query);

 ?>

<div class="edit_data">

  <form action="../../include/edit_student_info.php" method="post">
  <table style="margin-left:40%; margin-top:20px;">

    <?php
    if (mysqli_num_rows($query_run)>0) {
      while ($row = mysqli_fetch_array($query_run)) {
     ?>
     <tr>
       <td style="padding:10px;" >ID: </td>
       <td style="padding:10px;">  <input type="text" name="id" value="<?php echo $row['Id']; ?>" readonly> </td>
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
    <td style="padding:10px; width:175px;">  <input type="date" name="birthdate" value="<?php echo $row['dob']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Family Contact: </td>
    <td style="padding:10px;">  <input type="text" name="family_contact" value="<?php echo $row['contact']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Gender: </td>
    <td style="padding:10px;">
      <select name="gender_type"  style="width:175px;" required >
                  <option value="" disabled  selected>     Select Gender     </option>
                  <option<?php if ($row['gender'] == "Male" || "male"): ?> selected="selected"<?php endif; ?>>Male</option>
                  <option<?php if ($row['gender'] == "Female" || "female"): ?> selected="selected"<?php endif; ?>>Female</option>
                 </td>
  </tr>
  <tr>
    <td style="padding:10px;">Address: </td>
    <td style="padding:10px;">  <input type="text" name="address" value="<?php echo $row['address']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Fathers Name: </td>
    <td style="padding:10px;">  <input type="text" name="father_name" value="<?php echo $row['f_name']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Mother Name: </td>
    <td style="padding:10px;">  <input type="text" name="mother_name" value="<?php echo $row['m_name']; ?>"> </td>
  </tr>
  <tr>
    <td style="padding:10px;">College year:</td>
    <td style="padding:10px;">  <select name="college_year"  style="width:175px;" required >
                <option value="" disabled  selected>     Select Year     </option>
                <option<?php if ($row['c_year'] == "First"): ?> selected="selected"<?php endif; ?>>First</option>
                <option<?php if ($row['c_year'] == "Second"): ?> selected="selected"<?php endif; ?>>Second</option>
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
