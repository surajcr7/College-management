<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Marks.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="index.php">
        <i class=""></i>
        <span>ROUTINE</span>
      </a>
      <a href="Marks.php"  class="active">
        <i class=""></i>
        <span>MARKS</span>
      </a>
      <a href="Notice.php">
        <i class=""></i>
        <span>NOTICE</span>
      </a>
      <a href="../include/logout.php">
        <i class=""></i>
        <span>Logout</span>
      </a>
    </div>
    <div class="cms">
      <p style="margin-left:35%">College Management System</p>
    </div>

    <table style="margin-left:45%; margin-top:20px;">
            <tr>

              <td align=right style="padding:10px;">
                <select name="month"  style="width:175px;" required>
                          <option value="" disabled  selected>     Select Term     </option>
                          <option value="sec">Half Yearly</option>
                          <option value="sec">Year Final</option>
              </td>

            </tr>
            <tr>
              <td colspan="4" align=center>
                <div class="searchbox" align=center style=" margin-top:20px;">
                <span> <input class="submit" type="submit" name="" value="View"> </span>
              </div>
            </td>
            </tr>
            <tr>
          </table>

          <div class="main" style="margin-top:40px; margin-left:42%;">
            <table style="border:3px solid black;border-collapse:collapse;">
            <tr>
              <td  colspan="3" align=center> <h1>Notice</h1></td>
            </tr>

            <tr>
              <td style="border:1px solid green; padding: 10px;"><h3>Course Name</h3></td>
              <td style="border:1px solid green;padding: 10px;"><h3>Marks</h3></td>
              <td style="border:1px solid green;padding: 10px;"><h3>Comments</h3></td>
            </tr>
            <tr>
              <td style="border:1px solid green;padding: 10px;">Bangla</td>
              <td style="border:1px solid green;padding: 10px;">65</td>
              <td style="border:1px solid green;padding: 10px;"></td>

            </tr>
            <tr>
                <td style="border:1px solid green;padding: 10px;">Enlish</td>
                <td style="border:1px solid green;padding: 10px;">65</td>
                <td style="border:1px solid green;padding: 10px;"></td>

            </tr>
            <tr>
                  <td style="border:1px solid green;padding: 10px;">Physics</td>
                  <td style="border:1px solid green;padding: 10px;">65</td>
                  <td style="border:1px solid green;padding: 10px;"></td>

            </tr>
                <tr>
                      <td style="border:1px solid green;padding: 10px;">Chemistry</td>
                      <td style="border:1px solid green;padding: 10px;">65</td>
                      <td style="border:1px solid green;padding: 10px;"></td>

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
