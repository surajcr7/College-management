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
    <link rel="stylesheet" href="Delete_Student.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../index.php" >
        <i class=""></i>
        <span>Dashboard</span>
      </a>
      <a href="../Student/Add_Student.php" class="active">
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
   <a href="Add_Student.php" >ADD NEW STUDENT</a>
   <a href="Edit_Student.php"  >EDIT CURRENT STUDENTS</a>
   <a href="Delete_Student.php" class="active" >DELETE STUDENTS</a>

</div>
</div>


<form action="" method="post">
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
  <form name="form1" method="post" action="../../include/stdent_delete.php">
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
      <td style="padding:10px;" >Full name: </td>
      <td style="padding:10px;">  <input type="text" name="full_name" value="<?php echo $row['name']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Birthdate: </td>
    <td style="padding:10px; width:175px;">  <input type="date" name="" value="<?php echo $row['dob']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Family Contact: </td>
    <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['contact']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Gender: </td>
    <td style="padding:10px;">
      <select name="gender_type"  style="width:175px;" required readonly>
                  <option value="" disabled  selected>     Select Gender     </option>
                  <option<?php if ($row['gender'] == "Male" || "male"): ?> selected="selected"<?php endif; ?>>Male</option>
                  <option<?php if ($row['gender'] == "Female" || "female"): ?> selected="selected"<?php endif; ?>>Female</option>
                 </td>
  </tr>
  <tr>
    <td style="padding:10px;">Address: </td>
    <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['address']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Fathers Name: </td>
    <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['f_name']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">Mother Name: </td>
    <td style="padding:10px;">  <input type="text" name="" value="<?php echo $row['m_name']; ?>" readonly> </td>
  </tr>
  <tr>
    <td style="padding:10px;">College year:</td>
    <td style="padding:10px;">  <select name="college_year"  style="width:175px;" required >
                <option value="" disabled  selected >     Select Year     </option>
                <option<?php if ($row['c_year'] == "First"): ?> selected="selected"<?php endif; ?>>First</option>
                <option<?php if ($row['c_year'] == "Second"): ?> selected="selected"<?php endif; ?>>Second</option>
  </tr>
  <tr>
    <td style="padding:10px;">Username: </td>
    <td style="padding:10px;">  <input type="text" name="username" value="<?php echo $row['username']; ?>" readonly> </td>
  </tr>

  <tr>
    <td align=center colspan="2" style="padding:10px;" >
      <input class="submit" type="submit" name="submit_btn" value="DELETE" onClick="return confirmation()">
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
   ?>
</form>
</div>



<?php
}
 ?>


<div id="dlt" class="modal">
  <span onclick="document.getElementById('dlt').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Student?</h1>


      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="deletebtn">Delete</button>
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
