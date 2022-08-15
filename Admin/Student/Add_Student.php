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
    <link rel="stylesheet" href="Add_Student.css">

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
   <a href="Add_Student.php" class="active" >ADD NEW STUDENT</a>
   <a href="Edit_Student.php">EDIT CURRENT STUDENTS</a>
   <a href="Delete_Student.php">DELETE STUDENTS</a>

</div>
</div>
      <div class="title">
      <h1 style="margin-left:42%; margin-top: 5%;"> Add New Student </h1>

      <?php

      if (isset($_POST['submit_btn'])) {
        $fullName = $_POST['full_name'];
        $birthdate = $_POST['birthdate'];
        $family_contact = $_POST['family_contact'];
        $gender = $_POST['gender_type'];
        $address = $_POST['address'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $college_year = $_POST['college_year'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $mysql_qry = "select username from student where username ='$username'";
        $result = mysqli_query($conn,$mysql_qry);
            if (mysqli_num_rows($result)>0) {
              ?>
              <table style="margin-left:40%; margin-top:20px;">
                <tr>
                  <td colspan="6" style="color:red;">Username already exists! <br>Please try different username <br></td>
                </tr>
              </table>
              <?php
            }
            else {
              $sql = "INSERT INTO student (name, dob, contact,gender,address,f_name,m_name,c_year,username,password)
              VALUES ('$fullName', '$birthdate', '$family_contact','$gender','$address','$father_name','$mother_name','$college_year','$username','$password')";

              if ($conn->query($sql) === TRUE) {

                ?>
                <table style="margin-left:40%; margin-top:20px;">
                  <tr>
                    <td colspan="6" style="color:blue;">New record created successfully  <br></td>
                    <?php
                      $query = "INSERT INTO login (username, password, user_type)
                      VALUES ('$username','$password','3')";
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
          <td style="padding:10px;">  <input type="text" name="full_name" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">Birthdate: </td>
        <td style="padding:10px; width:175px;">  <input type="date" name="birthdate" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">Family Contact: </td>
        <td style="padding:10px;">  <input type="number" name="family_contact" value="" required> </td>
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
        <td style="padding:10px;">  <input type="text" name="address" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">Fathers Name: </td>
        <td style="padding:10px;">  <input type="text" name="father_name" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">Mother Name: </td>
        <td style="padding:10px;">  <input type="text" name="mother_name" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">College year:</td>
        <td style="padding:10px;">  <select name="college_year"  style="width:175px;" required >
                    <option value="" disabled  selected>     Select Year     </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option></td>
      </tr>
      <tr>
        <td style="padding:10px;">Username: </td>
        <td style="padding:10px;"> <input type="text" name="username" value="" required> </td>
      </tr>
      <tr>
        <td style="padding:10px;">Password: </td>
        <td style="padding:10px;">  <input type="Password" name="password" value="" required> </td>
      </tr>
      <tr>
        <td align=center colspan="2" style="padding:10px;" >
          <input class="submit" type="submit" name="submit_btn" value="Submit">
        </td>
      </tr>
      </table>
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
