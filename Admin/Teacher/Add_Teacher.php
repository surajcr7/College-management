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
    <link rel="stylesheet" href="Add_Teacher.css">

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


<div class="navbar" style="margin-left:12%; margin-top:0%;">
 <div class="topnav">
   <a href="Add_Teacher.php" class="active" >ADD NEW TEACHER</a>
   <a href="Edit_Teacher.php"  >EDIT CURRENT TEACHER</a>
   <a href="Delete_Teacher.php">DELETE TEACHER</a>

</div>
    </div>

    <div class="title">
    <h1 style="margin-left:42%; margin-top: 5%;"> Add New Teacher </h1>

    <?php

    if (isset($_POST['submit_btn'])) {
      $fullName = $_POST['full_name'];
      $birthdate = $_POST['birthdate'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $gender = $_POST['gender_type'];
      $address = $_POST['address'];
      $dept = $_POST['dept_type'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $mysql_qry = "select username from teacher where username ='$username'";
      $result = mysqli_query($conn,$mysql_qry);
          if (mysqli_num_rows($result)>0) {
            ?>
            <table style="margin-left:40%; margin-top:20px;">
              <tr>
                <td colspan="6" style="color:red;">Username already exists! <br>
                  Please try different username <br>
                </td>
              </tr>
            </table>
            <?php
          }
          else {
            $sql = "INSERT INTO teacher (name, dob, contact,email,gender,address,dept,username,password)
            VALUES ('$fullName', '$birthdate', '$contact','$email','$gender','$address','$dept','$username','$password')";

            if ($conn->query($sql) === TRUE) {

              ?>
              <table style="margin-left:40%; margin-top:20px;">
                <tr>
                  <td colspan="6" style="color:blue;">New record created successfully  <br></td>
                  <?php
                    $query = "INSERT INTO login (username, password, user_type)
                    VALUES ('$username','$password','2')";
                    if ($conn->query($query) === TRUE) {
                      $alart_msg= "New record created successfully! Username: ".$username ." & Password: ".$password;
                      echo "<script>alert('$alart_msg');</script>";
                    }else {
                      ?>
                      <table style="margin-left:40%; margin-top:20px;">
                        <tr>
                          <td colspan="6" style="color:red;">Something Wrong! Try again! <br></td>
                        </tr>

                      </table>
                      <?php
                    }

                  ?>
                </tr>
              </table>
              <?php
            } else {

              ?>
              <table style="margin-left:40%; margin-top:20px;">
                <tr>
                  <td colspan="6" style="color:red;">Something Wrong! Try again! <br></td>
                </tr>

              </table>
              <?php
            }
          }

      $conn->close();
    }

     ?>
     </div>

     <form action="" method="post">
    <table style="margin-left:40%; margin-top:20px;">
      <tr>
        <td style="padding:10px;" >Full name: </td>
        <td style="padding:10px;">  <input type="text" name="full_name" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Birthdate: </td>
      <td style="padding:10px; width:175px;">  <input type="date" name="birthdate" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Contact No. : </td>
      <td style="padding:10px;">  <input type="text" name="contact" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Email Addess : </td>
      <td style="padding:10px;">  <input type="text" name="email" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Gender: </td>
      <td style="padding:10px;">
        <select name="gender_type"  style="width:175px;" required >
                    <option value="" disabled  selected>     Select Gender     </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">Address: </td>
      <td style="padding:10px;">  <input type="text" name="address" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Department:</td>
      <td style="padding:10px;">
        <select name="dept_type"  style="width:175px;" required >
                  <option value="" disabled  selected>     Select Dept.     </option>
                  <option value="Science">Science</option>
                  <option value="Commerce">Commerce</option>
      </td>
    </tr>
    <tr>
      <td style="padding:10px;">Username: </td>
      <td style="padding:10px;"> <input type="text" name="username" value=""> </td>
    </tr>
    <tr>
      <td style="padding:10px;">Password: </td>
      <td style="padding:10px;">  <input type="Password" name="password" value=""> </td>
    </tr>
    <tr>
      <td align=center colspan="2" style="padding:10px;" >
        <input class="submit" type="submit" name="submit_btn" value="Submit">
      </td>
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
