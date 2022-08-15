<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

    <script type="text/javascript">

      function confirmation(){
        var data = confirm('Are you sure you want to delete?');
        if(data == true){
          form1.submit();
          return true;
        }
        else{
          return false;
        }
      }
    </script>

    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="Delete_Teacher.css">

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
   <a href="Add_Teacher.php">ADD NEW TEACHER</a>
   <a href="Edit_Teacher.php"  >EDIT CURRENT TEACHER</a>
   <a href="Delete_Teacher.php" class="active"  >DELETE TEACHER</a>

</div>
</div>

<form action="../Teacher/Delete_Teacher.php" method="post">
<div class="searchbox" style="margin-left:43%; margin-top:50px;">
  <input type="text" name="std_Search" value="" placeholder="Search..">
  <span> <input class="submit" type="submit" name="search_by_id" value="Search"> </span>
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


<div class="main" style="margin-top:40px; margin-left:45%;">
  <form name="form1" method="post" action="../../include/teacher_delete.php">
    <table style="border-collapse:collapse;">

      <?php
      if (mysqli_num_rows($query_run)>0) {
        while ($row = mysqli_fetch_array($query_run)) {
       ?>

       <tr>
         <td style="border:1px solid green; padding: 10px;"><h3>ID:</h3></td>
         <td style="border:1px solid green;padding: 10px;">
           <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
         </td>
       </tr>
       <tr>
         <td style="border:1px solid green; padding: 10px;"><h3>Username:</h3></td>
         <td style="border:1px solid green;padding: 10px;">
           <input type="text" name="username" value="<?php echo $row['username']; ?>" readonly>
         </td>
       </tr>
      <tr>
        <td style="border:1px solid green; padding: 10px;"><h3>Full name:</h3></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;"><h3>Birthdate</h3> </td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['dob']; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;"><h3>Contact</h3></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['contact']; ?></td>
      </tr>

      <tr>
        <td style="border:1px solid green;padding: 10px;"> <h3>Gender</h3></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['gender']; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;"> <h3>Email:</h3></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;"> <h3>Address</h3></td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['address']; ?></td>
      </tr>

      <tr>
        <td style="border:1px solid green;padding: 10px;"><h3>Dept. </h3> </td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['dept']; ?></td>
      </tr>

      <tr>
        <td style="border:1px solid green;padding: 10px;"><h3>Username </h3> </td>
        <td style="border:1px solid green;padding: 10px;"><?php echo $row['name']; ?></td>
      </tr>

      <tr>
        <td>
          <div class="delete" style="margin-left:50%; margin-top:50px;">
            <input class="submit" type="submit" name="" value="Delete? " onclick="return confirmation()">
          </div> <br><br>
        </td>
      </tr>

    </table>
    </form>
  <?php
      }
    }else {
      ?>
        <tr>
          <td colspan="6" style="color:red">No Record Found</td>
        </tr>
      <?php
    }
   ?>

</div>


<?php
  }
 ?>


<div id="dlt" class="modal">
  <span onclick="document.getElementById('dlt').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="../../include/teacher_delete.php" method="post">
    <div class="container">
      <h1>Delete Student?</h1>


      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="deletebtn" name="delete_btn">Delete</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
