<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
require "../../include/conn.php";
 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Section - Admin</title>
    <link rel="stylesheet" href="Edit_Section.css">

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
      <a href="../Section/Add_Section.php"class="active" >
        <i class=""></i>
        <span>Sections</span>
      </a>
      <a href="../Payment/Add_Payment.php" >
        <i class=""></i>
        <span>Payment</span>
      </a>
      <a href="../Academic/Delete_Academic.php"   >
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
   <a href="Add_Section.php" >ADD NEW SECTION</a>
   <a href="Edit_Section.php" class="active">EDIT SECTION</a>
   <a href="Delete_Section.php">DELETE SECTIONS</a>

</div>

</div>

    <div class="main" style="margin-top:40px; margin-left:40%;">
      <table style="border:3px solid black;border-collapse:collapse;">
        <tr>
          <td  colspan="4" align=center> <h1> Current Section list </h1></td>
        </tr>

        <tr>
          <td style="border:1px solid green; padding: 10px;"><h3>Section ID</h3></td>
          <td style="border:1px solid green; padding: 10px;"><h3>Section Name</h3></td>
          <td style="border:1px solid green;padding: 10px;"><h3>College Year</h3> </td>
          <td style="border:1px solid green;padding: 10px;"><h3>Section Limit</h3></td>
        </tr>

        <?php
          $sql = "select * from section ORDER BY serial DESC Limit 5;";
          $query = mysqli_query($conn,$sql);
          $nums = mysqli_num_rows($query);

          while ($res = mysqli_fetch_array($query)) {
          ?>
        <tr>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['serial'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['section_name'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['year'] ; ?></td>
          <td style="border:1px solid green;padding: 10px;"><?php echo $res['limt'] ; ?></td>
        </tr>
        <?php
        }
       ?>
      </table>
    </div>

    <form action="../../Admin/Section/Edit_Section.php" method="post">
      <div class="searchbox" style="margin-left:42%; margin-top:50px;">
        <input type="text" name="secton_search" value="" placeholder="Search..">
        <span> <input class="submit" type="submit" name="search_by_id" value="Search"> </span>
        <?php
        if (isset($_GET['msg'])) {
          ?>
          <p class="error" style="color:red"> <br> <?php echo $_GET['msg'];?> </p>
        <?php
          }
        ?>
      </div>
    </form>

    <?php
      if (isset($_POST['search_by_id'])) {
        $id = $_POST['secton_search'];
        $query = "select * from section where serial='$id' ";
        $query_run = mysqli_query($conn, $query);
     ?>

    <form action="../../include/edit_section_name.php" method="post">
      <table style="margin-left:40%; margin-top:20px;">

        <?php
        if (mysqli_num_rows($query_run)>0) {
          while ($row = mysqli_fetch_array($query_run)) {
         ?>

        <tr>
          <td style="padding:10px;" >Section ID : </td>
          <td style="padding:10px;">  <input type="text" name="secton_id" value="<?php echo $row['serial']; ?>" required readonly> </td>
        </tr>
        <tr>
          <td style="padding:10px;" >Section Name : </td>
          <td style="padding:10px;">  <input type="text" name="section_name" value="<?php echo $row['section_name']; ?>" required> </td>
        </tr>
        <tr>
          <td style="padding:10px;">College year:</td>
          <td style="padding:10px;">  <select name="section_year"  style="width:175px;" required >
                      <option value="" disabled  selected>     Select Year     </option>
                      <option<?php if ($row['year'] == "First"): ?> selected="selected"<?php endif; ?>>First</option>
                      <option<?php if ($row['year'] == "Second"): ?> selected="selected"<?php endif; ?>>Second</option>
          </td>
        </tr>
        <tr>
          <td style="padding:10px;">Section Limit: </td>
          <td style="padding:10px;">  <input type="text" name="section_limit" value="<?php echo $row['limt']; ?>" required> </td>
        </tr>
        <tr>
          <td align=center colspan="2" style="padding:10px;" >
            <input class="submit" type="submit" name="edit_section_name_btn" value="Update">
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
