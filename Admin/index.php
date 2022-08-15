<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="DashBoard.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../Admin/index.php"class="active" >
        <i class=""></i>
        <span>Dashboard</span>
      </a>
      <a href="../Admin/Student/Add_Student.php" >
        <i class=""></i>
        <span>Student</span>
      </a>
      <a href="../Admin/Teacher/Add_Teacher.php" >
        <i class=""></i>
        <span>Teacher</span>
      </a>
      <a href="../Admin/Courses/Edit_Courses.php">
         <i class=""></i>
        <span>Course</span>
      </a>
      <a href="../Admin/Section/Add_Section.php" >
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Admin/Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Admin/Academic/Active_Academic.php"   >
        <i class=""></i>
        <span>Academic</span>
      </a>
      <a href="../Admin/Grade/Grade.php" >
        <i class=""></i>
        <span>Grade</span>
      </a>
      <a href="../include/logout.php" >
        <i class=""></i>
        <span>Logout</span>
      </a>
    </div>

    <div class="cms">
      <p style="margin-left:25%">College Management System</p>
    </div>

<div class="info">

     <table style="margin-left:auto; margin-right:auto; margin-top:10%" >
       <tr>

          <td style="padding-right:150px; padding-left: 50px;" >
           <table>
             <tr>
               <td> <h2>STUDENT</h2> <br> <br> </td>
             </tr>
             <tr>
               <td><h3>Total Students: </h3> <br> </td>
               <td> <h3><?php echo "100"; ?></h3> <br></td>
             </tr>
             <tr>
               <td><h3>Active Students: </h3><br></td>
               <td> <h3><?php echo "100"; ?></h3> <br></td>
             </tr>
           </table>
         </td>


         <td style="padding-right:150px">
           <table>
             <tr>
               <td> <h2>TEACHER</h2> <br> <br></td>
             </tr>
             <tr>
               <td> <h3>Total Teacher: </h3> <br> </td>
               <td> <h3><?php echo "100"; ?></h2> <br></td>
             </tr>
             <tr>
               <td> <h3>Active Teacher: </h3> <br></td>
               <td> <h3><?php echo "100"; ?></h3> <br></td>
             </tr>
           </table>
         </td>



         <td style="align:right">
           <table>
             <tr>
               <td> <h2>COURSE</h2> <br> <br> </td>
             </tr>
             <tr>
               <td> <h3>Total Course: </h3> <br></td>
               <td> <h3><?php echo "100"; ?></h3> <br></td>
             </tr>
             <tr>
               <td> <h3>Active Course: </h3> <br></td>
               <td> <h3><?php echo "100"; ?></h3> <br></td>
             </tr>
           </table>
         </td>
         </div>
       </tr>

   </table>
</body>
</html>

<?php
}else {
  header("Location: ../index.php");
  exit();
}
 ?>
