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
    <link rel="stylesheet" href="Delete_Courses.css">

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
      <a href="../Courses/Edit_Courses.php"class="active">
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
   <a href="Edit_Courses.php">EDIT CURRENT COURSES</a>
   <a href="Offer_Courses.php">OFFER NEW COURSE</a>

   <a href="Delete_Courses.php"  class="active" >DELETE COURSES</a>

</div>
</div>

<div class="main" style="margin-top:40px; margin-left:40%;">
  <table style="border:3px solid black;border-collapse:collapse;">
    <tr>
      <td  colspan="3" align=center> <h1> Current Course list </h1></td>
    </tr>
    <tr>
      <td style="border:1px solid green;padding: 10px;"><h3>Course ID</h3></td>
      <td style="border:1px solid green; padding: 10px;"><h3>Course Name</h3></td>
      <td style="border:1px solid green;padding: 10px;"><h3>College Year</h3> </td>
    </tr>

    <?php
      $sql = "select * from course ORDER BY id DESC Limit 5;";
      $query = mysqli_query($conn,$sql);
      $nums = mysqli_num_rows($query);

    while ($res = mysqli_fetch_array($query)) {
      ?>

        <tr>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['id'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['cname'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['year'] ; ?></td>
        </tr>

      <?php
      }
     ?>
  </table>
</div>


<form action="../../Admin/Courses/Delete_Courses.php" method="post">
  <div class="searchbox" style="margin-left:42%; margin-top:50px;">
    <input type="text" name="course_Search" value="" placeholder="Search.." required>
    <span> <input class="submit" type="submit" name="search_by_id" value="Search"> </span>
    <?php if (isset($_GET['msg'])) { ?>
      <p class="error" style="color:red"> <br> <?php echo $_GET['msg'];?> </p>
    <?php } ?>
  </div>
</form>

<?php
  if (isset($_POST['search_by_id'])) {
    $id = $_POST['course_Search'];
    $query = "select * from course where id='$id' ";
    $query_run = mysqli_query($conn, $query);
 ?>

  <div class="main" style="margin-top:40px; margin-left:40%;">
    <form  name="form1" method="post" action="../../include/course_delete.php">
      <table style="border:3px solid black;border-collapse:collapse;">
        <tr>
          <td style="border:1px solid green; padding: 10px;"><h3>Course ID</h3></td>
          <td style="border:1px solid green;padding: 10px;"><h3>College Name</h3> </td>
          <td style="border:1px solid green;padding: 10px;"><h3>Course Year</h3></td>
        </tr>

        <?php
        if (mysqli_num_rows($query_run)>0) {
          while ($row = mysqli_fetch_array($query_run)) {
         ?>

          <tr>

            <td style="border:1px solid green;padding: 10px;">
              <input type="number" name="id" value="<?php echo $row['id']; ?>" readonly required>
            </td>
            <td style="border:1px solid green;padding: 10px;"><?php echo $row['cname']; ?></td>
            <td style="border:1px solid green;padding: 10px;"><?php echo $row['year']; ?></td>
          </tr>

        </table>
        <table>
          <tr>
            <td></td>
            <td colspan="6" style="padding: 30px">
              <input class="submit" type="submit" name="" value="Delete? " onclick="return confirmation()">
            </td>
          </tr>
        </table>
        <?php
          }
          }else {
            ?>
              <tr>
                <td></td>
                <td colspan="6" style="padding: 10px;">No Record Found</td>
              </tr>
            <?php
          }
        }
         ?>
      </form>

  </div>



    <div id="dlt" class="modal">
      <span onclick="document.getElementById('dlt').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form class="modal-content" action="/action_page.php">
        <div class="container">
          <h1>Delete Course?</h1>


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
